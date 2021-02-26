<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'nama', 'manager', 'alamat', 'kode', 'telp', 'kamar', 'operasi'
    ];

    protected $hidden = [
        'id'
    ];
}
