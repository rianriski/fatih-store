<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Message;

class MessageDetail extends Model
{
    protected $fillable = [
        'message_uuid', 'user_id', 'message', 'admin_read', 'user_read'
    ];

    protected $hidden = [
        'id'
    ];

    public function message()
    {
        return $this->belongsTo(Message::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
