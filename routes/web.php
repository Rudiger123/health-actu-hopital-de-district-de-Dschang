<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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
            Route::get('/dashboard', 'adminDashboard')->name('dashboard');
            Route::post('/logout', 'logoutHandler')->name('logout');
        });
    });
});

Route::get('/livewire/livewire.js', Livewire\Mechanisms\FrontendAssets\FrontendAssets::class);
