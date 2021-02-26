<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $fillable = [
        'phone', 'address', 'birth', 'gender', 'photo'
    ];

    protected $hidden = [
        'id', 'user_id'
    ];
}
