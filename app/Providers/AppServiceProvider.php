<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\ConvertCurrencies;
use App\Models\Coupon;
use App\Models\PageConfig;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $conf = PageConfig::first();
        $main_categories = Category::where('parent_id', 0)->where('status', 1)
            ->orderBy('menu_order', 'asc')
            ->with('parent')
            ->get();

        $currency_convertor = ConvertCurrencies::first();
        if ($currency_convertor==null){
            $currency_convertor = new ConvertCurrencies();
            $currency_convertor->mkd = 1;
            $currency_convertor->usd = 1;
            $currency_convertor->eur = 1;
            $currency_convertor->lek = 1;
            $currency_convertor->status = 1;
            $currency_convertor->save();

        }

        if ($conf == null) {
            $conf = new PageConfig();
            $conf->company_name = 'Mangopaid';
            $conf->admin_id = 1;
            $conf->status = 1;
            $conf->currency = '€';
            $conf->save();
        }

        $coupon = Coupon::where('status', 1)->where("end_date",">=",date("Y-m-d"))->where("start_date","<=",date("Y-m-d"))->latest()->first();

        view()->share('coupon', $coupon);
        view()->share('conf', $conf);
        view()->share('main_categories', $main_categories);
    }
}
