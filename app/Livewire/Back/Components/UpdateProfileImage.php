<?php

namespace App\Livewire\Back\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProfileImage extends Component
{
    use WithFileUploads;

    #[Validate('image|max:1024')]
    public $photo;

    public function save()
    {
        $this->validate();
        $photoPath = null;

        if ($this->photo) {
            $photoName = time() . '.' . $this->photo->extension();
            $photoPath = $this->photo->storeAs(path: 'Profile', name: $photoName);
        }

        $user = Auth::user();

        $update = $user->update([
            'picture' => $photoPath,
        ]);

        $this->reset();

        $this->dispatch('showAlert', [
            'type' => 'success',
            'title' => 'Success Updated',
            'text' => 'Profile updated successfully',
        ]);
    }

    public function render()
    {
        return view('livewire.back.components.update-profile-image');
    }
}
