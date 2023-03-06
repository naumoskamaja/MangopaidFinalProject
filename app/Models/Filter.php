<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Filter extends Model
{
    use HasFactory;
    use Sortable;

    protected $casts = ['title' => 'array'];


    public $sortable = [
        'title',
        'id'
    ];

    public function options()
    {
        return $this->hasMany(Filter::class, 'parent_id', 'id')->where('status', 1);
    }

    public function parent()
    {
        return $this->belongsTo(Filter::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(ProductFilter::class, 'filter_id')->with('product')->with('active_product');
    }
}
