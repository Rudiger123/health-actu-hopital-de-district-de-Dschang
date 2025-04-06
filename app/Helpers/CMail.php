<?php

namespace App\Helpers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Log;

class CMail
{
    /**
     * Envoi d'un email via SMTP
     * 
     * @param array $config Configuration de l'email
     * @return array ['success' => bool, 'message' => string, 'error' => string|null]
     */
    public static function send(array $config): array
    {
        $mail = new PHPMailer(true);

        try {
            // Configuration SMTP
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = config('services.mail.host');
            $mail->SMTPAuth = true;
            $mail->Username = config('services.mail.username');
            $mail->Password = config('services.mail.password');
            $mail->SMTPSecure = config('services.mail.encryption', PHPMailer::ENCRYPTION_STARTTLS);
            $mail->Port = config('services.mail.port', 587);

            // Expéditeur
            $fromAddress = $config['from_address'] ?? config('services.mail.from_address');
            $fromName = $config['from_name'] ?? config('services.mail.from_name');
            $mail->setFrom($fromAddress, $fromName);

            // Destinataire
            $mail->addAddress($config['recipient_address'], $config['recipient_name'] ?? '');

            // Contenu
            $mail->isHTML(true);
            $mail->Subject = $config['subject'];
            $mail->Body = $config['body'];
            $mail->AltBody = strip_tags($config['body']); // Version texte brut

            // Pièces jointes
            if (!empty($config['attachments'])) {
                foreach ((array)$config['attachments'] as $attachment) {
                    // Vérifiez si $attachment est un tableau et qu'il a une clé 'path'
                    if (is_array($attachment) && isset($attachment['path']) && file_exists($attachment['path'])) {
                        $mail->addAttachment(
                            $attachment['path'],
                            $attachment['name'] ?? basename($attachment['path']),
                            'base64',
                            'image/webp',
                            $attachment['cid'] // CID pour l'intégration dans le HTML
                        );
                    } else {
                        Log::warning("Pièce jointe invalide ou chemin incorrect : " . print_r($attachment, true));
                    }
                }
            }

            // Envoi
            $mail->send();

            return [
                'success' => true,
                'message' => 'Email envoyé avec succès',
                'error' => null
            ];
        } catch (Exception $e) {
            Log::error('Erreur d\'envoi d\'email', [
                'error' => $e->getMessage(),
            ]);

            return [
                'success' => false,
                'message' => 'Échec de l\'envoi de l\'email',
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Masque les informations sensibles pour les logs
     */
    protected function safeConfig(array $config): array
    {
        $safe = $config;
        if (isset($safe['password'])) $safe['password'] = '*****';
        return $safe;
    }
}
