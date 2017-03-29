<?php

namespace App\Notifications;

use App\Models\ValidationRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ValidatorRequested extends Notification
{
    use Queueable;

    protected $validatorRequest;

    /**
     * Create a new notification instance.
     */
    public function __construct(ValidationRequest $validatorRequest)
    {
        $this->validatorRequest = $validatorRequest;
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
        $studentName = $this->validatorRequest->student->user->fullName;
        $validatorName = $this->validatorRequest->validator_name;
        $validatorEmail = $this->validatorRequest->validator_email;
        $requestID = $this->validatorRequest->id;

        return (new MailMessage())
                    ->subject(sprintf('%s has asked you as referee his profile in Talented europe', $studentName))
                    ->line(sprintf('Hello %s', $validatorName))
                    ->line(sprintf('%s has invited you as referee on Talented Europe.', $validatorName))
                    ->line('We need you to resend this email to the institution you work for so they can register using the following link')
                    ->line('Please note that if they register using clicking the following button you will be invited automatically into their institution')
                    ->action('Create Institution account', route('invite-school').'?req_id='.urlencode($requestID))
                    ->line('Thank you for using our application!');
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
