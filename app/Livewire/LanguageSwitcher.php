<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageSwitcher extends Component
{
    public string $currentLocale;

    public function mount()
    {
        $this->currentLocale = Session::get('locale', config('app.locale'));
    }

    public function switch($locale)
    {
        if (in_array($locale, config('app.locales', ['en', 'fr']))) {
            Session::put('locale', $locale);
            App::setLocale($locale);
            $this->currentLocale = $locale;

            // Optionnel : recharger la page pour appliquer le changement globalement
            return redirect(request()->header('Referer') ?? '/');
        }
    }

    public function render()
    {
        return view('livewire.language-switcher');
    }
}
