<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use App\Models\Product;
use App\Models\Subscriber;
use App\Models\Video;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $shop_information = PageContent::where('slug', 'home_page_info')->whereStatus(1)->latest()->limit(3)->get();
        $top_products = Product::where('status', 1)->latest()->limit(3)->get();
        $bestsellers = Product::where('status', 1)->orderBy('count_ordered', 'desc')->limit(8)->get();
        $video = Video::where('status', 1)->first();
        return view('frontend.src.home.home', compact('top_products', 'shop_information', 'bestsellers', 'video'));
    }

    public function subscribe()
    {
        request()->validate([
            'email' => ['required', 'email', 'unique:subscribers'],
        ]);
        $subscriber = new Subscriber();
        $subscriber->email = request('email');
        $subscriber->save();

        return redirect()->back()->with('success', __('website.action-performed-successfully'));

    }

}
