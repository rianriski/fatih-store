<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\ProductPhoto;
use App\Models\Review;
use App\Models\Wishlist;
use App\Models\Transaction;

class Product extends Model
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $fillable = [
        'category_id', 'name', 'description', 'stock', 'price', 'sold', 'weight', 'expired', 'condition', 'created_at'
    ];

    protected $hidden = [
        'updated_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function photo()
    {
        return $this->hasOne(ProductPhoto::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
}
