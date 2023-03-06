<?php

namespace App\Http\Controllers;

use App\Models\ConvertCurrencies;
use App\Models\Product;
use Termwind\Components\Dd;

class BaseController extends Controller
{
    public function currency()
    {
        $total = request('total');
        $shipping_price = request('shipping_price');
        $currency = session()->get('currency');
        if ($currency == null) {
            $totalString = $total . ' €';
            $shippingString = $shipping_price . ' €';
        } else {
            $c = ConvertCurrencies::first();
            if ($c != null) {
                $c->toArray();
                if ($currency == '$') {
                    $total = floor($total * $c['usd']);
                    $shipping_price = floor($shipping_price * $c['usd']);
                }
                if ($currency == 'MKD') {
                    $total = floor($total * $c['mkd']);
                    $shipping_price = floor($shipping_price * $c['usd']);
                }
                if ($currency == 'Lek') {
                    $total = floor($total * $c['lek']);
                    $shipping_price = floor($shipping_price * $c['lek']);
                } else {
                    $total = floor($total * $c['eur']);
                    $shipping_price = floor($shipping_price * $c['eur']);
                }
            }
            $totalString = number_format($total, 0) . ' ' . $currency;
            $shippingString = number_format($shipping_price, 0) . ' ' . $currency;
        }
        $returnString = [
            'total' => $totalString,
            'shipping_price' => $shippingString,
        ];
        return $this->returnData(200, '', $returnString);
    }

    public function getSuggestedProducts()
    {
        $price = request('price');
        $products = Product::where('price', '>=', (float)$price)->with('images')->limit(3)->get();
        foreach($products as &$p){
            $p->price = \App\Library\ConfigurationHelper::currency($p->price);
        }
        $products = Product::where('price', '>=', (float)$price)->with('images')->limit(3)->get();

        return $this->returnData(200, '', $products);
    }

}
