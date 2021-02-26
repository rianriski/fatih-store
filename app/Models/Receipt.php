<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;

class Receipt extends Model
{
    protected $fillable = [
        'invoice_id', 'uuid', 'receipt'
    ];

    protected $hidden = [
        'id'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
