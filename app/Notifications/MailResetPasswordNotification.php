<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MailResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $link = url("/password/reset/?token=" . $this->token);

        return (new MailMessage)
            ->greeting("Olá!")
            ->from('solutions.fto@gmail.com', "FTO Solutions")
            ->subject('Esqueci minha senha - FTO Solutions')
            ->line("Você solicitou a recuperação de sua senha")
            ->action('Redefinir senha', $link)
            ->line("Atenciosamente,")
            ->salutation("FTO Solutions");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public
    function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
