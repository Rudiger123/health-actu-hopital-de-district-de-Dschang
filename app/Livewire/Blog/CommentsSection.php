<?php

namespace App\Livewire\Blog;

use Livewire\Component;

use App\Models\{Comment, Post};

class CommentsSection extends Component
{
    public Post $post;
    public $content;
    public $name;
    public $email;
    public $parentId;

    protected $rules = [
        'content' => 'required|min:3',
        'name' => 'required',
        'email' => 'required|email'
    ];

    public function reply($parentId)
    {
        $this->parentId = $parentId;
    }

    public function submitComment()
    {
        $this->validate();

        Comment::create([
            'post_id' => $this->post->id,
            'parent_id' => $this->parentId,
            'guest_name' => $this->name,
            'guest_email' => $this->email,
            'content' => $this->content
        ]);

        $this->reset(['content', 'parentId']);
    }

    public function render()
    {

        return view('livewire.blog.comments-section', [
            'comments' => $this->post->comments()
                ->with(['likes'])
                ->whereNull('parent_id')
                ->take(5)
                ->orderBy('created_at','desc')
                ->get(),
            'totalComments' => $this->post->comments()->count()
        ]);
    }
}
