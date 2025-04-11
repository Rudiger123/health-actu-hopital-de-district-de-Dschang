<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Post.php
class Post extends Model
{
    protected $fillable = [
        'title', 'slug', 'content', 'excerpt', 
        'featured_image', 'status', 'author_id', 'published_at'
    ];

    protected $dates = ['published_at'];

    // Relation avec l'auteur (un article appartient à un utilisateur)
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Relation many-to-many avec les catégories
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_category');
    }

    // Relation many-to-many avec les tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    // Relation avec les commentaires (un article a plusieurs commentaires)
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
