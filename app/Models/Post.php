<?php

namespace App\Models;


use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// app/Models/Post.php
class Post extends Model
{
    use Sluggable;
  
    protected $fillable = [
        'title', 'content', 'status', 'category_id',
        'image_path', 'featured', 'allow_comments', 'user_id', 'slug', 'published_at','is_notified'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    protected $dates = ['published_at'];

    // Relation avec l'auteur (un article appartient à un utilisateur)
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relation many-to-many avec les catégories
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function allComments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function commentCount(): int
    {
        return $this->allComments()->count();
    }

    public function likeCount(): int
    {
        return $this->likes()->count();
    }

}
