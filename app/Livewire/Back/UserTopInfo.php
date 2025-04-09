<?php

namespace App\Livewire\Back;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Livewire\Component;

class UserTopInfo extends Component
{
    protected $listeners = [
        "updateTopUserInfo" => '$refresh'
    ];
    public function render()
    {
        return view('livewire.back.user-top-info',[
            'user' => User::findOrFail(Auth::user()->id),
        ]);
    }
}
