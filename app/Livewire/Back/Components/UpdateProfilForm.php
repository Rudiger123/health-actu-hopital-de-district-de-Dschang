<?php

namespace App\Livewire\Back\Components;

use App\Livewire\Back\UserTopInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProfilForm extends Component
{
    use WithFileUploads;

    public $name;
    public $username;
    public $email;
    public $bio;
    public $photo;

    public function mount()
    {
        // Charger les informations de l'utilisateur connecté
        $user = Auth::user();
        $this->name = $user->name;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->bio = $user->bio;
    }

    public function updateProfile()
    {
        // Validation des champs
        $this->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'bio' => 'nullable|string|max:500',
            'photo' => 'nullable|image|max:1024'
        ]);

        // Mise à jour de l'utilisateur
        $user = Auth::user();
        $update = $user->update([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'bio' => $this->bio,
        ]);

        if ($this->photo) {
            // Supprimer l’ancienne photo si elle existe
            if ($user->picture) {
                Storage::disk('public')->delete($user->picture);
            }

            // Enregistrer la nouvelle photo
            $fileName = Str::uuid() . '.' . $this->photo->getClientOriginalExtension();
            $filePath = $this->photo->storeAs('Profile', $fileName);

            $user->update([
                'picture' => $filePath,
            ]);

            $this->reset('photo');
        }

        // Gestion de l'actualisation et des messages
        if ($update) {
            $this->dispatch('showAlert', [
                'type' => 'success',
                'title' => 'mise à jour',
                'text' => "Vos informations ont été mises à jour avec succès !",
            ]);

            // Déclenchement des événements pour mettre à jour d'autres composants
            $this->dispatch("updateTopUserInfo")->to(UserTopInfo::class);
            $this->dispatch("updatePersonalDetails")->to(UpdateProfileImage::class);
        } else {
            $this->dispatch('showAlert', [
                'type' => 'error',
                'title' => 'une erreur est survenue',
                'text' => 'une erreur est survenue lors de la mise à jour des informations',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.back.components.update-profil-form');
    }
}
