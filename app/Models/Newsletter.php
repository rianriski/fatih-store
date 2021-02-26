<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $fillable = [
        'title', 'article', 'thumbnail', 'status'
    ];

    protected $hidden = [
        'id'
    ];
}
