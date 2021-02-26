<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\User;

class Review extends Model
{
    protected $fillable = [
        'product_id', 'user_id', 'score', 'review', 'photo'
    ];

    protected $hidden = [
        'id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
