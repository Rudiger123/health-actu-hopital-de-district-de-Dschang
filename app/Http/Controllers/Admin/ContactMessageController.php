<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CMail;
use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{
    public function index()
    {
        return view('admin.contact-messages.index');
    }

    public function show(ContactMessage $message)
    {
        if (!$message->is_read) {
            $message->markAsRead();
        }
        return view('admin.contact-messages.show', compact('message'));
    }

    public function reply(Request $request, ContactMessage $message)
    {
        // Validation de la réponse
        $request->validate([
            'reply' => 'required|string'
        ]);

        // Mise à jour de la réponse dans le modèle
        $message->update([
            'reply' => $request->reply,
            'replied_at' => now(),
            'is_read' => true
        ]);

        // Récupération des infos du site (email, nom)
        $siteInfo = SiteSetting::first();

        // Préparer le contenu de l'email
        $email_body = view('emails.contact-reply', [
            'message' => $message,
            'reply' => $request->reply
        ])->render();

        // Préparer les paramètres pour CMail
        $emailConfig = [
            'recipient_address' => $message->email,
            'recipient_name' => $message->name,
            'subject' => '=?UTF-8?B?' . base64_encode('Réponse à votre message : ' . $message->subject) . '?=',
            'body' => $email_body,
            'form_name' => $siteInfo->site_title ?? config('app.name'),
            'form_email' => $siteInfo->site_email ?? config('mail.from.address'),
            'headers' => [
                'Content-Type' => 'text/html; charset=UTF-8',
                'Content-Transfer-Encoding' => '8bit'
            ]
        ];

        // Envoi de l'email avec CMail
        $emailResult = CMail::send($emailConfig);

        // Vérification du résultat
        if ($emailResult['success']) {
            return redirect()->route('admin.contact-messages.show', $message)
                ->with('success', 'Réponse envoyée avec succès.');
        } else {
            return redirect()->route('admin.contact-messages.show', $message)
                ->with('error', 'Erreur lors de l\'envoi de l\'email : ' . $emailResult['message']);
        }
    }

    protected function sendConfirmationEmail(ContactMessage $message)
    {
        $siteInfo = SiteSetting::first();

        // Préparer le contenu de l'email de confirmation
        $email_body = view('emails.contact-confirmation', [
            'message' => $message,
            'siteInfo' => $siteInfo
        ])->render();

        // Préparer les paramètres pour CMail
        $emailConfig = [
            'recipient_address' => $message->email,
            'recipient_name' => $message->name,
            'subject' => '=?UTF-8?B?' . base64_encode('Confirmation de réception de votre message') . '?=',
            'body' => $email_body,
            'form_name' => $siteInfo->site_title ?? config('app.name'),
            'form_email' => $siteInfo->site_email ?? config('mail.from.address'),
            'headers' => [
                'Content-Type' => 'text/html; charset=UTF-8',
                'Content-Transfer-Encoding' => '8bit'
            ]
        ];

        // Envoi de l'email avec CMail
        return CMail::send($emailConfig);
    }
}
