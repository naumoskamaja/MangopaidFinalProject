<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\ConfigurationHelper;
use App\Models\Category;
use Illuminate\Http\Request;

class StyleController extends Controller
{
    public function customization(){
        $page = 'home-page-customization';

        return view('admin.src.customization.customization', compact('page'));

    }

    public function set_style($style){
        $conf = ConfigurationHelper::getConfig();
        $categories = Category::where('status',1)->get();
        $conf->template = (int)$style;
        $conf->save();
        return redirect('/admin/customization')->with('Action performed successfully');
    }

}
