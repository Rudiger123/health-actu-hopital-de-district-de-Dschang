<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LogoutHandler extends Component
{
    protected $listeners = [
        "logout" => 'logout',
    ];

      // Confirmation de la deconnection
      public function confirmLogout()
      {
        $this->dispatch(
            'confirm-logout',
            title: 'Confirmer la déconnexion',
            text:"Êtes-vous sûr de vouloir vous déconnecter ?",
        );
      }

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
