<?php
namespace App\Livewire\Back\Admin;

use App\Models\Testimonial;
use Livewire\Component;
use Livewire\WithFileUploads; // Pour gérer l'upload de fichiers
use Illuminate\Support\Facades\Storage; // Pour la suppression de fichiers
use Livewire\WithPagination;

class TestimonialManager extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $testimonialId;
    public $author_name;
    public $author_title;
    public $content;
    public $image; // Pour le nouvel upload
    public $old_image; // Pour conserver le chemin de l'image existante lors de l'édition
    public $is_approved;

    public $showForm = false; // Pour afficher/masquer le formulaire
    public $isEditing = false; // Pour savoir si on est en mode édition

    // Règles de validation
    protected $rules = [
        'author_name' => 'required|string|max:255',
        'author_title' => 'nullable|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|max:1024', // Max 1MB
        'is_approved' => 'boolean',
    ];

    public function createTestimonial()
    {
        $this->resetForm(); // Réinitialiser le formulaire
        $this->isEditing = false;
        $this->showForm = true;
    }

    public function storeTestimonial()
    {
        $this->validate();

        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('testimonial_images', 'public');
        }

        Testimonial::create([
            'author_name' => $this->author_name,
            'author_title' => $this->author_title,
            'content' => $this->content,
            'image' => $imagePath,
            'is_approved' => $this->is_approved ?? false, // Assurez-vous que c'est une valeur booléenne
        ]);

        session()->flash('message', 'Témoignage ajouté avec succès!');
        $this->resetForm();
        $this->showForm = false;
    }

    public function editTestimonial($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $this->testimonialId = $testimonial->id;
        $this->author_name = $testimonial->author_name;
        $this->author_title = $testimonial->author_title;
        $this->content = $testimonial->content;
        $this->old_image = $testimonial->image; // Stocker l'image existante
        $this->image = null; // Réinitialiser l'input d'upload
        $this->is_approved = $testimonial->is_approved;

        $this->isEditing = true;
        $this->showForm = true;
    }

    public function updateTestimonial()
    {
        $this->validate();

        $testimonial = Testimonial::findOrFail($this->testimonialId);

        $imagePath = $this->old_image; // Par défaut, conserve l'ancienne image

        if ($this->image) {
            // Supprimer l'ancienne image si elle existe
            if ($this->old_image) {
                Storage::disk('public')->delete($this->old_image);
            }
            $imagePath = $this->image->store('testimonial_images', 'public');
        }

        $testimonial->update([
            'author_name' => $this->author_name,
            'author_title' => $this->author_title,
            'content' => $this->content,
            'image' => $imagePath,
            'is_approved' => $this->is_approved,
        ]);

        session()->flash('message', 'Témoignage mis à jour avec succès!');
        $this->resetForm();
        $this->showForm = false;
    }

    public function deleteTestimonial($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if ($testimonial->image) {
            Storage::disk('public')->delete($testimonial->image);
        }
        $testimonial->delete();

        session()->flash('message', 'Témoignage supprimé avec succès!');
    }

    public function toggleApproved($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->is_approved = !$testimonial->is_approved;
        $testimonial->save();
        session()->flash('message', 'Statut d\'approbation mis à jour.');
    }

    public function cancel()
    {
        $this->resetForm();
        $this->showForm = false;
    }

    private function resetForm()
    {
        $this->testimonialId = null;
        $this->author_name = '';
        $this->author_title = '';
        $this->content = '';
        $this->image = null;
        $this->old_image = null;
        $this->is_approved = false;
        $this->resetValidation(); // Réinitialiser les erreurs de validation
    }

    public function render()
    {
        $testimonials = Testimonial::latest()->paginate(10);

        return view('livewire.back.admin.testimonial-manager', [
            'testimonials' => $testimonials,
        ]);
    }
}
