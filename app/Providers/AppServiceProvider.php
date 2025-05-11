<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Livewire\WithPagination;

class AppServiceProvider extends ServiceProvider
{
    use WithPagination;
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
        Gate::policy(User::class, UserPolicy::class);
        // Paginator::defaultView('vendor.pagination.custom');
        RedirectIfAuthenticated::redirectUsing(function () {
            session()->flash('message', 'Vous êtes déjà connecté !');
            return route('admin.dashboard');
        });
    }
}
