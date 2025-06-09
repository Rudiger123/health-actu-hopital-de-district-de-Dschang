<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
class NewsletterSubscription extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'is_subscribed', 'unsubscribe_token'];

    protected static function booted()
    {
        static::creating(function ($subscriber) {
            // Génère un token uniquement si ce n'est pas déjà défini
            if (empty($subscriber->unsubscribe_token)) {
                $subscriber->unsubscribe_token = Str::random(60);
            }
        });
    }
}
