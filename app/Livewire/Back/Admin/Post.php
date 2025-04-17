<?php

namespace App\Livewire\Back\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post as PostsModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class Post extends Component
{
    use WithFileUploads;

    public $postId = null;
    public $title;
    public $content;
    public $category = 'Développement';
    public $tags = '';
    public $status = 'draft';
    public $image;
    public $featured = false;
    public $allow_comments = true;
    public $existingImage = null;

    protected $rules = [
        'title' => 'required|min:5|max:255',
        'content' => 'required|min:10',
        'category' => 'required|exists:categories,id',
        'tags' => 'nullable|string|max:255',
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

    public function mount($post = null)
    {
        if ($post) {
            $this->postId = $post->id;
            $this->title = $post->title;
            $this->content = $post->content;
            $this->category = $post->category;
            $this->tags = $post->tags;
            $this->status = $post->status;
            $this->featured = $post->featured;
            $this->allow_comments = $post->allow_comments;
        }
    }

    public function savePost()
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'content' => $this->content,
            'category_id' => $this->category,
            'tags' =>   $this->tags,
            'status' => $this->status,
            'featured' => $this->featured,
            'allow_comments' => $this->allow_comments,
            'slug' => Str::slug($this->title),
        ];

        // dd($this->category);

        // Gestion de l'image
        if ($this->image) {
            $data['image_path'] = $this->image->store('posts', 'public');
            $this->reset('image');
        }

        // Création ou mise à jour
        $data['user_id'] = Auth::user()->id; // Référence à l'auteur
        PostsModel::create([
            'title' => $this->title,
            'content' => $this->content,
            'category_id' => $this->category,
            'tags' =>   $this->tags,
            'status' => $this->status,
            'image_path' => $data['image_path'] ?? null,
            'featured' => $this->featured,
            'allow_comments' => $this->allow_comments,
            'user_id' => Auth::user()->id, // Référence à l'auteur
        ]);

        $this->dispatch('hidePostModalForm');

        $this->dispatch('showAlert', [
            'type' => 'success',
            'title' => 'post',
            'text' => "le Post a été creé avec succès !",
        ]);
    }

    public function removeImage()
    {
        $this->reset('image');
        $this->existingImage = null;
    }
    public function removePost()
    {
        $post = PostsModel::findOrFail($this->postId);
        $post->delete();
        session()->flash('success', 'Article supprimé avec succès!');
    }

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
            'posts' => PostsModel::all(),
            'categories' => Category::all()
        ]);
    }
}
