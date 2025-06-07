<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'reply',
        'replied_at',
        'is_read'
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'replied_at' => 'datetime'
    ];

    public function markAsRead()
    {
        $this->update(['is_read' => true]);
    }

    public function reply($reply)
    {
        $this->update([
            'reply' => $reply,
            'replied_at' => now(),
            'is_read' => true
        ]);
    }
} 