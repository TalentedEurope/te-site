<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\ValidatorInvite;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ChangeInstitution extends Notification
{
    use Queueable;

    protected $invite;
    protected $user;


    /**
     * Create a new notification instance.
     */
    public function __construct(ValidatorInvite $invite, User $user)
    {
        $this->invite = $invite;
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
        $institution = $this->invite->institution->user->fullName;

        return (new MailMessage())
                    ->subject(sprintf(trans('email.changeInstitution_subject_1'), $institution))
                    ->line(sprintf(trans('email.changeInstitution_line_2'), $institution))
                    ->line(trans('email.changeInstitution_line_3'))

                    ->action(trans('email.changeInstitution_action_4'), route('change_institution', $this->invite->uid).'?email='.urlencode($this->invite->email))
                    ->line(trans('email.changeInstitution_line_5'));
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
