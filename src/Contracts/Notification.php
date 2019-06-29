<?php


namespace MiniAndMore\NotificationComponent\Contracts;


/**
 * Interface Notification
 * @package MiniAndMore\NotificationComponent\Contracts
 */
interface Notification
{
    public function cc($cc = []);

    public function bcc($bcc = []);

    public function from($email, $name);

    public function to($email, $name = '');

    public function subject($subject);

    public function markdown($markdown);

    public function with($sendMethods = []);


    public function send();

}