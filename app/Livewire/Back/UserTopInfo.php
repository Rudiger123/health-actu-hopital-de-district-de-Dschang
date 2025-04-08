<?php

namespace App\Livewire\Back;

use Livewire\Component;

class UserTopInfo extends Component
{
    protected $listeners = [
        "updateTopUserInfo" => '$refresh'
    ];
    public function render()
    {
        return view('livewire.back.user-top-info');
    }
}
