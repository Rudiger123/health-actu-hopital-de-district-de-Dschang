<?php

namespace App\Livewire\Blog;

use App\Models\NewsletterSubscription;
use Livewire\Component;
use Illuminate\Support\Str;
class NewsletterForm extends Component
{
    public $email = '';

    protected $rules = [
        'email' => [
            'required',
            'email:rfc,dns,filter,spoof,strict',
            'unique:newsletter_subscriptions,email',
            'max:255',
        ]
    ];

    protected $messages = [
        'email.required' => 'Please enter your email address',
        'email.email' => 'Please provide a valid email address',
        'email.unique' => 'this email is already subscribed, please use another'
    ];

    public function updatedEmail()
    {
        $this->validateOnly('email');
    }

    public function subscription()
    {
        $this->validate();

        NewsletterSubscription::create([
            'email' => $this->email,
            'unsubscribe_token' => Str::random(60)
        ]);

        $this->email  = '';

        $this->dispatch(
            'show-toast',
            type: 'success',
            message: 'You have now successfully subscribed'
        );
    }


    public function render()
    {
        return view('livewire.blog.newsletter-form');
    }
}
