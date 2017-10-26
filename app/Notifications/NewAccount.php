<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewAccount extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;
    public $email;

    /**
     * Create a notification instance.
     *
     * @param  string $token
     * @return void
     */
    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }


    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(trans('email.institution_account_created_subject_1'))
            ->line(trans('email.institution_account_created_line_2'))
            ->line(trans('email.institution_account_created_line_3'))
            ->action(trans('email.institution_account_created_action_4'), url('password/reset?email='.$this->email, $this->token));
    }
}
