<?php

namespace App\Notifications;

use App\Models\ValidatorInvite;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class InviteCreated extends Notification
{
    use Queueable;

    protected $user;

    /**
     * Create a new notification instance.
     */
    public function __construct(ValidatorInvite $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $institution = $this->user->institution->user->fullName;

        return (new MailMessage())
                    ->subject(sprintf(trans('email.inviteCreated_subject_1'), $institution))
                    ->line(sprintf(trans('email.inviteCreated_line_2'), $institution))
                    ->line(trans('email.inviteCreated_line_3'))

                    ->action(trans('email.inviteCreated_action_4'), route('get_register_validator', $this->user->uid).'?email='.urlencode($this->user->email))
                    ->line(trans('email.inviteCreated_line_5'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
