<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageConfig extends Model
{
    use HasFactory;

    protected $casts = ['shop_information' => 'array'];
}
