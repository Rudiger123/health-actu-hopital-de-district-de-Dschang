<?php

namespace App\Livewire\Back\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post as PostsModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class Post extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $title;
    public $content;
    public $category;
    public $status = 'draft';
    public $image;
    public $featured = false;
    public $allow_comments = true;
    public $isUpdatePostMode = false;
    public $postId, $existingImagePath;
    public $availableTags = []; // Liste des tags disponibles
    public $selectedTags = []; // ID des tags sélectionnés
    public $newTag = ''; // Nouveau tag à ajouter

    protected $rules = [
        'title' => 'required|min:5|max:255',
        'content' => 'required|min:10',
        'category' => 'required|exists:categories,id',
        'selectedTags' => 'array',
        'selectedTags.*' => 'exists:tags,id',
        'status' => 'required|in:draft,published,pending,private',
        'image' => 'nullable|image|max:2048', // 2MB max
        'featured' => 'boolean',
        'allow_comments' => 'boolean'
    ];

    protected $listeners = [
        'deletePost'
    ];

    protected $messages = [
        'title.required' => 'Le titre est obligatoire',
        'content.required' => 'Le contenu est obligatoire',
        'image.max' => 'L\'image ne doit pas dépasser 2MB',
        'image.image' => 'Le fichier doit être une image valide'
    ];


    public function mount()
    {
        // Charger les tags existants
        $this->loadAvailableTags();
    }

    public function loadAvailableTags()
    {
        $this->availableTags = Tag::select('id', 'name')->get()->toArray();
    }

    public function addNewTag()
    {
        // Valider le nouveau tag
        $this->validate([
            'newTag' => 'required|string|max:255|unique:tags,name',
        ]);

        // Créer le nouveau tag
        $tag = Tag::create(['name' => $this->newTag]);

        // Ajouter le nouveau tag à la liste des tags disponibles
        $this->availableTags[] = $tag->toArray();

        // Ajouter automatiquement le nouveau tag aux tags sélectionnés
        $this->selectedTags[] = $tag->id;

        // Réinitialiser le champ du nouveau tag
        $this->newTag = '';

        session()->flash('success', 'Le tag a été ajouté avec succès.');
    }

    // Dans votre composant Livewire
    public function resetForm()
    {
        $this->reset([
            'title',
            'content',
            'category',
            'selectedTags',
            'status',
            'featured',
            'allow_comments',
            'image',
            'isUpdatePostMode'
        ]);

        // Valeurs par défaut
        $this->title = null; // Valeur par défaut
        $this->content = null; // Valeur par défaut      
        $this->category = null; // Valeur par défaut
        $this->selectedTags = []; // Valeur par défaut
        $this->status = null; // Valeur par défaut
        $this->image = null; // Valeur par défaut
        $this->isUpdatePostMode = false; // Valeur par défaut
        $this->allow_comments = true; // Valeur par défaut
        $this->featured = false; // Valeur par défaut

        // Réinitialiser les erreurs de validation
        $this->resetErrorBag();

        // Réinitialiser les champs du formulaire (si nécessaire)
        $this->resetValidation();
    }

    public function addPost()
    {
        $this->resetForm();
        $this->dispatch('showPostModalForm');
    }

    public function savePost()
    {
        $this->validate();

        // dd($this->selectedTags);

        // Gestion de l'image
        if ($this->image) {
            $data['image_path'] = $this->image->store('posts', 'public');
            $this->reset('image');
        }

        // Création ou mise à jour
        $data['user_id'] = Auth::user()->id; // Référence à l'auteur
        $post = PostsModel::create([
            'title' => $this->title,
            'content' => $this->content,
            'category_id' => $this->category,
            'status' => $this->status,
            'image_path' => $data['image_path'] ?? null,
            'featured' => $this->featured,
            'allow_comments' => $this->allow_comments,
            'user_id' => Auth::user()->id, // Référence à l'auteur
        ]);

        $post->tags()->sync($this->selectedTags);

        $this->hidePostModal();

        $this->dispatch('showAlert', [
            'type' => 'success',
            'title' => 'post',
            'text' => "le Post a été creé avec succès !",
        ]);
    }

    // update Post 
    public function editPost($id)
    {
        $currentPost = PostsModel::findOrFail($id);
        $this->postId = $id;
        $this->title = $currentPost->title;
        $this->content = $currentPost->content;
        $this->category = $currentPost->category->id;
        $this->status = $currentPost->status;
        $this->featured = $currentPost->featured;
        $this->allow_comments = $currentPost->allow_comments;
        $this->existingImagePath = $currentPost->image_path;
        $this->isUpdatePostMode = true;
        $this->showeditModal();
    }

    public function showeditModal()
    {
        $this->dispatch('showPostModalForm');
    }

    public function hidePostModal()
    {
        $this->resetForm();
        $this->dispatch('hidePostModalForm');
    }

    public $currentPost = null;

    public function loadPost($postId)
    {
        $this->currentPost = PostsModel::with('author')->find($postId);
        // dump($this->currentPost );
    }

    public function updatePost()
    {
        $id = $this->postId;

        // Récupération du post
        $post = PostsModel::findOrFail($id);
        $this->validate([
            'title' => 'required|min:5|max:255',
            'content' => 'required|min:10',
            'selectedTags' => 'array',
            'selectedTags.*' => 'exists:tags,id',
            'category' => 'required|integer|exists:categories,id',
            'status' => 'required|in:draft,published,pending,private',
            'image' => 'nullable|image|max:2048', // 2MB max
            'featured' => 'boolean',
            'allow_comments' => 'boolean'
        ], [
            'title.required' => 'Le titre est obligatoire',
            'content.required' => 'Le contenu est obligatoire',
            'image.max' => 'L\'image ne doit pas dépasser 2MB',
            'image.image' => 'Le fichier doit être une image valide'
        ]);

        // Gestion de l'image
        if (isset($this->image)) {
            // Supprimer l'ancienne image si elle existe
            if ($post->image_path) {
                Storage::disk('public')->delete($post->image_path);
            }
            $data['image_path'] = $this->image->store('posts', 'public');
        }

        // Mise à jour du post
        $post->update([
            'title' => $this->title,
            'content' => $this->content,
            'category_id' => $this->category,
            'status' => $this->status,
            'featured' => $this->featured,
            'allow_comments' => $this->allow_comments,
            'image_path' => $data['image_path'] ?? $post->image_path,
            'user_id' => Auth::user()->id, // Référence à l'auteur
        ]);

        $post->tags()->sync($this->selectedTags);

        $this->hidePostModal();

        $this->dispatch('showAlert', [
            'type' => 'success',
            'title' => 'post',
            'text' => "Le post a été mis à jour avec succès !",
        ]);

        // Réinitialisation après mise à jour        
        $this->resetForm();
    }

    // Fonction pour obtenir la couleur de l'état
    public function getStatusColor($status)
    {
        return match ($status) {
            'draft' => 'secondary',
            'published' => 'success',
            'pending' => 'warning',
            'private' => 'danger',
            default => 'primary'
        };
    }


    // Confirmation de suppression
    public function confirmDelete($id)
    {
        $this->dispatch(
            'confirm-delete',
            title: 'Confirmer la suppression',
            text: 'Voulez-vous vraiment supprimer cette catégorie ?',
            id: $id
        );
    }

    // Action de suppression
    public function deletePost($id)
    {
        try {
            $post = PostsModel::findOrFail($id);

            if ($post->image_path) {
                Storage::disk('public')->delete($post->image_path);
            }

            $post->delete();

            $this->dispatch(
                'show-toast',
                type: 'success',
                message: 'Post supprimée avec succès'
            );
        } catch (\Exception $e) {
            $this->dispatch(
                'show-toast',
                type: 'error',
                message: $e->getMessage()
            );
        }
    }

    public function render()
    {
        return view('livewire.back.admin.post', [
            'posts' => PostsModel::paginate(2),
            'categories' => Category::all()
        ]);
    }
}
