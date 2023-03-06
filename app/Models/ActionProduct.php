<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class ActionProduct extends Model
{
    use HasFactory;
    use Sortable;

    public $sortable = [
        'product_id',
        'id'
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
