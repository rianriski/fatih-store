<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;

class ProductReturn extends Model
{
    protected $fillable = [
        'user_id', 'invoice_id', 'uuid', 'reason', 'courier', 'receipt', 'status', 'payback', 'photo_1', 'photo_2', 'photo_3'
    ];

    protected $hidden = [
        'id'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
