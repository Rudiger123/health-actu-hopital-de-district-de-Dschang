<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\UserStatus;
use App\UserType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'picture',
        'bio',
        'status',
        'type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'status' => UserStatus::class,
            'type' => UserType::class
        ];
    }

    // Relation avec les articles (un utilisateur a plusieurs articles)
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

        // app/Models/User.php
    public function socialLink()
    {
        return $this->hasOne(SocialLink::class);
    }

    // Relation avec les commentaires (un utilisateur a plusieurs commentaires)
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
