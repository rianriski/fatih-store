<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;

class Coupon extends Model
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $fillable = [
        'name', 'discount', 'description'
    ];

    protected $hidden = [
        'id'
    ];

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
}
