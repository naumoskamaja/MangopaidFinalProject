<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    use HasFactory;
    protected $casts = ['title' => 'array'];
    use Sortable;

    public $sortable = [
        'title',
        'id'
    ];

    public function hasAction()
    {
        $today = Carbon::today()->format('Y-m-d');
        return $this->hasOne(ActionCategory::class, 'category_id')->where('status', 1)->where('valid_till', '>=', $today)->latest();
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id')->with('parent')->where('status', 1);
    }

    public function subCategoriesId()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id')->where('status', 1)->pluck('id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id')->where('status', 1)->with('products');
    }

    public function products()
    {
        return $this->hasMany(ProductCategory::class, 'category_id')->with('product')->with('active_product');
    }

    public function filters()
    {
        return $this->hasMany(FilterCategory::class, 'category_id')->with('filter')->with('active_filter');
    }

    public function filtered()
    {
        return $this->belongsToMany(Product::class, 'product_categories', 'category_id', 'product_id');
    }

    public function related()
    {
        return $this->belongsToMany(Product::class, 'product_categories', 'category_id', 'product_id')->where('status', 1)->with('categories')->inRandomOrder()->limit(4);
    }

}
