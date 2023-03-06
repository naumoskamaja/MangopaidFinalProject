<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Library\ConfigurationHelper;
use App\Mail\ContactMail;
use App\Mail\FindSizeMail;
use App\Models\PageBanner;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        $page = 'contact_page';
        $banner = PageBanner::where('page', $page)->whereStatus(1)->first();
        return view('frontend.src.contact.contact', compact('banner', 'page'));
    }

    public function make_request()
    {
        $conf = ConfigurationHelper::getConfig();
        request()->validate([
            'email' => ['email', 'required'],
            'message' => ['required']
        ]);

        $email = \request('email');
        $message = \request('message');
        $pageUrl = url()->to("/");

        $myData = [
            'email' => $email,
            'message' => $message,
            'conf' => $conf,
            'pageUrl' => $pageUrl
        ];

        Mail::to($conf->email)->send(new ContactMail($myData));
        return redirect('/contact')->with('success', 'Message sent!');

    }

    public function help()
    {

        $conf = ConfigurationHelper::getConfig();
        request()->validate([
            'email' => ['email', 'required'],
            'message' => ['required'],
            'phone' => ['required'],
            'product' => ['required'],
        ]);

        $email = \request('email');
        $message = \request('message');
        $phone = \request('phone');
        $product = Product::findOrFail(\request('product'));
        $pageUrl = url()->to("/");

        $myData = [
            'email' => $email,
            'message' => $message,
            'phone' => $phone,
            'conf' => $conf,
            'product' => $product,
            'pageUrl' => $pageUrl
        ];
        Mail::to($conf->email)->send(new FindSizeMail($myData));
        return redirect()->back()->with('success', 'Message sent!');
    }
}
