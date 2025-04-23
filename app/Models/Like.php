<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['comment_id', 'ip_address'];

    public function comment() {
        return $this->belongsTo(Comment::class);
    }

}
