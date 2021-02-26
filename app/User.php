<?php

namespace App;

use App\Models\Comment;
use App\Models\Invoice;
use App\Models\Customer;
use App\Models\Message;
use App\Models\MessageDetail;
use App\Models\Review;
use App\Models\ShippingAddress;
use App\Models\Transaction;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function address()
    {
        return $this->hasMany(ShippingAddress::class);
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

    public function message()
    {
        return $this->hasMany(Message::class);
    }

    public function messageDetail()
    {
        return $this->hasMany(MessageDetail::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
