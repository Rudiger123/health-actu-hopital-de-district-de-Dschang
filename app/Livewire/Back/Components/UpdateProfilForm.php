<?php

namespace App\Livewire\Back\Components;

use App\Livewire\Back\UserTopInfo;
use App\Livewire\Back\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $this->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'bio' => 'nullable|string|max:500',
        ]);

        $user = Auth::user();
        $update = $user->update([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'bio' => $this->bio,
        ]);

        sleep(0.5);

        if ($update) {
            session()->flash('toast', [
                'type' => 'success',
                'message' => "Your personal details have been updated successfully!",
            ]);
            
            $this->dispatch("updateTopUserInfo")->to(UserTopInfo::class);
            $this->dispatch("updatePersonalDetails")->to(Profile::class);
        } else {
            session()->flash('toast', [
                'type' => 'error',
                'message' => "Something went wrong!",
            ]);
        }

    }


    public function render()
    {
        return view('livewire.back.components.update-profil-form');
    }
}
