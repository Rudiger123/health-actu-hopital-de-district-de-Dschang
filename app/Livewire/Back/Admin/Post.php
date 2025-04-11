<?php

namespace App\Livewire\Back\Admin;

use Livewire\Component;

class Post extends Component
{
    public function render()
    {
        return view('livewire.back.admin.post')->layout('back.layouts.app');
    }
}
