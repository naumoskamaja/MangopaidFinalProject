<?php

namespace App\Library;
use App\Models\Category;
use App\Models\ConvertCurrencies;
use App\Models\PageConfig;

class ConfigurationHelper
{
    static function getTodaysDate()
    {
        $today = date("Y-m-d", strtotime("now"));
        return $today;
    }

    static function echoJson($json, $lang)
    {
        $data = (array)($json);
        $return = null;
        if (isset($data[$lang])) {
            $return = $data[$lang];
        }
        return $return;
    }

    static function getConfig()
    {
        return PageConfig::where('admin_id', 1)->where('status', 1)->first();
    }

    static function get_main_categories()
    {
        return Category::where('parent_id', 0)->where('status', 1) ->orderBy('menu_order', 'asc')->with('parent')->get();
    }

    static function currency($price)
    {
        $currency = session()->get('currency');
        if ($currency == null)
            return (int)$price . ' €';

        $c = ConvertCurrencies::first();
        if ($c != null) {
            $c->toArray();
            if ($currency == ',')
                $price = floor($price * $c['lek']);
            elseif ($currency == 'mkd')
                $price = floor($price * $c['mkd']);
            elseif ($currency == 'usd')
                $price = floor($price * $c['usd']);
            else
                $price = floor($price * $c['eur']);

        }

        return (int)$price . ' ' . $currency;
    }

    static function price_with_discount($old_price, $percent_discount)
    {
        $discount = (float)$old_price * ((float)$percent_discount / 100);
        $new_price = (float)$old_price - (float)$discount;
        return (int)$new_price;
    }


}
