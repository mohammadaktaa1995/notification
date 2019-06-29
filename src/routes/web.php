<?php

Route::group([
    'prefix' => 'notification-component',
    'namespace' => 'MiniAndMore\NotificationComponent\Http\Controllers',
], function () {
    \Route::view('/mail', 'mini-and-more::layouts.app');
});