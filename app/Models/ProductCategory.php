<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    public function prod_category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id')->with('hasAction');
    }

    public function active_product()
    {
        return $this->belongsTo(Product::class, 'product_id')->where('status', 1)->with('images');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->with('hasAction');
    }
}
