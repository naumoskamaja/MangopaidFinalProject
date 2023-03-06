<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Coupon extends Model
{
    use HasFactory;
    use Sortable;

    public $sortable = [
        'code',
        'id'
    ];

    protected $fillable = [
        'code',
        'value',
        'type',
        'start_date',
        'end_date',
        'nr',
        'image'
    ];

}
