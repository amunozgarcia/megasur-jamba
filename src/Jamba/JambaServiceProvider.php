<?php namespace Jamba;


use Illuminate\Support\ServiceProvider;
use Jamba\Ws\Middleware\WsMiddleware;
use Jamba\Ws\Ws;

class JambaServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;



    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {

        //cargo la configuración WS
        $this->publishes(array(
            __DIR__ . '/../../config/ws.php' => config_path('ws.php'),
        ), 'config');

        //cargo sistema de traducciones
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang','megasur');

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //Cargo la configuracion WS
        $this->mergeConfigFrom(__DIR__ . '/../../config/ws.php', 'ws');

        //cargo el Facade Ws
        $this->app->singleton('Jamba\Ws\Facade\Ws', function ($app) {
            return new Ws($app);
        });

        //cargo Middleware Ws (filtro por ip)
        $this->app->singleton('Jamba\Ws\Middleware\WsMiddleware', function ($app) {
            return new WsMiddleware();
        });


        //pruebas
        //dd($this->app);
        //dd($this->app['config']);
        //dd($this->app['config']->get('ws.services'));
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['Jamba\Ws\Facade\Ws'];
    }
}