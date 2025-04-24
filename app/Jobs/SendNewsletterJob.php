<?php

namespace App\Jobs;

use App\Helpers\CMail;
use App\Models\SiteSetting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

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
        $data = ['post' => $this->currentPost];
        $email_body = view('email-templates.newsletter-template', ['data' => $data, 'post' => $this->currentPost])->render();
        
        $siteInfo = SiteSetting::first();
        if (!$siteInfo) {
            throw new \RuntimeException('Site settings not found');
        }

        $emailConfig = [
            'recipient_address' => $this->subscriber_email,
            'recipient_name' => '', // Vous pourriez vouloir ajouter un nom ici si disponible
            'subject' => 'Latest Blog Post',
            'body' => $email_body,
            'form_name' => $siteInfo->name,
            'form_email' => $siteInfo->email
        ];

        CMail::send($emailConfig);
    }
}