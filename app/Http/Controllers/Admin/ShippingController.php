<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\ConfigurationHelper;
use App\Library\ConstHelper;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function show()
    {
        $conf = ConfigurationHelper::getConfig();
        return view('admin.src.shipping.manage-shipping', compact('conf'));
    }

    public function store()
    {
        $shipping_json = [];
        $tmp = [];
        $conf = ConfigurationHelper::getConfig();

        foreach (request()->all() as $key => $value) {
            if ($key != '_token') {
                $combination = explode('-', $key);
                $name = $combination[0];
                $region = $combination[1];
                $regions = ConstHelper::regions;
                foreach ($regions as $item){
                    if ($region == $item) {
                        if ($name == 'min_price') {
                            $tmp[$item]['min_price'] = $value;
                        }
                        if ($name == 'shipping_price') {
                            $tmp[$item]['shipping_price'] = $value;
                        }
                        if ($name == 'working_days') {
                            $tmp[$item]['working_days'] = $value;
                        }
                    }
                }
            }
        }
        $shipping_json = json_encode($tmp);
        $conf->shipping_json = $shipping_json;
        $conf->save();

        return redirect('/admin/shipping')->with('success', 'Action performed successfully!');
    }
}
