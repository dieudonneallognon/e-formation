<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Crypt;

class RegistrationDemand extends Notification
{
    use Queueable;

    /**
     * The user that requested an account 's email firstname.
     *
     * @var string
     */
    private $userFirstName;

    /**
     * The user that requested an account 's email lastname.
     *
     * @var string
     */
    private $userLastName;

    /**
     * The user that requested an account 's email email.
     *
     * @var string
     */
    private $userEmail;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $userLastName, string $userFirstName, string $userEmail)
    {
        $this->userEmail = $userEmail;
        $this->userFirstName = $userFirstName;
        $this->userLastName = $userLastName;
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
        return (new MailMessage)
            ->subject('Demande de compte Formateur')
            ->greeting('Bonjour !')
            ->from('subscription@e-formation.fr', "$this->userLastName $this->userFirstName")
            ->line("Une demande d'accès pour un compte en tant que formateur vient d'être envoyée par $this->userLastName $this->userFirstName")
            ->action(
                'Ajouter en tant que Formateur',
                route(
                    'confirm-registration',
                    ['token' => Crypt::encrypt("$this->userEmail:$this->userFirstName:$this->userLastName")]
                )
            );
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
