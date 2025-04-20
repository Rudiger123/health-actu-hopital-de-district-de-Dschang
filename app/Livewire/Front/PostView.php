<?php

namespace App\Livewire\Front;

use App\Models\Post;
use Livewire\Component;

class PostView extends Component
{
    public function render()
    {
        return view('livewire.front.post-view',
    [
        'posts' => Post::all()
    ]);
    }
}
