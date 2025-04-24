<?php

namespace App\Livewire\Front;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostView extends Component
{   
    use WithPagination;

    public $query = '';

    public function searchPosts()
    {    
        if (trim($this->query) !== '') {
            return redirect()->route('blog.search', ['query' => $this->query]);
        }
    }

    public function render()
    {
        return view('livewire.front.post-view', [
            // Posts les plus populaires (par exemple, ceux avec le plus de vues)
            'posts' => Post::query()
                ->with(['category', 'author']) // Chargement des relations
                ->orderByDesc('featured') // Classement par nombre de vues décroissant
                ->paginate(6),
    
            // 4 derniers posts (les plus récents)
            'recentPosts' => Post::query()
                ->with(['category', 'author']) // Chargement des relations
                ->orderByDesc('created_at') // Classement par date de création
                ->take(4) // Limite à 4 posts
                ->get(),
    
        ]);
    }
}
