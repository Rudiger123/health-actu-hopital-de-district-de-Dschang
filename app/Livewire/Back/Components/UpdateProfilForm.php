<?php
namespace App\Livewire\Back\Components;

use App\Livewire\Back\UserTopInfo;
use App\Livewire\Back\Profile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateProfilForm extends Component
{
    public $name;
    public $username;
    public $email;
    public $bio;

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
        ]);

        // Mise à jour de l'utilisateur
        $user = Auth::user();
        $update = $user->update([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'bio' => $this->bio,
        ]);

        // Gestion de l'actualisation et des messages
        if ($update) {
            session()->flash('toast', [
                'type' => 'success',
                'message' => "Vos informations ont été mises à jour avec succès !",
            ]);
            
            // Déclenchement des événements pour mettre à jour d'autres composants
            $this->dispatch("updateTopUserInfo")->to(UserTopInfo::class);
            $this->dispatch("updatePersonalDetails")->to(Profile::class);
        } else {
            session()->flash('toast', [
                'type' => 'error',
                'message' => "Une erreur est survenue lors de la mise à jour.",
            ]);
        }
    }

    public function render()
    {
        return view('livewire.back.components.update-profil-form');
    }
}

