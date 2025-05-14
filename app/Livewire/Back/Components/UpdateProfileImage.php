<?php

namespace App\Livewire\Back\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\{User, SocialLink};

class UpdateProfileImage extends Component
{
    protected $listeners = [
        "updatePersonalDetails" => '$refresh'
    ];

    public $social;

    public function render()
    {
        $socialLinks = SocialLink::all();
        $social = new SocialLink();
        if (isset($socialLinks)) {
            foreach ($socialLinks as $socialLink) {
                if ($socialLink->user_id  === Auth::user()->id) {
                    $social = $socialLink;
                }
            }
        }

        return view('livewire.back.components.update-profile-image', [
            'user' => User::findOrFail(Auth::user()->id),
            'socialLinks' => $social
        ]);
    }
}
