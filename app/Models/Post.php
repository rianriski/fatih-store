<?php

namespace App\Models;

use App\Models\PostCategory;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'title', 'thumbnail', 'post', 'status'
    ];

    protected $hidden = [];

    public function category()
    {
        return $this->belongsTo(PostCategory::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
