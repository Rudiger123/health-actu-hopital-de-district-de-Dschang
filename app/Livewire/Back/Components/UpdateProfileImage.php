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
   
    public function render()
    {
        $socialLinks = SocialLink::all();
        foreach ($socialLinks as $socialLink) {
            if ($socialLink->user_id  === Auth::user()->id)  {
                $link = $socialLink;
            }
        }
        return view('livewire.back.components.update-profile-image',[
            'user' => User::findOrFail(Auth::user()->id),
            'socialLinks' => $link
        ]);
    }
}
