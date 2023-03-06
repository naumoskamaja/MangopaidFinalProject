<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\ImageHelper;
use App\Library\LibHelper;
use App\Models\PageBanner;

class PageBannerController extends Controller
{
    public function list()
    {
        $banners = PageBanner::all();
        $page = 'page-banners';
        return view('admin.src.section-banners.list', compact('banners', 'page'));
    }

    public function add()
    {
        $page = 'add-banner';
        return view('admin.src.section-banners.add', compact('page'));
    }

    public function store()
    {
        request()->validate([
            'page' => ['required'],
        ]);

        if (request('banner_id') == 0) {
            $banner = new PageBanner();
        } else {
            $banner = PageBanner::findOrFail(request('banner_id'));
            $same_section_banner = PageBanner::where('page', \request('page'))->where('id', '!=', \request('banner_id'))->first();
            if ($same_section_banner != null)
                return redirect('/admin/section_banner/show/' . $banner->id)->with('error', __('website.this-section-has-already-had-a-banner-image-please-update-current-banner-about-this-section-instead-of-adding-a-new-banner'));
        }
        $banner->page = request('page');
        $banner->status = 1;
        if (request()->hasFile("image") && request()->file("image")->isValid()) {
            $url = ImageHelper::uploadFile(request('image'), base_path('/public/assets/uploaded_gallery/section_banners'));
            $banner->image = 'assets/uploaded_gallery/section_banners/' . $url[0];
        }
        $banner->save();
        return redirect('/admin/section_banners')->with('success', 'Action performed successfully!');
    }

    public function edit($id)
    {
        $banner = PageBanner::findOrFail($id);
        $page = 'edit-banner';
        return view('admin.src.section-banners.add', compact('banner', 'page'));
    }

    public function change_status($id, $status)
    {
        $banner = PageBanner::findOrFail($id);
        $redirect_page = 'section_banners';
        return LibHelper::change_status($banner, $status, $redirect_page);
    }

}
