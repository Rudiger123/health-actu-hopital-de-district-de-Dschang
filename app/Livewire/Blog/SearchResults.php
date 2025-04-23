<?php

namespace App\Livewire\Blog;

use App\Models\Post;
use Livewire\Component;

class SearchResults extends Component
{
    public $query;

    protected $updatesQueryString = ['query'];


    public function mount($query)
    {
        $this->query = $query;
    }

    public function render()
    {
        $posts = Post::with(['category', 'author'])
            ->where('title', 'like', "%{$this->query}%")
            ->orWhere('content', 'like', "%{$this->query}%")
            ->paginate(6);
        return view('livewire.blog.search-results', [
            'posts' => $posts,
        ]);
    }
}
