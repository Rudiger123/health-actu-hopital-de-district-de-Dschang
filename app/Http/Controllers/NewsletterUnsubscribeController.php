<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsletterSubscriber;
use App\Models\NewsletterSubscription;
use Illuminate\Support\Facades\Log;

class NewsletterUnsubscribeController extends Controller
{
    /**
     * Affiche la page de confirmation de désabonnement.
     */
    public function confirm($token)
    {
        Log::info('Tentative de désabonnement avec le token: ' . $token);

        // Vérifier que le token n'est pas 'success' ou 'error'
        if ($token === 'success' || $token === 'error') {
            Log::warning('Token invalide (success/error): ' . $token);
            return to_route('newsletter.unsubscribe.error')
                ->with('error', 'Le lien de désabonnement est invalide.');
        }

        $subscriber = NewsletterSubscription::where('unsubscribe_token', $token)
            ->where('is_subscribed', true)
            ->first();

        if (!$subscriber) {
            Log::warning('Token invalide ou abonnement non trouvé: ' . $token);
            return to_route('newsletter.unsubscribe.error')
                ->with('error', 'Le lien de désabonnement est invalide ou a expiré.');
        }

        Log::info('Abonné trouvé: ' . $subscriber->email);
        return view('newsletter.unsubscribe_confirm', compact('subscriber'));
    }

    /**
     * Traite le désabonnement.
     */
    public function unsubscribe(Request $request)
    {
        Log::info('Traitement de la demande de désabonnement', ['token' => $request->token]);

        $request->validate([
            'token' => 'required|string|size:64',
        ]);

        $subscriber = NewsletterSubscription::where('unsubscribe_token', $request->token)
            ->where('is_subscribed', true)
            ->first();

        if (!$subscriber) {
            Log::warning('Tentative de désabonnement avec un token invalide: ' . $request->token);
            return to_route('newsletter.unsubscribe.error')
                ->with('error', 'Le lien de désabonnement est invalide ou a déjà été utilisé.');
        }

        try {
            $subscriber->update(['is_subscribed' => false]);
            Log::info('Désabonnement réussi pour: ' . $subscriber->email);

            return to_route('newsletter.unsubscribe.success')
                ->with('success', 'Vous avez été désabonné(e) avec succès de notre newsletter.');
        } catch (\Exception $e) {
            Log::error('Erreur lors du désabonnement: ' . $e->getMessage());
            return to_route('newsletter.unsubscribe.error')
                ->with('error', 'Une erreur est survenue lors du désabonnement.');
        }
    }

    /**
     * Affiche la page de succès du désabonnement.
     */
    public function success()
    {
        Log::info('Affichage de la page de succès');
        return view('newsletter.unsubscribe_success');
    }

    /**
     * Affiche la page d'erreur du désabonnement.
     */
    public function error()
    {
        Log::info('Affichage de la page d\'erreur', [
            'error' => session('error'),
            'success' => session('success')
        ]);
        return view('newsletter.unsubscribe_error');
    }
}
