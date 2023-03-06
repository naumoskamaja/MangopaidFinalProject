<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class ActionCategory extends Model
{
    use HasFactory;
    use Sortable;

    public $sortable = [
        'category_id',
        'id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
