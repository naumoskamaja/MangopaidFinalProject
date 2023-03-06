<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Library\ImageHelper;
use App\Library\LibHelper;
use App\Library\ProductsHelper;
use App\Models\Category;
use App\Models\Filter;
use App\Models\Product;
use App\Models\Review;

class ProductsController extends Controller
{
    /* show a single product */
    public function show_product($id)
    {
        $products = ProductsHelper::getActiveProducts();
        $product = Product::whereId($id)->where('status', 1)->with('images')->with('sizes')->first();
        if (!$product)
            abort(404);

        $main_categories = Category::where('parent_id', 0)->where('status', 1)->orderBy('menu_order', 'asc')
            ->with('parent')
            ->get();
        $related_products = ProductsHelper::get_related_products($id);
        $product_colors = ProductsHelper::get_product_colors($id);
        $reviews = Review::where('product_id', $product->id)->with('client')->where('status', 1)->get();
        return view('frontend.src.products.single-product.product', compact('products', 'product', 'reviews', 'product_colors', 'related_products', 'main_categories'));
    }

    public function show_product_modal($id)
    {
        $products = ProductsHelper::getActiveProducts();
        $product = Product::whereId($id)->where('status', 1)->with('images')->with('sizes')->first();
        if (!$product)
            abort(404);

        $main_categories = Category::where('parent_id', 0)->where('status', 1)->orderBy('menu_order', 'asc')
            ->with('parent')
            ->get();
        $related_products = ProductsHelper::get_related_products($id);
        $product_colors = ProductsHelper::get_product_colors($id);
        $reviews = Review::where('product_id', $product->id)->with('client')->where('status', 1)->get();
        return view('frontend.src.products.single-product.modals.product-modal-content', compact('products', 'product', 'reviews', 'product_colors', 'related_products', 'main_categories'));
    }

    public function searchProductSizeAPI()
    {
        $product = Product::find(request('product'));
        return $this->returnData(200, null, $product->sizes);

    }

    public function searchProductsAPI()
    {
        $getData = LibHelper::searchFilterProducts(null, null, null, null);
        return $this->returnData(true, null, $getData);
    }

    public function searchProducts()
    {
        $getData = LibHelper::searchFilterProducts(null, null, null, null);
        if (isset($getData['message']) && $getData['message'] != '')
            return redirect('/search')->with('error', $getData['message']);
        else
            return view('frontend.src.products.product-list.shop', $getData);
    }

    public function searchProductsCategory($id)
    {
        $getData = LibHelper::searchFilterProductsById($id);
        if (isset($getData['message']) && $getData['message'] != '')
            return redirect('/search')->with('error', $getData['message']);
        else
            return view('frontend.src.products.product-list.shop', $getData);
    }

    public function resetFilter()
    {
        $main_filters = Filter::where('parent_id', 0)->where('status', 1)->get();

        session()->put('priceFrom', 0);
        session()->put('priceTo', 100000);
        session()->put('colorFilter', null);
        session()->put('sizeFilter', null);
        foreach ($main_filters as $filter) {
            session()->put(str_replace(' ', '_', $filter->name_en), null);
        }
        session()->put('search', null);
        return redirect('/search');
    }

    public function clearSearch()
    {
        session()->put('search', null);
        return redirect('/search');
    }

    public function filterPrice()
    {
        $products = Product::query();
        $min = (int)request('minPrice');
        $max = (int)request('maxPrice');

        $products->whereBetween('price', [$min, $max]);
        $products = $products->where('status', 1)->latest()->paginate(15);
        $categories = Category::where('status', 1)->get();
        $main_categories = Category::where('parent_id', 0)->where('status', 1)->get();

        return view('frontend.src.products.product-list.shop', compact('products', 'categories', 'main_categories', 'min', 'max'));

    }

    public function showProductModal($id)
    {
        //show a single product
        $products = Product::where('status', 1)->get();
        $product = Product::whereId($id)->where('status', 1)->with('images')->with('sizes')->first();
        if (!$product)
            abort(404);

        $main_categories =
            Category::where('parent_id', 0)->where('status', 1) ->orderBy('menu_order', 'asc')
                ->with('parent')
                ->get();
        $product_colors = ProductsHelper::get_product_colors($id);
        $reviews = Review::where('product_id', $product->id)->with('client')->where('status', 1)->get();

        return view('frontend.src.products.single-product.modals.product-modal-content', compact('products', 'product', 'reviews', 'product_colors', 'main_categories'));
    }

    public function make_review($product_id) {
        $reviews = Review::where('status', 1)->where('product_id', $product_id)->get();
        foreach ($reviews as $review){
            if ($review->email == \request('email'))
                return  redirect()->back()->with('error','You have already sent your review for this product!');
        }

        request()->validate([
            'first_name' => ['required'],
            'email' => ['required', 'email'],
            'comment' => ['required'],
            'stars' => ['required'],
        ]);


        $review = new Review();
        $review->first_name          = request('first_name');
        $review->product_id          = $product_id;
        $review->user_id          = auth()->user()->id;
        $review->email   = request('email');
        $review->comment          = request('comment');
        $review->stars         = request('stars');
        if(request()->hasFile("file") && request()->file("file")->isValid()) {
            $url = ImageHelper::uploadFile(request()->file('file'), base_path('/public/assets/uploaded_gallery/reviews/' . $product_id));
            $review->image = 'assets/uploaded_gallery/reviews/' . $product_id . '/' . $url[0];
        }


        $review->save();

        return  redirect()->back()->with('success','Action preformed successfully!');


    }

    public function check_product_stock()
    {
        $items = json_decode(request('items'), true);
        $returnValue = true;
        foreach ($items as $i) {
            if (!ProductsHelper::check_stock_selected($i['p_id'],  $i['size'], $i['quantity'])) {
                $returnValue = false;
            }
        }
        return $this->returnData(200, null, $returnValue);
    }


}
