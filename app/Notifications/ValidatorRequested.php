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
                    ->subject(sprintf(trans('email.validatorRequested_subject_1'), $studentName))
                    ->line(sprintf(trans('email.validatorRequested_line_2'), $validatorName))
                    ->line(sprintf(trans('email.validatorRequested_line_3'), $validatorName))
                    ->line(trans('email.validatorRequested_line_4'))
                    ->line(trans('email.validatorRequested_line_5'))
                    ->action(trans('email.validatorRequested_action_6'), route('register').'?req_id='.urlencode($requestID))
                    ->line(trans('email.validatorRequested_line_7'));
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
