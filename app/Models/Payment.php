<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;

class Payment extends Model
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $fillable = [
        'invoice_id', 'payment_confirmation', 'status'
    ];

    protected $hidden = [
        'id'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
