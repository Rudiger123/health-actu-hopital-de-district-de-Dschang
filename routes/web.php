<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\NewsletterUnsubscribeController;
use App\Livewire\Back\Profile;
use App\Livewire\NewsletterSubscribers;
use App\Livewire\SendNewsletterForm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/**
 * Routes publiques (Front-end)
 */
Route::controller(FrontController::class)->group(function () {
    // Pages principales
    Route::get('/', 'index')->name('home');
    Route::get('/services', 'services')->name('services');
    Route::get('contact', 'contact')->name('contact');

    // Blog et articles
    Route::get('actualités', 'actualités')->name('blog.index');
    Route::get('/post/{slug}', 'readPost')->name('read_post');
    Route::get('/post/{slug}', 'show')->name('blog.show');
    Route::get('/post/categories/{slug}', 'categoryPost')->name('category_posts');
    Route::get('/post/author/{username}', 'authorPosts')->name('author_posts');
    Route::get('/post/tag/{any}', 'tagPosts')->name('tag_posts');
    Route::get('/blog/search', 'searchResults')->name('blog.search');
    Route::get('/search', 'searchPosts')->name('search');
});

/**
 * Routes d'authentification
 */
Route::get('/login', function () {
    return redirect()->route('home');
})->name('login');

/**
 * Routes d'administration
 */
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Routes protégées par authentification
        Route::middleware(['auth', 'preventBackHistory'])
            ->controller(AdminController::class)
            ->group(function () {
                Route::get('/dashboard', 'adminDashoard')->name('dashboard');
                Route::post('/logout', 'logoutHandler')->name('logout');
                Route::get('/profile', Profile::class)->name('profile');
                Route::get('/categories', 'categories')->name('categories');
                Route::get('/posts', 'posts')->name('posts');
                Route::get('/tags', 'tags')->name('tags');
                Route::get('/comments', 'commentsManager')->name('commentsManager');
                Route::get('/users', 'usersManager')->name('usersManager');
                Route::get('/newsletter-subscribers', 'newsletterSubscribers')->name('newsletter.subscribers');
                Route::get('/subscribers','subscribers')->name('subscribers');
            });

        // Routes de gestion des messages de contact
        Route::middleware(['auth'])
            ->group(function () {
                Route::get('/contact-messages', [ContactMessageController::class, 'index'])->name('contact-messages.index');
                Route::get('/contact-messages/{message}', [ContactMessageController::class, 'show'])->name('contact-messages.show');
                Route::post('/contact-messages/{message}/reply', [ContactMessageController::class, 'reply'])->name('contact-messages.reply');
                Route::delete('/contact-messages/{message}', [ContactMessageController::class, 'destroy'])->name('contact-messages.destroy');
            });
    });

/**
 * Routes de la newsletter
 */
Route::prefix('newsletter')
    ->name('newsletter.')
    ->group(function () {
        Route::get('unsubscribe/{token}', [NewsletterUnsubscribeController::class, 'confirm'])
            ->where('token', '^(?!success$|error$).*$')
            ->name('unsubscribe.confirm');
        Route::post('unsubscribe', [NewsletterUnsubscribeController::class, 'unsubscribe'])->name('unsubscribe');
        Route::get('unsubscribe/success', [NewsletterUnsubscribeController::class, 'success'])->name('unsubscribe.success');
        Route::get('unsubscribe/error', [NewsletterUnsubscribeController::class, 'error'])->name('unsubscribe.error');
    });
    
    Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/newsletter-subscribers', NewsletterSubscribers::class)->name('newsletter.subscribers');
        Route::get('/newsletter-send', SendNewsletterForm::class)->name('newsletter.send');
    });

/**
 * Routes de réinitialisation de mot de passe
 */
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
