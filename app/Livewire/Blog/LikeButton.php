<?php

namespace App\Livewire\Blog;

use Livewire\Component;
use App\Models\Like;

class LikeButton extends Component
{
    public $comment;
    public $liked = false;
    public $count = 0;

    public function mount($comment)
    {
        $this->comment = $comment;
        $this->count = $comment->likes()->count();
        $this->liked = $comment->likes()
            ->where('ip_address', request()->ip())
            ->exists();
    }

    public function toggleLike()
    {
        $ip = request()->ip();
        $existingLike = $this->comment->likes()
            ->where('ip_address', $ip)
            ->first();

        if ($existingLike) {
            $existingLike->delete();
            $this->count--;
            $this->liked = false;
        } else {
            Like::create([
                'comment_id' => $this->comment->id,
                'ip_address' => $ip
            ]);
            $this->count++;
            $this->liked = true;
        }
    }
    public function render()
    {
        return view('livewire.blog.like-button');
    }
}
