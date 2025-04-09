<?php

namespace App\Livewire\Back\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProfileImage extends Component
{
    use WithFileUploads;

    #[Validate('required|image|max:1024')] // max:1024 = 1MB
    public $photo;

    public function save()
    {
        $this->validate();

        $user = Auth::user();

        if (!$user) {
            $this->dispatch('showAlert', [
                'type' => 'error',
                'title' => 'Erreur',
                'text' => 'Utilisateur non authentifié.',
            ]);
            return;
        }

        // Supprimer l’ancienne photo si elle existe
        if ($user->picture && Storage::exists($user->picture)) {
            Storage::delete($user->picture);
        }

        // Enregistrer la nouvelle photo
        $fileName = Str::uuid() . '.' . $this->photo->getClientOriginalExtension();
        $filePath = $this->photo->storeAs('Profile', $fileName);

        $user->update([
            'picture' => $filePath,
        ]);

        $this->reset('photo');

        $this->dispatch('showAlert', [
            'type' => 'success',
            'title' => 'Mise à jour réussie',
            'text' => 'La photo de profil a été mise à jour.',
        ]);
    }

    public function render()
    {
        return view('livewire.back.components.update-profile-image');
    }
}
