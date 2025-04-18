<?php

use App\Http\Controllers\AdminController;
use App\Livewire\Back\Admin\Category;
use App\Livewire\Back\Admin\Post;
use Illuminate\Support\Facades\Route;
use App\Livewire\Back\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;

/**
 * les routes de l'interface utilisateur de la plateforme
 */

Route::middleware('guest')->group(function () {
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

    // AUTHENTIFICATION ROUTE
    Route::get('/login', function () {
        return redirect()->route('home');
    })->name('login');
});

/**
 *  ADMIN ROUTES
 */
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'adminDashoard')->name('dashboard');
            Route::post('/logout', 'logoutHandler')->name('logout');
            Route::get('/profile', Profile::class)->name('profile');
            Route::get('/categories', 'categories')->name('categories');
            Route::get('/posts', 'posts')->name('posts');
            Route::get('/tags', 'tags')->name('tags');
        });
    });
});

// USER ROUTES
// RESET PASSWORD TOKEN LINK
Route::get('/reset-password/{token}', function ($token) {
    $tokenData = DB::table('password_reset_tokens')->where('token', $token)->first();
    if (!$tokenData) {
        session()->flash('toast', [
            'type' => 'error',
            'message' => 'Token invalide ou expiré. Veuillez recommencer la procédure.',
        ]);
        return redirect()->route('home');
    }

    return view('pages.resetPassword', [
        'token' => $token,
        'email' => $tokenData->email,
    ]);
})->name('resetpassword.form');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'token' => 'required',
        'password' => 'required|min:6|confirmed',
    ]);

    $tokenData = DB::table('password_reset_tokens')
        ->where('email', $request->email)
        ->where('token', $request->token)
        ->first();

    if (!$tokenData) {
        return back()->withErrors(['email' => 'Le lien de réinitialisation est invalide ou expiré.']);
    }

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()->withErrors(['email' => 'Aucun utilisateur trouvé avec cet email.']);
    }

    $user->password = Hash::make($request->password);
    $user->setRememberToken(Str::random(60));
    $user->save();

    // Supprimer le token
    DB::table('password_reset_tokens')->where('email', $request->email)->delete();

    session()->flash('toast', [
        'type' => 'success',
        'message' => 'Mot de passe réinitialisé avec succès. Vous pouvez maintenant vous connecter.',
    ]);

    return redirect()->route('home');
})->name('resetpassword.submit');
