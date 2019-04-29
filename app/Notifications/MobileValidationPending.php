<?php

namespace App\Notifications;

use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;
use NotificationChannels\OneSignal\OneSignalWebButton;
use Illuminate\Notifications\Notification;
use App\Models\User;
use App;

class MobileValidationPending extends Notification
{
    protected $referee;
    protected $oldLocale;

    public function __construct(User $referee)
    {
        $this->oldLocale = App::getLocale();
        $this->referee = $referee;
    }

    public function via($notifiable)
    {
        return [OneSignalChannel::class];
    }

    public function toOneSignal($notifiable)
    {
        \App\Http\Middleware\Language::setMailLang($this->referee);
        $subject = "Funciona???"; // trans('notification.student_alerted_company_subject');
        $body = "Dime por slack si te ha llegado xfa"; //sprintf(trans('notification.student_alerted_company_body'), $this->student->fullName);
        App::setLocale($this->oldLocale);
        /*
        return OneSignalMessage::create()
            ->subject($subject)
            ->body($body);
        */
    }
}
