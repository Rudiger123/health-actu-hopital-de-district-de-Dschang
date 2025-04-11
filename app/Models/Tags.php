<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Tag.php
class Tag extends Model
{
    protected $fillable = ['name', 'slug'];

    // Relation many-to-many avec les articles
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tag');
    }
}
