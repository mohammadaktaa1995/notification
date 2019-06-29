<?php

namespace MiniAndMore\NotificationComponent\Facades;

use Illuminate\Support\Facades\Facade;

class NotificationComponentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'NotificationComponent';
    }
}