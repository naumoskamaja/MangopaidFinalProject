<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\ImageHelper;
use App\Library\LibHelper;
use App\Models\Category;
use App\Models\Filter;
use App\Models\FilterCategory;

class CategoriesController extends Controller
{
    public function list()
    {
        $search = request('search');
        $categories = Category::sortable()->paginate(15);
        $page = 'categories';

        if ($search != "") {
            $categories = Category::where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%');
            })
                ->sortable()->paginate(15);
            $categories->appends(['search' => $search]);
        }
        return view('admin.src.categories.list', compact('categories', 'search', 'page'));
    }

    public function add()
    {
        $page = 'add-category';
        return view('admin.src.categories.add', compact('page'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $page = 'edit-category';
        $selectedRel = $category->filters;
        $selected_filters = $selectedRel->pluck('filter_id')->toArray();
        $categories = Category::where('status', 1)->get();
        $main_filters = Filter::where('status', 1)->where('parent_id', '0')->with('options')->get();
        return view('admin.src.categories.add', compact('categories', 'main_filters', 'category', 'selected_filters', 'page'));
    }

    public function store()
    {
        if (\request('category_id') == 0)
            $category = new Category();
        else
            $category = Category::findOrFail(\request('category_id'));


        if (request()->hasFile("image") && request()->file("image")->isValid()) {
            $url = ImageHelper::uploadFile(request('image'), base_path('/public/assets/uploaded_gallery/categories'));
            $category->image = 'assets/uploaded_gallery/categories/' . $url[0];
        }

        if (request()->hasFile("shop_section_banner") && request()->file("shop_section_banner")->isValid()) {
            $url = ImageHelper::uploadFile(request('shop_section_banner'), base_path('/public/assets/uploaded_gallery/categories/shop_section_banners'));
            $category->shop_section_banner = 'assets/uploaded_gallery/categories/shop_section_banners/' . $url[0];
        }

        $category->title = \request('title');
        $category->status = 1;
        $category->parent_id = \request('parent_id');

//        check if there is a category with the same title and parent as current category
        if (!LibHelper::check_category_name(request('category_id'), request('title'), request('parent_id')))
            return redirect()->back()->with('error', __('website.this-category-name-has-already-been-taken'));

        $category->save();
        $selectedFilters = \request('selectedFilters');
        FilterCategory::where('category_id', $category->id)->delete();
        LibHelper::setSelectedFilters($selectedFilters, $category);
        return redirect('/admin/categories')->with('success', __('website.action-performed-successfully'));
    }

    public function change_status($id, $status)
    {
        $category = Category::findOrFail($id);
        $redirect_page = 'categories';
        return LibHelper::change_status($category, $status, $redirect_page);
    }
}
