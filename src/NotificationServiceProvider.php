<?php


namespace MiniAndMore\NotificationComponent;


use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{

    public function boot(Router $router)
    {
        // register views
        $this->loadViewsFrom(__DIR__.'/resources/views', 'mini-and-more');

        // publish migrations
        $this->publishes([
            __DIR__.'/database/migrations/' => database_path('migrations'),
        ], 'migrations');

        // publish config
        $this->publishes([
            __DIR__.'/Config/config.php' => config_path('mini-and-more.php'),
        ], 'config');

        // publish styles
        $this->publishes([
            __DIR__.'/resources/assets' => public_path('vendor/miniandmore'),
        ], 'public');

        // register routes
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

    }

    public function register()
    {
        \App::bind('notificationcomponent', NotificationComponent::class);
        \App::bind('component', Component::class);

        $config = __DIR__.'/Config/config.php';
        $this->mergeConfigFrom($config, 'mini-and-more');
    }

    protected function registerController()
    {
        // register our controller
        $this->app->make('MiniAndMore\NotificationComponent\Http\Controllers\NotificationController');
    }


}