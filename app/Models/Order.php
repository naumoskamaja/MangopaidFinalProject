<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Order extends Model
{
    use HasFactory;
    use Sortable;

    public $sortable = [
        'created_at',
        'status',
        'id'
    ];

    protected $casts = [
        'coupon' => 'json'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id')->with('product');
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%' . $search . '%')->orWhere('created_at', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%');
    }
}
