<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class PageContent extends Model
{
    use HasFactory;
    use Sortable;

    public $sortable = [
        'slug',
        'id'
    ];
    protected $fillable = [
        'title',
        'content',
        'slug',
        'status',

    ];
    protected $casts = ['title' => 'array', 'content' => 'array'];

}
