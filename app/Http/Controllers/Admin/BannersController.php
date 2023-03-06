<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\ImageHelper;
use App\Library\LibHelper;
use App\Models\Category;
use App\Models\CategoryBanner;
use App\Models\HomeBanner;

class BannersController extends Controller
{
    public function list()
    {

        $categories = Category::where('status', 1)->get();
        $page = 'banners';
        return view('admin.src.banners.list', compact('categories', 'page'));
    }

    public function add()
    {
        $page = 'add-banner';
        return view('admin.src.banners.add-banner', compact('page'));
    }

    public function store()
    {
        if (\request('banner_id') == 0) {
            $banner = new HomeBanner();
            $same_type_banners = HomeBanner::where('place', (int)request('place'))->get();
            $banner->order = count($same_type_banners) + 1;
        } else {
            $banner = HomeBanner::find(\request('banner_id'));
        }

        $banner->title = request('title');
        $banner->subtitle = request('subtitle');
        $banner->description = request('description');
        $banner->place = (int)request('place');
        $banner->link = request('link');

        if (request()->hasFile("image") && request()->file("image")->isValid()) {
            $url = ImageHelper::uploadFile(request('image'), base_path('/public/assets/uploaded_gallery/banners'));
            $file = $url[0];
            $banner->image = 'assets/uploaded_gallery/banners/' . $file;
        }

        if (request()->hasFile("mobile_image") && request()->file("mobile_image")->isValid()) {
            $url = ImageHelper::uploadFile(request('mobile_image'), base_path('/public/assets/uploaded_gallery/banners/mobile'));
            $file = $url[0];
            $banner->mobile_image = 'assets/uploaded_gallery/banners/mobile/' . $file;
        }

        $banner->save();

        return redirect('/admin/banner/show/' . $banner->id)->with('success', 'Action performed successfully!');

    }

    public function edit($id)
    {
        $page = 'edit-banner';
        $banner = HomeBanner::findOrFail($id);
        return view('admin.src.banners.add-banner', compact('banner', 'page'));
    }

    public function change_status($id, $status)
    {
        $banner = HomeBanner::findOrFail($id);
        $redirect_page = 'banners';
        return LibHelper::change_status($banner, $status, $redirect_page);
    }

    public function change_order($place, $id, $order)
    {
        if ($order == 'down')
            $value = 1;
        else
            $value = -1;

        $currentBanner = HomeBanner::findOrFail($id);
        $newPlace = $currentBanner->order + $value;
        $oldBanner = HomeBanner::where('order', $newPlace)->where('place', $place)->first();
        if (isset($oldBanner) && $oldBanner != null) {
            $oldBanner->order = $oldBanner->order - $value;
            $oldBanner->save();
        }

        $currentBanner->order = $newPlace;
        $currentBanner->save();
        return redirect()->back()->with('success', 'Action performed successfully!');
    }

    public function add_category_banners()
    {
        $catBanners = CategoryBanner::all();
        foreach ($catBanners as $banner) {
            $banner->delete();
        }
        foreach (request('category') as $key => $cat) {
            $category = new CategoryBanner();
            $category->category_id = (int)$cat;
            $category->link = request('link_' . $key);
            $category->status = 1;
            $category->save();
        }
        return redirect()->back()->with('success', 'Action Performed Successfully');
    }
//
//    public function manageBannersFromCategories()
//    {
//        return view('admin.src.banners.manage-category-banners');
//    }
//
//    public function addCategoryBanner()
//    {
//        return view('admin.src.banners.add-category-banner');
//    }
//
//    public function editCategoryBanner($id)
//    {
//        Home_section::findOrFail($id);
//        $bannerId = $id;
//        return view('admin.src.banners.add-category-banner', compact('bannerId'));
//    }
//
//    public function getCurrencies()
//    {
//        $currency = Currency::where('status', 1)->first();
//        if ($currency == null) {
//            $currency = new ConvertCurrencies();
//            $currency->mkd = 1;
//            $currency->eur = 1;
//            $currency->usd = 1;
//            $currency->lek = 1;
//            $currency->save();
//        }
//        return $this->returnData(true, '', $currency);
//    }
//
//    public function calculateCurrencies()
//    {
//        $currency = Currency::where('status', 1)->first();
//        $conf = PageConfig::where('status', 1)->first();
//        $ret = [];
//        $ret['mkd'] = $currency->mkd;
//        $ret['usd'] = $currency->usd;
//        $ret['eur'] = $currency->eur;
//        $ret['lek'] = $currency->lek;
//        return $this->returnData(true, 'Currency', $ret);
//    }
}
