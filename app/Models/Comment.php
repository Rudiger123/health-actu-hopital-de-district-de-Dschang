<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Comment.php
class Comment extends Model
{

    protected $fillable = ['post_id', 'parent_id', 'guest_name', 'guest_email', 'content'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
