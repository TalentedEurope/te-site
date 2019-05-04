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
        $subject = trans('notification.new_validation_subject');
        $body = trans('notification.new_validation_body');
        App::setLocale($this->oldLocale);

        return OneSignalMessage::create()
            ->subject($subject)
            ->body($body);
    }
}
