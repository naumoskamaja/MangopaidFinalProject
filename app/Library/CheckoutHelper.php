<?php

namespace App\Library;

use App\Models\Category;
use App\Models\CategoryBanner;
use App\Models\HomeBanner;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PageBanner;
use App\Models\PageConfig;
use App\Models\PageContent;
use App\Models\Product;

class CheckoutHelper
{
    static public function calculateShipping($country)
    {
        $conf = ConfigurationHelper::getConfig();
        $shipping_options = json_decode($conf->shipping_json, true);

        foreach (ConstHelper::regions as $region){
            if (strtolower($country) == $region) {
                $min_price = $shipping_options[$region]['min_price'];
                $working_days = $shipping_options[$region]['working_days'];
                $shipping_price = $shipping_options[$region]['shipping_price'];
            }
        }
        return [
            'min_price' => $min_price ?? 0,
            'working_days' => $working_days ?? '',
            'shipping_price' => $shipping_price ?? 0,
        ];
    }

}
