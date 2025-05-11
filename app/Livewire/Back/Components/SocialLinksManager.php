<?php

namespace App\Livewire\Back\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SocialLinksManager extends Component
{
    public $links = [
        'facebook' => '',
        'twitter' => '',
        'instagram' => '',
        'linkedin' => '',
        'youtube' => '',
        'github' => ''
    ];

    protected $rules = [
        'links.facebook' => 'nullable|url',
        'links.twitter' => 'nullable|url',
        'links.instagram' => 'nullable|url',
        'links.linkedin' => 'nullable|url',
        'links.youtube' => 'nullable|url',
        'links.github' => 'nullable|url'
    ];

    public function mount()
    {
        $socialLinks = Auth::user()->socialLinks;
        if ($socialLinks) {
            $this->links = $socialLinks->toArray();
        }
    }

    public function save()
    {
        $this->validate();

        Auth::user()->socialLink()->updateOrCreate(
            ['user_id' => Auth::user()->id],
            $this->links
        );

        $this->dispatch('showAlert', [
            'type' => 'success',
            'title' => 'mise à jour',
            'text' => "Vos liens ont été mises à jour avec succès !",
        ]);
    }
    public function render()
    {
        return view('livewire.back.components.social-links-manager');
    }
}
