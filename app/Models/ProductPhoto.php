<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    protected $fillable = [
        'product_id', 'is_default', 'photo_1', 'photo_2', 'photo_3'
    ];

    protected $hidden = [
        'id', 'product_id', 'created_at', 'updated_at'
    ];
}
