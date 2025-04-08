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
        // redirect an authenticated user to Dashbaord
        RedirectIfAuthenticated::redirectUsing(function(){
           // message d'avertissement de deconnexion et de demande de connexion de l'utilisateur
           return route('home');
        });
        // redirect an no authenticated user to home page 
        Authenticate::redirectUsing(function(){   
              // message vous etes déjà authentifié
              return route('admin.dashboard');
        });

    }
}
