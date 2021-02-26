<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class ShippingAddress extends Model
{
    protected $fillable = [
        'user_id', 'name', 'receiver', 'phone', 'city', 'postal_code', 'address'
    ];

    protected $hidden = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
}
