<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ShippingAddress;
use App\Models\Transaction;
use App\Models\Coupon;
use App\Models\Receipt;
use App\Models\Payment;
use App\Models\ProductReturn;
use App\User;

class Invoice extends Model
{
    protected $fillable = [
        'user_id', 'transaction_uuid', 'shipping_address_id', 'sub_total', 'courier', 'shipping_cost', 'coupon_id', 'transaction_total', 'status'
    ];

    protected $hidden = [
        'id'
    ];

    public function shippingAddress()
    {
        return $this->belongsTo(ShippingAddress::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'transaction_uuid', 'uuid');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function receipt()
    {
        return $this->hasOne(Receipt::class);
    }

    public function return()
    {
        return $this->hasOne(ProductReturn::class);
    }
}
