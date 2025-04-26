<?php

namespace App\Livewire\Back\Admin;

use App\Models\Like;
use Livewire\Component;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\WithPagination;

class AdminCommentsManager extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $selectedPost = null;
    public $currentPost = null;
    public $commentStats = [
        'total' => 0,
        'approved' => 0,
        'like' => 0,
        'replies' => 0
    ];

    protected $queryString = [
        'search' => ['except' => ''],
        'sortField' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc']
    ];

    public function mount()
    {
        $this->updateStats();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function selectPost($postId)
    {
        $this->selectedPost = is_array($postId) ? ($postId['id'] ?? null) : $postId;
        $this->updateStats();
    }

    public function deleteComment($commentId)
    {
        \App\Models\Comment::destroy($commentId);
        $this->updateStats();
    }

    public function updateStats()
    {
        $this->commentStats = [
            'total' => \App\Models\Comment::count(),
            'posts' => \App\Models\Post::count(),
            'like' => Like::count(),
            'replies' => 0
        ];
    }

    /**
     * Extrait un ID valide à partir de différentes sources possibles
     * 
     * @param mixed $input - Peut être un entier, un modèle Post ou un tableau
     * @return int|null - Retourne l'ID ou null si non valide
     */
    public function extractValidId($input): ?int
    {
        // Cas 1: Déjà un entier valide
        if (is_int($input)) {
            return $input;
        }

        // Cas 2: Chaîne numérique
        if (is_string($input) && ctype_digit($input)) {
            return (int)$input;
        }

        // Cas 3: Modèle Post (ou tout objet avec propriété id)
        if (is_object($input) && isset($input->id)) {
            return (int)$input->id;
        }

        // Cas 4: Tableau avec clé 'id'
        if (is_array($input) && isset($input['id'])) {
            return (int)$input['id'];
        }

        // Cas 5: Objet avec méthode getId()
        if (is_object($input) && method_exists($input, 'getId')) {
            return (int)$input->getId();
        }

        return null;
    }

    /**
     * Récupère un modèle Post à partir d'un ID ou d'une instance de Post
     * 
     * @param int|Post $input - L'ID ou l'instance du Post
     * @return Post
     */
    function ensurePostModel($input)
    {
        // Si c'est déjà un modèle Post, on le retourne directement
        if ($input instanceof Post) {
            return $input;
        }

        // Si c'est un entier ou une chaîne numérique, on cherche le Post correspondant
        if (is_numeric($input)) {
            return Post::findOrFail((int)$input);
        }

        // Si c'est un tableau avec une clé 'id', on utilise cet ID
        if (is_array($input) && isset($input['id']) && is_numeric($input['id'])) {
            return Post::findOrFail((int)$input['id']);
        }
    }

    public function render()
    {
        $posts = Post::withCount(['allComments'])
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(4);

        $this->selectedPost = $this->ensurePostModel($this->selectedPost);
        // $this->selectedPost
        //     ? Post::with(['author'])->find($this->selectedPost)
        //     : null;

        $postId = $this->extractValidId($this->selectedPost);

        $comments = $postId
            ? \App\Models\Comment::where('post_id', $postId)
            ->orderBy('created_at', 'desc')
            ->get()
            : collect();

        return view('livewire.back.admin.admin-comments-manager', [
            'posts' => $posts,
            'comments' => $comments,
            'currentPost' => $this->selectedPost
                ? Post::with(['author'])->find($this->selectedPost)
                : null
        ]);
    }
}
