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
        //Añado mi propio fichero de routes
        if (!$this->app->routesAreCached()) {
            require __DIR__.'/../../app/routes.php';
        }

        //cargo la configuración WS
        $this->publishes(array(
            __DIR__ . '/../../config/ws.php' => config_path('ws.php'),
        ), 'config');

        //cargo sistema de traducciones
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang','megasur');

        //cargo las vistas
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'jamba');

        //$this->publishes([
        //    __DIR__ . '/../../resources/views' => base_path('resources/views/vendor')
        //]);

        $this->publishes([
            __DIR__.'/../../resources/assets' => public_path('vendor/megasur/jamba'),
        ], 'jamba');



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

        //Cargo la configuracion Model
        $this->mergeConfigFrom(__DIR__ . '/../../config/models.php', 'models');


        //cargo el Facade Ws
        $this->app->singleton('Jamba\Ws\Facade\Ws', function ($app) {
            return new Ws($app);
        });

        //cargo Middleware Ws (filtro por ip)
        $this->app->singleton('Jamba\Ws\Middleware\WsMiddleware', function ($app) {
            return new WsMiddleware();
        });

        //..........................................................................
        // MESSAGE
        //..........................................................................
        $this->app->bind(
            'Jamba\Flash\Contracts\SessionStoreInterface',
            'Jamba\Flash\LaravelSessionStore'
        );

        $this->app->bindShared('Jamba\Flash\Facade\Message', function () {
            return $this->app->make('Jamba\Flash\FlashNotifier');
        });
        //..........................................................................

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
        return ['Jamba\Ws\Facade\Ws','Jamba\Flash\Facade\Flash'];
    }
}