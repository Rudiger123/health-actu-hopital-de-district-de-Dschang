<?php

namespace App\Livewire\Back\Admin;

use App\Models\SiteSetting;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class GeneralSettings extends Component
{
    public function render()
    {
        return view('livewire.back.admin.general-settings');
    }

    public $siteTitle;
    public $siteEmail;
    public $sitePhone;
    public $siteKeywords;
    public $siteDescription;

    public function mount()
    {
        // Charger les paramètres existants du site
        $settings = SiteSetting::first();

        if ($settings) {
            $this->siteTitle = $settings->site_title;
            $this->siteEmail = $settings->site_email;
            $this->sitePhone = $settings->site_phone;
            $this->siteKeywords = $settings->site_keywords;
            $this->siteDescription = $settings->site_description;
        }
    }

    public function updateSettings()
    {
        // Validation des données
        $this->validate([
            'siteTitle' => 'required|string|max:255',
            'siteEmail' => 'required|email|max:255',
            'sitePhone' => 'nullable|string|max:20',
            'siteKeywords' => 'nullable|string|max:255',
            'siteDescription' => 'nullable|string|max:500',
        ]);

        // Mettre à jour les paramètres du site
        $settings = SiteSetting::first();
        $settings->update([
            'site_title' => $this->siteTitle,
            'site_email' => $this->siteEmail,
            'site_phone' => $this->sitePhone,
            'site_keywords' => $this->siteKeywords,
            'site_description' => $this->siteDescription,
        ]);

        session()->flash('success', 'Settings updated successfully!');
    }
}
