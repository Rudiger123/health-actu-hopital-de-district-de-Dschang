<?php

namespace App\Livewire\Blog;

use App\Helpers\CMail;
use App\Models\ContactMessage;
use App\Models\SiteSetting;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $message;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
        'subject' => 'required|min:5',
        'message' => 'required|min:10'
    ];

    protected $messages = [
        'phone.required' => 'Le numéro de téléphone est requis.',
        'phone.regex' => 'Le format du numéro de téléphone est invalide.',
        'phone.min' => 'Le numéro de téléphone doit contenir au moins 8 chiffres.'
    ];

    public function sendMessage()
    {
        try {
            // Validation des données
            $data = $this->validate();

            // Créer le message dans la base de données
            $contactMessage = ContactMessage::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'subject' => $this->subject,
                'message' => $this->message,
                'is_read' => false
            ]);

            $siteInfo = SiteSetting::first();

            // Envoyer l'email de notification à l'administrateur
            $email_body = view('email-templates.contact-template', ['data' => $data])->render();

            $emailConfig = [
                'recipient_address' => $siteInfo->site_email,
                'recipient_name' => $siteInfo->site_title,
                'subject' => $this->subject,
                'body' => $email_body,
                'form_name' => $this->name,
                'form_email' => $this->email
            ];

            $emailResult = CMail::send($emailConfig);

            // Envoyer l'email de confirmation à l'expéditeur
            $confirmationEmail = view('emails.contact-confirmation', [
                'message' => $contactMessage,
                'siteInfo' => $siteInfo
            ])->render();

            $confirmationConfig = [
                'recipient_address' => $this->email,
                'recipient_name' => $this->name,
                'subject' => '=?UTF-8?B?' . base64_encode('Confirmation de réception de votre message') . '?=',
                'body' => $confirmationEmail,
                'form_name' => $siteInfo->site_title ?? config('app.name'),
                'form_email' => $siteInfo->site_email ?? config('mail.from.address'),
                'headers' => [
                    'Content-Type' => 'text/html; charset=UTF-8',
                    'Content-Transfer-Encoding' => '8bit'
                ]
            ];

            CMail::send($confirmationConfig);

            if ($emailResult['success']) {
                $this->reset();
                Session::flash('status', 'Votre message a été envoyé avec succès. Vous recevrez bientôt une confirmation par email.');
            } else {
                Session::flash('error', 'Une erreur est survenue lors de l\'envoi du message. Veuillez réessayer.');
            }
        } catch (\Exception $e) {
            Session::flash('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.blog.contact-form');
    }
}
