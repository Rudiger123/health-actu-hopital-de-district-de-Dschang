<?php

namespace App\Livewire\Back\Admin;


use App\Models\Doctor;
use Livewire\Component;
use Livewire\WithFileUploads; // Pour gérer l'upload de fichiers
use Livewire\WithPagination; // Pour la pagination
use Illuminate\Support\Facades\Storage; // Pour la suppression de fichiers

class DoctorManager extends Component
{
    use WithFileUploads;
    use WithPagination; // Utilisation du trait de pagination

    public $doctorId;
    public $name;
    public $specialty;
    public $phone;
    public $email;
    public $bio;
    public $profile_picture; // Pour le nouvel upload
    public $old_profile_picture; // Pour conserver le chemin de l'image existante lors de l'édition
    public $is_active;

    public $showForm = false; // Pour afficher/masquer le formulaire
    public $isEditing = false; // Pour savoir si on est en mode édition

    // Règles de validation
    protected $rules = [
        'name' => 'required|string|max:255',
        'specialty' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:20',
        'email' => 'required|email|max:255',
        'bio' => 'nullable|string',
        'profile_picture' => 'nullable|image|max:2048', // Max 2MB
        'is_active' => 'boolean',
    ];

    // Mettre à jour les règles pour le champ email lors de l'édition
    public function updatedEmail($value)
    {
        if ($this->isEditing) {
            $this->rules['email'] = 'required|email|max:255|unique:doctors,email,' . $this->doctorId;
        } else {
            $this->rules['email'] = 'required|email|max:255|unique:doctors,email';
        }
        $this->validateOnly('email');
    }

    public function createDoctor()
    {
        $this->resetForm(); // Réinitialiser le formulaire
        $this->isEditing = false;
        $this->showForm = true;
    }

    public function storeDoctor()
    {
        $this->rules['email'] = 'required|email|max:255|unique:doctors,email'; // S'assurer de la règle unique pour l'ajout
        $this->validate();

        $imagePath = null;
        if ($this->profile_picture) {
            $imagePath = $this->profile_picture->store('doctor_pictures', 'public');
        }

        Doctor::create([
            'name' => $this->name,
            'specialty' => $this->specialty,
            'phone' => $this->phone,
            'email' => $this->email,
            'bio' => $this->bio,
            'profile_picture' => $imagePath,
            'is_active' => $this->is_active ?? true, // Par défaut actif
        ]);

        session()->flash('message', 'Docteur ajouté avec succès!');
        $this->resetForm();
        $this->showForm = false;
        $this->resetPage(); // Réinitialiser la pagination à la première page
    }

    public function editDoctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        $this->doctorId = $doctor->id;
        $this->name = $doctor->name;
        $this->specialty = $doctor->specialty;
        $this->phone = $doctor->phone;
        $this->email = $doctor->email;
        $this->bio = $doctor->bio;
        $this->old_profile_picture = $doctor->profile_picture; // Stocker l'image existante
        $this->profile_picture = null; // Réinitialiser l'input d'upload
        $this->is_active = $doctor->is_active;

        $this->isEditing = true;
        $this->showForm = true;
    }

    public function updateDoctor()
    {
        // Règle unique pour l'email, en excluant le docteur actuel
        $this->rules['email'] = 'required|email|max:255|unique:doctors,email,' . $this->doctorId;
        $this->validate();

        $doctor = Doctor::findOrFail($this->doctorId);

        $imagePath = $this->old_profile_picture; // Par défaut, conserve l'ancienne image

        if ($this->profile_picture) {
            // Supprimer l'ancienne image si elle existe
            if ($this->old_profile_picture) {
                Storage::disk('public')->delete($this->old_profile_picture);
            }
            $imagePath = $this->profile_picture->store('doctor_pictures', 'public');
        }

        $doctor->update([
            'name' => $this->name,
            'specialty' => $this->specialty,
            'phone' => $this->phone,
            'email' => $this->email,
            'bio' => $this->bio,
            'profile_picture' => $imagePath,
            'is_active' => $this->is_active,
        ]);

        session()->flash('message', 'Docteur mis à jour avec succès!');
        $this->resetForm();
        $this->showForm = false;
        // La pagination reste sur la même page
    }

    public function deleteDoctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        if ($doctor->profile_picture) {
            Storage::disk('public')->delete($doctor->profile_picture);
        }
        $doctor->delete();

        session()->flash('message', 'Docteur supprimé avec succès!');
        // La pagination se rafraîchit automatiquement
    }

    public function toggleActive($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->is_active = !$doctor->is_active;
        $doctor->save();
        session()->flash('message', 'Statut d\'activité mis à jour.');
        // La vue se rafraîchit
    }

    public function cancel()
    {
        $this->resetForm();
        $this->showForm = false;
    }

    private function resetForm()
    {
        $this->doctorId = null;
        $this->name = '';
        $this->specialty = '';
        $this->phone = '';
        $this->email = '';
        $this->bio = '';
        $this->profile_picture = null;
        $this->old_profile_picture = null;
        $this->is_active = true;
        $this->resetValidation(); // Réinitialiser les erreurs de validation
    }

    public function render()
    {
         // On récupère les docteurs paginés directement dans la méthode render
         $doctors = Doctor::latest()->paginate(10); // 10 docteurs par page

         return view('livewire.back.admin.doctor-manager', [
             'doctors' => $doctors,
         ]);
    }
}
