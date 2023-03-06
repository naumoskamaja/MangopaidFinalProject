<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\ConfigurationHelper;
use App\Library\ImageHelper;
use App\Library\LibHelper;
use App\Models\PageConfig;
use App\Models\TelescopeEntrie;
use App\Models\TelescopeEntriesTag;
use Illuminate\Http\Request;

class PageConfigController extends Controller
{
    public function profile()
    {
        return view('admin.src.profile.profile');
    }

    public function settings()
    {
        $conf = ConfigurationHelper::getConfig();
        if (request()->isMethod('post')) {

            $conf->company_name = \request('company_name');
            $conf->email = \request('email');
            $conf->phone = \request('phone');
            $conf->address = \request('address');
            $conf->facebook = \request('facebook');
            $conf->instagram = \request('instagram');

            if (request()->hasFile("image") && request()->file("image")->isValid()) {
                $url = ImageHelper::uploadFile(request('image'), base_path('/public/assets/uploaded_gallery/logo'));
                $file = $url[0];
                $conf->logo = 'assets/uploaded_gallery/logo/' . $file;
            }

            $conf->save();
            return redirect()->back()->with('success', 'Action Performed Successfully');
        }
        $image = $conf->logo;
        return view('admin.src.settings.settings', compact('image'));
    }

    public function delete_logo(){
        $conf = ConfigurationHelper::getConfig();
        $conf->logo = '';
        $conf->save();
        return redirect()->to('/admin/profile/settings')->with('success', 'Action performed successfully!');
    }

    public function add_shipping_fee()
    {
        $conf = ConfigurationHelper::getConfig();
        request()->validate([
            'shipping_fee' => ['required']
        ]);

        $conf->shipping_fee = request('shipping_fee');
        $conf->save();

        return redirect()->to('/admin/profile')->with('success', 'Action performed successfully!');
    }

    public function show()
    {
        $conf = ConfigurationHelper::getConfig();
        return view('admin.src.settings.company-info', compact('conf'));
    }
    public function set_shop_information()
    {
        $conf = ConfigurationHelper::getConfig();
        $languages = LibHelper::languages;
        $json_shop_information = [];
        foreach ($languages as $lang) {
            $json_shop_information[$lang] = \request('shop_information_' . $lang);
        }
        $conf->shop_information = $json_shop_information;
        $conf->save();

        return redirect()->back()->with('success', 'Action performed successfully');
    }

    public function clearTelescope()
    {
        DB::statement("SET foreign_key_checks=0");
        TelescopeEntrie::truncate();
        TelescopeEntriesTag::truncate();
        DB::statement("SET foreign_key_checks=1");
    }
}
