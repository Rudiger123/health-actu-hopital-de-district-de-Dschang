<?php

namespace App\Livewire\Back;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{
    public function render()
    {
        return view('livewire.back.profile')->layout('back.layouts.app');
    }
}
