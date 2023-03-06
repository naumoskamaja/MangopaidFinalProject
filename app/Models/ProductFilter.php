<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFilter extends Model
{
    public function prod_filter()
    {
        return $this->hasOne(Filter::class, 'id', 'filter_id');
    }


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id')->with('hasAction');
    }

    public function active_product()
    {
        return $this->belongsTo(Product::class, 'product_id')->where('status', 1)->with('images');
    }


    public function filter()
    {
        return $this->belongsTo(Filter::class, 'filter_id');
    }
}
