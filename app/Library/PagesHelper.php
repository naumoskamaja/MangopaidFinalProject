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

class PagesHelper
{
    static function getPageAttirbutes($page){
        $paragraphs = PageContent::where('slug', $page)->whereStatus(1)->get();
        $banner = PageBanner::where('page', $page)->whereStatus(1)->first();
        $myData = [
            'paragraphs' => $paragraphs,
            'banner' => $banner,
        ];

        return $myData;

    }

    static function getCartData($page){
        $carts = [];
        if (session($page)) {
            foreach (session($page) as $c) {
                $carts[] = $c['p_id'];
            }
        }
        $cart_products = Product::whereIn('id', $carts)->where('status', 1)->with('categories')->with('hasAction')->get();
        $banner = PageBanner::where('page', $page)->whereStatus(1)->first();

        $myData = [
            'cart_products' => $cart_products,
            'banner' => $banner,
        ];

        return $myData;

    }

}
