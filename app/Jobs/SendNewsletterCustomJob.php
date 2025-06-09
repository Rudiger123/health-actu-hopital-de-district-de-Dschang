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

class SendNewsletterCustomJob
implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $subscriber; // We'll pass the whole subscriber model now
    public $newsletterSubject;
    public $newsletterContent; // This will be the custom HTML content

    /**
     * Create a new job instance.
     *
     * @param \App\Models\NewsletterSubscription $subscriber
     * @param string $newsletterSubject
     * @param string $newsletterContent
     */
    public function __construct(NewsletterSubscription $subscriber, string $newsletterSubject, string $newsletterContent)
    {
        $this->subscriber = $subscriber;
        $this->newsletterSubject = $newsletterSubject;
        $this->newsletterContent = $newsletterContent;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // We already have the subscriber model, so no need to fetch it again
        $subscriber = $this->subscriber;

        // If the subscriber is not found or is no longer subscribed, stop
        if (!$subscriber || !$subscriber->is_subscribed) {
            Log::info("Tentative d'envoi à un abonné non trouvé ou désabonné: " . $subscriber->email);
            return;
        }

        // Check if the unsubscribe token exists
        if (!$subscriber->unsubscribe_token) {
            Log::error("Token de désabonnement manquant pour l'email: " . $subscriber->email);
            return;
        }

        // 1. Generate the unsubscribe link
        $unsubscribeUrl = route('newsletter.unsubscribe.confirm', ['token' => $subscriber->unsubscribe_token]);

        // 2. Prepare data for the email view (using the custom content now)
        $data = [
            'content' => $this->newsletterContent, // Use the custom content directly
            'unsubscribeUrl' => $unsubscribeUrl,
            'subscriber' => $subscriber,
        ];

        // Ensure you have an email template that accepts a 'content' variable
        // For example, resources/views/email-templates/custom-newsletter.blade.php
        $email_body = view('email-templates.custom-newsletter', $data)->render();

        $siteInfo = SiteSetting::first();
        if (!$siteInfo) {
            throw new \RuntimeException('Site settings not found');
        }

        $emailConfig = [
            'recipient_address' => $subscriber->email,
            'recipient_name' => '', // You might want to use $subscriber->name if available
            'subject' => $this->newsletterSubject, // Use the custom subject
            'body' => $email_body,
            'form_name' => $siteInfo->name,
            'form_email' => $siteInfo->email
        ];

        // Send the email
        CMail::send($emailConfig);

        Log::info("Newsletter envoyée avec succès à: " . $subscriber->email . " - Sujet: " . $this->newsletterSubject);
    }
}
