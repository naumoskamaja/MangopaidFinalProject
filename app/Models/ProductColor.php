<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    public function sizes()
    {
        return $this->hasMany(ColorSize::class, 'color_id')->where('status', 1);
    }

    public function images()
    {
        return $this->hasMany(ColorMedia::class, 'color_id');
    }
}
