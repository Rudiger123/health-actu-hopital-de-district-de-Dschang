<?php

namespace App\Livewire\Blog;

use App\Helpers\CMail;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ContactForm extends Component
{
    public $name, $email, $phone, $message, $subject;

    protected $rules = [
        'email' => 'required|min:5|max:255',
        'phone' => 'required',
        'message' => 'required|min:5|max:255',
        'name' => 'required',
        'subject' => 'required|min:5',
    ];

    public function sendMessage()
    {
        $data = $this->validate();

        $siteInfo = SiteSetting::first();

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

        if ($emailResult['success']) {
            $this->reset();
            Session::flash('status', $emailResult['message']);
        } else {
            Session::flash('error', $emailResult['message']);
        }
    }

    public function render()
    {
        return view('livewire.blog.contact-form');
    }
}
