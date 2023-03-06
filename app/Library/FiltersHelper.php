<?php

namespace App\Library;

use App\Models\Category;
use App\Models\CategoryBanner;
use App\Models\Filter;
use App\Models\HomeBanner;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PageBanner;
use App\Models\PageContent;
use App\Models\Product;

class FiltersHelper
{
    static function getMainFilters(){
        return Filter::where('parent_id', 0)->where('status', 1)->get();;
    }

}
