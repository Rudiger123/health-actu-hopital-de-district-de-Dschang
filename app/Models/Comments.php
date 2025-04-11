<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Comment.php
class Comment extends Model
{
    protected $fillable = [
        'post_id', 'user_id', 'author_name', 'author_email', 
        'content', 'status', 'parent_id'
    ];

    // Relation avec l'article (un commentaire appartient à un article)
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Relation avec l'utilisateur (un commentaire peut avoir un auteur)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation parent/enfant pour les réponses imbriquées
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
