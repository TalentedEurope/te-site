<?php

namespace App\Notifications;

use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;
use NotificationChannels\OneSignal\OneSignalWebButton;
use Illuminate\Notifications\Notification;
use App\Models\User;
use App;

class StudentVisited extends Notification
{
    protected $student;
    protected $company;
    protected $oldLocale;

    public function __construct(User $student, User $company)
    {
        $this->oldLocale = App::getLocale();
        $this->student = $student;
        $this->company = $company;
    }

    public function via($notifiable)
    {
        return [OneSignalChannel::class];
    }

    public function toOneSignal($notifiable)
    {
        \App\Http\Middleware\Language::setMailLang($this->student);
        $subject = sprintf(trans('notification.company_visited_student_subject'), trans('reg-profile.'.$this->company->userable->activity));
        $body = trans('notification.company_visited_student_body');
        App::setLocale($this->oldLocale);

        return OneSignalMessage::create()
            ->subject($subject)
            ->body($body);
    }
}
