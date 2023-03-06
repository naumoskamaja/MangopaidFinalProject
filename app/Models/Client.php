<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Client extends Model
{
    use HasFactory;
    use Sortable;

    public $sortable = [
        'first_name',
        'last_name',
        'city',
        'address',
        'country',
        'email',
        'id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
