<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\ImageHelper;
use App\Library\LibHelper;
use App\Library\ProductsHelper;
use App\Models\Category;
use App\Models\Filter;
use App\Models\Media;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductFilter;
use App\Models\SeoInfo;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function list()
    {
        $search = request('search');
        $products = Product::where('status', '!=', 99)->with('images')->sortable()->paginate(15);
        $removed_products = Product::where('status', 99)->get();
        $page = 'products';

        if ($search != "") {
            $products = Product::where(function ($query) use ($search) {
                $query->where('status', 'like', '%' . $search . '%')
                    ->orWhere('name', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%');
            })
                ->where('status', '!=', 99)->with('images')->sortable()->paginate(15);
            $products->appends(['search' => $search]);
        }
        return view('admin.src.products.list', compact('removed_products', 'products', 'search', 'page'));

    }

    public function revert()
    {
        $removed_products = Product::where('status', 99)->get();
        if (count($removed_products) > 0) {
            foreach ($removed_products as $product) {
                $product->status = 1;
                $product->save();
            }
        }
        return redirect()->back()->with('success', __('website.action-performed-successfully'));
    }

    public function add()
    {
        $page = 'add-product';
        $categories = Category::where('status', 1)->get();
        $main_filters = Filter::where('status', 1)->where('parent_id', '0')->get();
        return view('admin.src.products.add', compact('categories', 'main_filters', 'page'));
    }
    public function edit($id)
    {
        $page = 'edit-product';
        $edit = true;
        $product = Product::where('id', $id)->with('sizes')->with('images')->first();
        $tags = Tag::where('product_id', $product->id)->get();
        $categories = Category::where('status', 1)->get();
        $product->tags = ProductsHelper::tagsString($tags);
        $main_filters = Filter::where('status', 1)->where('parent_id', '0')->get();

        return view('admin.src.products.add', compact('edit', 'main_filters', 'product', 'tags', 'categories', 'page'));
    }


    public function store()
    {
        try {
            $validation = Validator::make(\request()->all(), [
                'code' => 'required',
                'stock' => 'required',
                'price' => 'required',
                'categories' => 'required|array|min:1',
                'categories.*' => 'required',
            ]);
            if ($validation->fails()) {
                return redirect()->back()->with('error', $validation->errors()->first());
            }

            if (request('product_id') != 0)
                $product = Product::find(request('product_id'));
            else
                $product = new Product();

            if (request('categories') == null)
                return redirect()->back()->with('error', $validation);

            //multi language product attributes
            $languages = LibHelper::languages;
            $json_name = [];
            $json_short_description = [];
            $json_description = [];
            $json_expert_tips = [];
            $json_more_info = [];
            foreach ($languages as $lang) {
                $json_name[$lang] = \request('name_' . $lang);
                $json_short_description[$lang] = \request('short-description-' . $lang);
                $json_description[$lang] = \request('description_' . $lang);
                $json_expert_tips[$lang] = \request('expert_tips_' . $lang);
                $json_more_info[$lang] = \request('more_info_' . $lang);
            };

            $product->name = $json_name;
            $product->description = $json_description;
            $product->expert_tips = $json_expert_tips;
            $product->more_info = $json_more_info;
            $product->short_description = $json_short_description;
            $product->code = request('code');
            $product->isBestseller = 0;
            if (request('isBestseller')!=null)
            $product->isBestseller = request('isBestseller');
            $product->stock = request('stock');
            $product->price = request('price');
            $product->productKey = request('productKey');
            $product->color = "";

            if (request('isNew') != null)
                $product->isNew = 1;
            else
                $product->isNew = 0;
            if (request('status') != null)
                $product->status = 1;
            if (request('onSale') != null)
                $product->onSale = 1;

            $main_filters = Filter::where('parent_id', 0)->where('status', 1)->get();
            $selectedFilterOptionIds = [];
//            Upload Image
            if (request()->hasFile("descriptionImage") && request()->file("descriptionImage")->isValid()) {
                $url = ImageHelper::uploadFile(request('descriptionImage'), base_path('/public/assets/uploaded_gallery/products/descriptionImages'));
                $file = $url[0];
                $product->description_image = 'assets/uploaded_gallery/products/descriptionImages/' . $file;
            }
            $product->filters = [];
            foreach ($main_filters as $filter) {
                if (request('_' . str_replace(' ', '_', strtolower($filter->title['en']))) != null && count(request('_' . str_replace(' ', '_', strtolower($filter->title['en'])))) > 0) {
                    $selectedOptions = request('_' . str_replace(' ', '_', strtolower($filter->title['en'])));
                    foreach ($selectedOptions as $selectedOption) {
                        if (!in_array($selectedOption, $selectedFilterOptionIds)) {
                            $selectedFilterOptionIds[] = (int)$selectedOption;


                        }
                    }
                }
            }

            $selectedFilterOptionIds = json_encode($selectedFilterOptionIds);
            $product->filters = $selectedFilterOptionIds;

            $product->save();

//            Test
            ProductFilter::where('product_id', $product->id)->delete();
            foreach ($main_filters as $filter) {
                if ((request('_' . str_replace(' ', '_', strtolower($filter->title['en'])))) != null && count(request('_' . str_replace(' ', '_', strtolower($filter->title['en'])))) > 0) {
                    foreach (request('_' . str_replace(' ', '_', strtolower($filter->title['en']))) as $selectedFilter) {
                        $pFilter = new ProductFilter();
                        $pFilter->product_id = $product->id;
                        $pFilter->filter_id = $selectedFilter;
                        $pFilter->save();;
                    }
                }
            }
//            EndTest

            $product->save();

            $seo = SeoInfo::where('product_id', $product->id)->first();
            if ($seo == null) {
                $seo = new SeoInfo();
                $seo->product_id = $product->id;
            }
            $seo->url_key = request('seoUrlKey');
            $seo->title = request('seoTitle');
            $seo->description = request('seoDescription');
            $seo->save();

            Tag::where('product_id', $product->id)->delete();
            $tags = explode(',', request('tags'));
            foreach ($tags as $t) {
                $tag = new Tag();
                $tag->product_id = $product->id;
                $tag->tag = $t;
                $tag->save();
            }

            $prodCategories = ProductCategory::where('product_id', $product->id)->get();
            foreach ($prodCategories as $prodCat) {
                if ($prodCat->category_id != 0) {
                    $categ = Category::find($prodCat->category_id);
                    if (isset($categ) && $categ != null) {
                        $categ->counted_products = $categ->counted_products - 1;
                        $categ->save();
                    }
                }
            }


            ProductCategory::where('product_id', $product->id)->delete();
            foreach (request('categories') as $category) {
                $pCategory = new ProductCategory();
                $pCategory->product_id = $product->id;
                $pCategory->category_id = $category;
                $pCategory->save();;
                $cat = Category::findOrFail($category);

                $cat->counted_products = $cat->counted_products + 1;
                $cat->save();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e);
        }
        return redirect('admin/product/show/' . $product->id)->with('success', 'Action preformed successfully!');
    }

    public function clone($id)
    {
        $product = Product::where('id', $id)->with('categories')->first();
        if ($product==null)
            return abort(404);
        $categories = Category::where('status', 1)->get();
        $newProduct = new Product();
        $newProduct->name = $product->name;
        $newProduct->description = $product->description;
        $newProduct->code = $product->code . '-cloned' . uniqid();
        $newProduct->stock = $product->stock;
        $newProduct->price = $product->price;
        $newProduct->productKey = $product->productKey;
        $newProduct->color = $product->color;
        $newProduct->isNew = 1;
        $newProduct->status = 1;
        $newProduct->onSale = 1;
        $newProduct->save();

        foreach ($product->categories as $category) {
            $pCategory = new ProductCategory();
            $pCategory->product_id = $newProduct->id;
            $pCategory->category_id = $category->category_id;
            $pCategory->save();
        }

        return redirect('admin/products')->with('success', 'Action preformed successfully!');
    }

    public function change_status($id, $status)
    {
        $product = Product::findOrFail($id);
        $redirect_page = 'products';
        return LibHelper::change_status($product, $status, $redirect_page);
    }



}
