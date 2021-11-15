<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegistrationApproval extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $defaultPassword = User::DEFAULT_PASSWORD;

        return (new MailMessage)
            ->subject('Demande de compte Formateur acceptée')
            ->from('subscription@e-formation.fr', 'E-Formation')
            ->greeting('Bonjour !')
            ->line("Votre demande d'accès pour un compte en tant que formateur vient d'être acceptée.")
            ->line('Vos identifiants: ')
            ->line("Email: $notifiable->email")
            ->line("Mot de passe: $defaultPassword")
            ->action('Accéder à mon compte', route('login'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
