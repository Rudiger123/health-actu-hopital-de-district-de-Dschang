<?php

namespace App\Livewire;

use App\Jobs\SendNewsletterJob;
use App\Models\NewsletterSubscription;
use Livewire\Component;

class SendNewsletterForm extends Component
{
    public $newsletterSubject = ''; // Nouvelle propriété pour le sujet
    public $newsletterContent = '';
    public $message = '';
    public $subscribersCount = 0;

    protected $rules = [
        'newsletterSubject' => 'required|string|min:5|max:255', // Validation pour le sujet
        'newsletterContent' => 'required|min:10',
    ];

    public function mount()
    {
        $this->subscribersCount = NewsletterSubscription::where('is_subscribed', true)->count();
    }

    public function sendNewsletter()
    {
        $this->validate();

        if ($this->subscribersCount === 0) {
            $this->message = 'Il n\'y a aucun abonné actif à la newsletter. L\'envoi n\'a pas été effectué.';
            session()->flash('error', $this->message);
            return;
        }

        // Récupérer les OBJETS abonnés actifs
        $activeSubscribers = NewsletterSubscription::where('is_subscribed', true)->get();

        foreach ($activeSubscribers as $subscriber) {
            // Dispatcher le job, en lui passant l'objet abonné, le sujet et le contenu
            SendNewsletterJob::dispatch($subscriber, $this->newsletterSubject, $this->newsletterContent);
        }

        $this->message = 'La newsletter a été envoyée avec succès à ' . $this->subscribersCount . ' abonnés.';
        session()->flash('success', $this->message);

        // Réinitialiser le formulaire
        $this->newsletterSubject = '';
        $this->newsletterContent = '';
        $this->subscribersCount = NewsletterSubscription::where('is_subscribed', true)->count();
    }

    public function render()
    {
        return view('livewire.send-newsletter-form');
    }
}
