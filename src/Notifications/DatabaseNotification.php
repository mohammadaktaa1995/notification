<?php

namespace MiniAndMore\NotificationComponent\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;
use NotificationChannels\OneSignal\OneSignalWebButton;

class DatabaseNotification extends Notification
{

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return $this->data['via'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @return array
     */
    public function toDatabase()
    {

        return $this->data;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toMail()
    {
        return (new MailMessage())->from($this->data['from'], $this->data['from_name'])
            ->subject($this->data['subject'])
            ->cc($this->data['cc'])
            ->bcc($this->data['bcc'])
            ->markdown(
                $this->data['markdown'],
                [
                    'data' => $this->data['content'],
                ]
            );
    }

    public function toSlack()
    {
        return (new SlackMessage())
            ->from(config('app.name'))
            //this if i want to specify channel or we just use routeNotificationForSlack
//            ->to('#shabab-stooh')
            ->image('https://laravel.com/favicon.png')
            ->content('This Message From Zoomaal Portal');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
