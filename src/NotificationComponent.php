<?php


namespace MiniAndMore\NotificationComponent;


use App\User;
use MiniAndMore\NotificationComponent\Contracts\Notification;
use MiniAndMore\NotificationComponent\Notifications\DatabaseNotification;

/**
 * Class NotificationComp
 * @package MiniAndMore\NotificationComponent
 */
class NotificationComponent implements Notification
{
    /**
     * @var $from
     */
    protected $from;

    /**
     * @var $from_name
     */
    protected $from_name;

    /**
     * @var $to
     */

    protected $to;
    /**
     * @var $to_name
     */
    protected $to_name;

    /**
     * @var $subject
     */
    protected $subject;

    /**
     * @var $cc
     */
    protected $cc = [];

    /**
     * @var $bcc
     */
    protected $bcc = [];

    /**
     * @var $with
     */
    protected $with = [];
    /**
     * @var $markdown
     */
    protected $markdown = '';

    public function __construct()
    {
        //miniandmore
        $this->from = 'noreply@zoomaal.com';
        $this->from_name = 'Zoomaal Portal';
        $this->subject = 'Zoomaal';
        $this->markdown = config('mini-and-more.markdown');
    }

    public static function make()
    {
        return new self();
    }

    public function send($content = null)
    {
        $params = [
            'from' => $this->from,
            'from_name' => $this->from_name,
            'subject' => $this->subject,
            'markdown' => $this->markdown,
            'cc' => $this->cc,
            'bcc' => $this->bcc,
            'content' => $content,
            'via' => $this->with,
        ];
        \Notification::send(User::where('email', $this->to)->first(), new DatabaseNotification($params));
    }

    public function from($email, $name = '')
    {
        $this->from = $email;
        $this->name = $name;
        return $this;
    }

    public function subject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    public function markdown($markdown)
    {
        $this->markdown = $markdown;
        return $this;
    }

    public function to($to, $name = '')
    {
        $this->to = $to;
        $this->to_name = $name;
        return $this;
    }

    public function cc($cc = [])
    {
        $this->cc = $cc;
        return $this;
    }

    public function bcc($bcc = [])
    {
        $this->bcc = $bcc;
        return $this;
    }

    public function with($with = [])
    {
        $this->with = $with;
        return $this;
    }
}