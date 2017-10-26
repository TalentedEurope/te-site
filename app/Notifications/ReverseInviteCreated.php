<?php

namespace App\Notifications;

use App\Models\ValidatorInvite;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ReverseInviteCreated extends Notification
{
    use Queueable;

    protected $user;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $user)
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
        $validator = $this->user->name != "" ? $this->user->fullName : $this->user->email;

        return (new MailMessage())
                    ->subject(sprintf(trans('email.reverseInviteCreated_subject_1'), $validator))
                    ->line(sprintf(trans('email.reverseInviteCreated_line_2'), $validator))
                    ->line(trans('email.reverseInviteCreated_line_3'))

                    ->action(trans('email.reverseInviteCreated_action_4'), route('view_profile'));

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
