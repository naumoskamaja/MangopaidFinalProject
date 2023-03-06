<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Newsletter extends Model
{
    use HasFactory;
    use Sortable;

    public $sortable = [
        'title',
        'id'
    ];

    public function images()
    {
        return $this->hasMany(NewsletterMedia::class, 'newsletter_id');
    }
}
