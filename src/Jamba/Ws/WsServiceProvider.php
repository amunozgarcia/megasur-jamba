<?php namespace Jamba\Ws;


use Illuminate\Support\ServiceProvider;

class WsServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Jamba\Ws\Facades\Ws', function ($app) {
            return new WsConn();
        });

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