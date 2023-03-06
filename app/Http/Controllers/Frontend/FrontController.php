<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Library\ConfigurationHelper;
use App\Models\Order;
use App\Models\PageBanner;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //set currency, language
    public function set_session($session_name, $value)
    {
        session()->put($session_name, $value);
        return redirect()->back();
    }


    public function show_order_tracking($id)
    {
        $order = Order::where('id', $id)->first();
        $conf = ConfigurationHelper::getConfig();
        $banner = PageBanner::where('page', 'tracking_order_page')->whereStatus(1)->first();

        return view('frontend.src.tracking.order-tracking', compact('order', 'conf', 'banner'));

    }

    public function render_sitemap() {
        return view('frontend.src.pages.sitemap.sitemap');
    }



}
