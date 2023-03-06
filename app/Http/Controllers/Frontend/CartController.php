<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Library\CommonHelper;
use App\Library\ProductsHelper;
use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function wishlist()
    {
        $page = 'wishlist';
        return view('frontend.src.wishlist.wishlist', compact('page'));
    }

    public function add_to_wishlist($product_id)
    {
        $product = Product::where('id', $product_id)->with('categories')->first();
        if (!$product) {
            abort(404);
        }
        $productName = $product->name[__('website.lang') ?? 'en'];
        $price = ProductsHelper::get_product_price($product_id)['newPrice'];
        $wishlist = session()->get('wishlist');
        if (isset($product->images[0]))
            $img = $product->images[0]->image;
        else
            $img = '/assets/noimg.png';
        // if wishlist is empty then this the first product

        if (!$wishlist) {
            $wishlist = [
                $product_id => [
                    "p_id" => $product->id,
                    "title" => $productName,
                    "price" => $price,
                    "image" => $img
                ]
            ];
            session()->put('wishlist', $wishlist);
            return redirect()->back()->with('success', 'Product added to wishlist successfully!');
        }

        // if item not exist in wishlist then add to wishlist
        if (!isset($wishlist[$product_id])) {
            $wishlist[$product_id] = [
                "p_id" => $product->id,
                "title" => $productName,
                "price" => $price,
                "image" => $img
            ];
        }
        session()->put('wishlist', $wishlist);
        return redirect()->back()->with('success', 'Product added to wishlist successfully!');
    }

    public function remove_product_from_wishlist(Request $request)
    {
        if ($request->id) {
            $wishlist = session()->get('wishlist');
            if (isset($wishlist[$request->id])) {
                unset($wishlist[$request->id]);
                session()->put('wishlist', $wishlist);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function delete_product_from_wishlist($index)
    {
        $session = session('wishlist');
        unset($session[$index]);
        session(['wishlist' => $session]);
        return redirect()->back()->with('success', 'Action performed successfully!');
    }

    public function cart()
    {
        $page = 'cart';
        return view('frontend.src.cart.cart', compact('page'));
    }

    public function add_to_cart($product_id)
    {
        $product = Product::where('id', $product_id)->with('categories')->first();
        if (!$product) {
            abort(404);
        }
        $product_name = $product->name[__('website.lang') ?? 'en'];
        $price = ProductsHelper::get_product_price($product_id)['newPrice'];
        $old_price = ProductsHelper::get_product_price($product_id)['oldPrice'];
        $discount = ProductsHelper::get_product_price($product_id)['discount'];

        if (isset($product->images[0]))
            $img = $product->images[0]->image;
        else
            $img = '/assets/noimg.png';

        $selectedSize = '';
        if (count($product->sizes) > 0) {
            if (\request('selectedSize') == null)
                return redirect('/show/' . $product_id)->with('error', __('website.please-select-a-size-and-try-again'));
            $selectedSize = \request('selectedSize');
        }
        if (!ProductsHelper::check_stock_selected($product_id, $selectedSize, (int)\request('quantity')))
            return redirect()->back()->with('error', __('website.product-is-out-of-stock'));
        $cart = session()->get('cart');

        if ($cart == null) {

            $cart[] = [
                "p_id" => $product_id,
                "code" => $product->code,
                "title" => $product_name,
                "quantity" => (int)\request('quantity'),
                "price" => $price,
                "image" => $img,
                "size" => $selectedSize,
                "old_price" => $old_price,
                'discount_price' => $discount,
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('successAddToCart', 'Product added to cart successfully!');
        }
        $exist = false;
        $index = -1;
        $qty = 0;
        foreach ($cart as $i => $item) {
            if (!$exist) {
                if (request('selectedSize') != null) {
                    if ($item['p_id'] == $product_id && $item['size'] == $selectedSize && $item['code'] == $product->code) {
                        $size = ProductSize::where('size', request('selectedSize'))->first();
                        if ($size != null) {
                            $qty = (int)$item['quantity'] + (int)request('quantity');
                            if ($qty > (int)$size->stock) {
                                return redirect('/show/' . $product_id)->with('error', __('website.product-out-of-stock'));
                            }
                            $index = $i;
                            $exist = true;
                        }
                    }
                } else {
                    if ($item['p_id'] == $product_id) {
                        $qty = (int)$item['quantity'] + (int)request('quantity');
                        if ($qty > (int)$product->stock) {
                            return redirect('/show/' . $product_id)->with('error', __('website.product-out-of-stock'));
                        }
                        $index = $i;
                        $exist = true;
                    }
                }
            }
        }
        if ($index >= 0) {
            $cart[$index]['quantity'] = $qty;
            $cart[$index]['price'] = $price;
        }
        if (!$exist) {
            $cart[] = [
                "p_id" => $product->id,
                "code" => $product->code,
                "title" => $product_name,
                "quantity" => request('quantity'),
                "price" => $price,
                "image" => $img,
                "size" => $selectedSize,
                "old_price" => $old_price,
                "discount_price" => $discount

            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('successAddToCart', 'Product added to cart successfully!');


    }

    public function delete_product_from_cart($index)
    {
        $session = session('cart');
        unset($session[$index]);
        session(['cart' => $session]);
        return redirect()->back()->with('success', 'Action performed successfully!');
    }



}
