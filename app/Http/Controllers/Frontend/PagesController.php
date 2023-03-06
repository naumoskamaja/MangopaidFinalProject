<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PageBanner;
use App\Models\PageContent;

class PagesController extends Controller
{
    public function render_page_content($page){
        return view('frontend.src.pages.page', compact('page'));
    }
}
