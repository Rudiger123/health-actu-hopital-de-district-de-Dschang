<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LogoutHandler extends Component
{
    public function logout()
    {
        Auth::logout();
        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Déconnexion effectuée avec succès',
        ]);

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.logout-handler');
    }
}
