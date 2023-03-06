<?php

namespace App\Library;

use App\Models\Category;
use App\Models\CategoryBanner;
use App\Models\HomeBanner;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PageBanner;
use App\Models\PageContent;
use App\Models\Product;

class BannersHelper
{
    static function getBannersFrontend(){
        //banners: place 1 (slider), place 2 (two large banners), place 3 (side text slider), place 4 (fullwidth banner),  place 5 (two parallel banners)
        $sliders = HomeBanner::where('place', 1)
            ->where('status', 1)
            ->orderBy('order')
            ->limit(5)
            ->get();
        $two_parallel_banners = HomeBanner::where('place', 5)->orderBy('order')->where('status', 1)->inRandomOrder()->limit(2)->get();
        $side_text_sliders = HomeBanner::where('place', 3)->orderBy('order')->where('status', 1)->inRandomOrder()->get();
        $fullwidth_banner = HomeBanner::where('place', 4)->orderBy('order')->where('status', 1)->inRandomOrder()->first();
        $two_large_banners = HomeBanner::where('place', 2)->orderBy('order')->where('status', 1)->inRandomOrder()->limit(2)->get();
        $four_banner_categories = Category::where('status', 1)->limit(4)->get();
        $category_banners = CategoryBanner::where('status', 1)->limit(4)->with('category')->get();
        $banner_subscribe = PageBanner::where('page', 'subscribe_section')->whereStatus(1)->first();

        $myData = [
            'two_large_banners' => $two_large_banners,
            'two_parallel_banners' => $two_parallel_banners,
            'sliders' => $sliders,
            'fullwidth_banner' => $fullwidth_banner,
            'side_text_sliders' => $side_text_sliders,
            'category_banners' => $category_banners,
            'four_banner_categories' => $four_banner_categories,
            'banner_subscribe' => $banner_subscribe,
        ];

        return $myData;

    }
    static function getBannersAdmin(){
        //banners: place 1 (slider), place 2 (two large banners), place 3 (side text slider), place 4 (fullwidth banner),  place 5 (two parallel banners)
        $sliders = HomeBanner::where('place', 1)->orderBy('order')->get();
        $two_large_banners = HomeBanner::where('place',2)->orderBy('order')->get();
        $side_text_sliders = HomeBanner::where('place', 3)->orderBy('order')->get();
        $fullwidth_banners = HomeBanner::where('place', 4)->orderBy('order')->get();
        $two_parallel_banners = HomeBanner::where('place', 5)->orderBy('order')->get();
        $category_banners = CategoryBanner::where('status', 1)->with('category')->limit(4)->get();
        $four_banner_categories = Category::where('status', 1)->limit(4)->get();

        $myData = [
            'two_large_banners' => $two_large_banners,
            'two_parallel_banners' => $two_parallel_banners,
            'sliders' => $sliders,
            'fullwidth_banners' => $fullwidth_banners,
            'side_text_sliders' => $side_text_sliders,
            'category_banners' => $category_banners,
            'four_banner_categories' => $four_banner_categories,
        ];

        return $myData;

    }

}
