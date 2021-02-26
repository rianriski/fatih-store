<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class PostCategory extends Model
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $fillable = [
        'category', 'description'
    ];

    protected $hidden = [
        'id'
    ];

    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
