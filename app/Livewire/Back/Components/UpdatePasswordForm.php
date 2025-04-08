<?php

namespace App\Livewire\Back\Components;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdatePasswordForm extends Component
{
    public $current_password;
    public $new_password;
    public $confirm_password;

    public function updatePassword()
    {
        $this->validate([
            'current_password' => 'required|min:8',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = Auth::user();

        if (!Hash::check($this->current_password, $user->password)) {
            $this->addError('current_password', 'Le mot de passe actuel est incorrect.');
            return;
        }

        $update = $user->update([
            'password' => Hash::make($this->new_password),
        ]);

        if ($update) {
            Auth::logout();
            session()->flash('toast', [
                'type' => 'success',
                'message' => 'Mot de passe mis à jour avec succès.Svp veuillez vous connectez avec votre nouveau mot de passe',
            ]);
            return redirect()->route('home');
        } else {
            session()->flash('toast', [
                'type' => 'error',
                'message' => 'Une erreur est survenue lors de la mise à jour du mot de passe',
            ]);
        }
        
        $this->reset(['current_password', 'new_password', 'confirm_password']);
    }

    public function render()
    {
        return view('livewire.back.components.update-password-form');
    }
}
