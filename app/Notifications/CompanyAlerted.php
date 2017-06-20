<?php

namespace App\Notifications;

use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;
use NotificationChannels\OneSignal\OneSignalWebButton;
use Illuminate\Notifications\Notification;
use App\Models\User;
use App;

class CompanyAlerted extends Notification
{
    protected $student;
    protected $company;
    protected $oldLocale;

    public function __construct(User $company, User $student)
    {
        $this->oldLocale = App::getLocale();
        $this->company = $company;
        $this->student = $student;
    }

    public function via($notifiable)
    {
        return [OneSignalChannel::class];
    }

    public function toOneSignal($notifiable)
    {
        \App\Http\Middleware\Language::setMailLang($this->student);
        $subject = trans('notification.student_alerted_company_subject');
        $body = sprintf(trans('notification.student_alerted_company_body'), $this->student->fullName);
        App::setLocale($this->oldLocale);

        return OneSignalMessage::create()
            ->subject($subject)
            ->body($body);
    }
}
