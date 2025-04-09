<?php

namespace App\Livewire\Back\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UpdateProfileImage extends Component
{
    protected $listeners = [
        "updatePersonalDetails" => '$refresh'
    ];
   
    public function render()
    {
        return view('livewire.back.components.update-profile-image',[
            'user' => User::findOrFail(Auth::user()->id),
        ]);
    }
}
