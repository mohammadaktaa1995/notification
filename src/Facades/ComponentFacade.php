<?php

namespace MiniAndMore\NotificationComponent\Facades;

use Illuminate\Support\Facades\Facade;

class ComponentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Component';
    }
}