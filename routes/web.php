<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Back\Profile as BackProfile;
use Livewire\Volt\Volt;

/**
 * les routes de l'interface utilisateur de la plateforme
 */

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/services', function () {
    return view('pages.services');
})->name('services');

Route::get('actualités', function () {
    return view('pages.blog.index');
})->name('blog.index');

Route::get('contact', function () {
    return view('pages.contact');
})->name('contact');


/**
 *  ADMIN ROUTES
 */
Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware(['auth'])->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'adminDashoard')->name('dashboard');
            Route::post('/logout', 'logoutHandler')->name('logout');
        });

        Volt::route('/profile', BackProfile::class)->name('profile');
    });
});

