<?php

namespace App\Providers;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RedirectIfAuthenticated::redirectUsing(function () {
            session()->flash('message', 'Vous êtes déjà connecté !');
            return route('admin.dashboard');
        });
        
        Authenticate::redirectUsing(function () {
            session()->flash('warning', 'Veuillez vous connecter pour accéder à cette page.');
            return route('home');
        });
        

    }
}
