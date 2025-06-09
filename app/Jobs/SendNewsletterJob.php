<?php

namespace App\Jobs;

use App\Helpers\CMail;
use App\Models\SiteSetting;
use App\Models\NewsletterSubscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendNewsletterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $subscriber_email;
    public $currentPost;

    /**
     * Create a new job instance.
     *
     * @param string $subscriber_email
     * @param mixed $currentPost
     */
    public function __construct($subscriber_email, $currentPost)
    {
        $this->currentPost = $currentPost;
        $this->subscriber_email = $subscriber_email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // 1. Récupérer l'abonné pour obtenir le token de désabonnement
        $subscriber = NewsletterSubscription::where('email', $this->subscriber_email)->first();

        // Si l'abonné n'est pas trouvé ou n'est plus abonné, on arrête
        if (!$subscriber || !$subscriber->is_subscribed) {
            Log::info("Tentative d'envoi à un abonné non trouvé ou désabonné: " . $this->subscriber_email);
            return;
        }

        // Vérifier si le token existe
        if (!$subscriber->unsubscribe_token) {
            Log::error("Token de désabonnement manquant pour l'email: " . $this->subscriber_email);
            return;
        }

        // 2. Générer le lien de désabonnement
        $unsubscribeUrl = route('newsletter.unsubscribe.confirm', ['token' => $subscriber->unsubscribe_token]);

        // 3. Préparer les données pour la vue
        $data = [
            'post' => $this->currentPost,
            'unsubscribeUrl' => $unsubscribeUrl,
            'subscriber' => $subscriber,
        ];

        $email_body = view('email-templates.newsletter-template', $data)->render();

        $siteInfo = SiteSetting::first();
        if (!$siteInfo) {
            throw new \RuntimeException('Site settings not found');
        }

        $emailConfig = [
            'recipient_address' => $this->subscriber_email,
            'recipient_name' => '',
            'subject' => 'Latest Blog Post: ' . $this->currentPost->title,
            'body' => $email_body,
            'form_name' => $siteInfo->name,
            'form_email' => $siteInfo->email
        ];

        CMail::send($emailConfig);
    }
}
