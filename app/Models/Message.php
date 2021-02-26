<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\MessageDetail;

class Message extends Model
{
    protected $fillable = [
        'message_uuid', 'keyword', 'user_id', 'photo', 'status'
    ];

    protected $hidden = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function messageDetail()
    {
        return $this->hasMany(MessageDetail::class, 'message_uuid', 'message_uuid');
    }
}
