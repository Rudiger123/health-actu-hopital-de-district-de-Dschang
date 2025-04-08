<?php

namespace App\Livewire\Auth;

use App\UserStatus;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class LoginForm extends Component
{
    public $login_id;
    public $password;
    public $remember = false;
    public $alertType = null;
    public $alertMessage = null;

    protected $rules = [
        'login_id' => 'required|string',
        'password' => 'required|string|min:8',
    ];

    protected $messages = [
        'login_id.required' => 'Entrez votre email ou votre nom d\'utilisateur',
        'password.required' => 'Entrez votre mot de passe',
        'password.min' => 'Le mot de passe doit contenir au moins 8 caractères',
    ];

    public function login()
    {
        $this->validate();
        $this->resetAlert();

        try {
            $credentials = $this->getCredentials();

            if (!Auth::validate($credentials)) {
                throw ValidationException::withMessages([
                    'login_id' => __('auth.failed'),
                ]);
            }

            $user = Auth::getProvider()->retrieveByCredentials($credentials);

            if ($user->status == UserStatus::Inactive) {
                $this->showAlert('danger', 'Votre compte est désactivé. Contactez l\'administrateur.');
                return;
            }

            if ($user->status == UserStatus::Pending) {
                $this->showAlert('info', 'Votre compte doit etre validé. Contactez l\'administrateur.');
                return;
            }


            Auth::login($user, $this->remember);

            // Définir le message de succès dans la session ET dans le composant
            Session::flash('alertType', 'success');
            Session::flash('alertMessage', 'Connexion réussie');
            $this->alertType = 'success';
            $this->alertMessage = 'Connexion réussie';

            session()->flash('toast', [
                'type' => 'success',
                'message' => "Connexion réussie, Bienvenue $user->username ",
            ]);

            return redirect()->intended(route('admin.dashboard'));

        } catch (ValidationException $e) {
            $this->showAlert('danger', $e->getMessage());
        } catch (\Exception $e) {
            $this->showAlert('danger', 'Une erreur est survenue lors de la connexion');
        }
    }

    protected function getCredentials()
    {
        return filter_var($this->login_id, FILTER_VALIDATE_EMAIL)
            ? ['email' => $this->login_id, 'password' => $this->password]
            : ['username' => $this->login_id, 'password' => $this->password];
    }

    private function showAlert($type, $message)
    {
        $this->alertType = $type;
        $this->alertMessage = $message;
        $this->dispatch('show-alert', type: $type, message: $message);
    }

    private function resetAlert()
    {
        $this->alertType = null;
        $this->alertMessage = null;
    }

    public function render()
    {
        return view('livewire.auth.login-form');
    }
}
