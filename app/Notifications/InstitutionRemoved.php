<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Institution;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class InstitutionRemoved extends Notification
{
    use Queueable;

    protected $user;
    protected $institution;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $user, Institution $institution)
    {
        $this->user = $user;
        $this->institution = $institution;
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
        return (new MailMessage())
                    ->subject(sprintf(trans('email.institutionRemoved.subject_1'), $this->institution->user->name))
                    ->line(sprintf(trans('email.institutionRemoved.institutionRemoved.line_2'))
                    ->line(trans('email.institutionRemoved.institutionRemoved.line_3'));
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
