<?php

namespace App\Livewire;

use App\Helpers\CMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ResetPasswordForm extends Component
{
    public string $email = '';
    public bool $isSent = false;
    public string $statusMessage = '';
    public bool $showSuccess = false;
    public $data = [];

    public function mount()
    {
        $data = [
            'actionLink' => null,
            'user' => null
        ];
    }

    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email:rfc,dns,filter',
                'max:255',
                'exists:users,email'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'Veuillez entrer une adresse email valide.',
            'email.max' => 'L\'email ne doit pas dépasser 255 caractères.',
            'email.exists' => 'Aucun compte n\'est associé à cette adresse email.'
        ];
    }

    public function sendResetLink(): void
    {
        $this->validate();
        $this->resetErrorBag();

        try {
            // Récupération de l'utilisateur avec vérification d'existence
            $user = User::where('email', $this->email)->firstOrFail();

            // Création d'un token sécurisé
            $token = hash_hmac('sha256', Str::random(40), config('app.key'));

            // Gestion du token existant ou nouveau
            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $this->email],
                [
                    'token' => $token,
                    'created_at' => Carbon::now(),
                ]
            );

            // Construction du lien sécurisé
            $actionLink = route('resetpassword.form', ['token' => $token, 'email' => urlencode($this->email)]);

            $data = [
                'actionLink' => $actionLink,
                'user' => $user
            ];


            $email_body = view('email-templates.forgot-template', ['data' => $data])->render();

            $emailConfig = [
                'recipient_address' => $user->email,
                'recipient_name' => $user->name,
                'subject' => 'Réinitialisation de votre mot de passe',
                'body' => $email_body,
                'attachments' => [
                    [
                       'path' => public_path('favicon.webp'),
                        'name' => 'favicon.webp',
                        'cid' => 'favicon.webp' // Référence CID pour l'embed dans l'HTML
                    ]
                ]
            ];

            $emailResult = CMail::send($emailConfig);

            if ($emailResult['success']) {
                $this->isSent = true;
                $this->statusMessage = $emailResult['message'];
                $this->showSuccess = true;
                $this->reset('email');
                Session::flash('status', $this->statusMessage);
            } else {
                $this->addError('email', $emailResult['message']);
                Log::error('Échec envoi email réinitialisation', [
                    'error' => $emailResult['error'],
                    'user' => $user->id,
                    'email' => $user->email
                ]);
            }
        } catch (\Exception $e) {
            $this->addError('email', 'Une erreur est survenue lors de l\'envoi du lien. Veuillez réessayer.');
            report($e); // Log l'erreur
        }
    }

    public function resetForm(): void
    {
        $this->resetErrorBag();
        $this->reset(['email', 'isSent', 'statusMessage', 'showSuccess']);
    }

    public function resetSuccess(): void
    {
        $this->showSuccess = false;
    }

    public function render()
    {
        return view('livewire.reset-password-form');
    }
}
