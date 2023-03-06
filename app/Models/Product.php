<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory;
    use Sortable;

    public $sortable = [
        'name',
        'code',
        'id',
        'created_at',
        'price'
    ];

    protected $fillable = [
        'name',
        'description',
        'code',
        'stock',
        'model',
        'short_description',
        'isNew',
        'status',
        'onSale',
        'price',
        'color',
        'color_code',
        'filters',
        'expert_tips'
    ];
    protected $casts = ['name' => 'array', 'short_description' => 'array', 'description' => 'array', 'expert_tips' => 'array', 'more_info' => 'array'];


    public function colors()
    {
        return $this->hasMany(ProductColor::class, 'product_id')->where('status', 1)->with('sizes')->with('images');
    }

    public function colorSizes()
    {
        return $this->hasMany(ColorSize::class, 'color_id')->where('status', 1);
    }

    public function sizes()
    {
        return $this->hasMany(ProductSize::class, 'product_id')->where('status', 1);
    }

    public function sizesFront()
    {
        return $this->hasMany(ProductSize::class, 'product_id')->where('status', 1)->where('stock', '>', 0);
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%')->orWhere('code', 'like', '%' . $search . '%');
    }

    public function images()
    {
        return $this->hasMany(Media::class, 'product_id');
    }

    public function tags()
    {
        return $this->hasMany(Tag::class, 'product_id');
    }

    public function myFilters()
    {
        return $this->hasMany(ProductFilter::class, 'product_id');
    }

    public function categories()
    {
        return $this->hasMany(ProductCategory::class, 'product_id')->where('category_id', '>', 0)->with('category');
    }

    public function selectedFilters()
    {
        return $this->hasMany(ProductFilter::class, 'product_id')->where('filter_id', '>', 0);
    }

    public function selectedFilterIds()
    {
        return $this->hasMany(ProductFilter::class, 'product_id')->pluck('filter_id');
    }

    public function seo()
    {
        return $this->hasOne(SeoInfo::class, 'product_id');
    }

    public function hasAction()
    {
        $today = Carbon::today()->format('Y-m-d');
        return $this->hasOne(ActionProduct::class, 'product_id')->where('status', 1)->where('valid_till', '>=', $today)->latest();
    }

    public function orderItem()
    {
        return $this->hasOne(OrderItem::class, 'product_id');
    }
}
