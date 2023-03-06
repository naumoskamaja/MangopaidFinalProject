<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterCategory extends Model
{
    use HasFactory;

    public function filter_category()
    {
        return $this->hasOne(Category::class, '_id', 'category_id');
    }

    public function filter()
    {
        return $this->belongsTo(Filter::class, 'filter_id');
    }

    public function active_filter()
    {
        return $this->belongsTo(Filter::class, 'filter_id')->where('status', 1);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
