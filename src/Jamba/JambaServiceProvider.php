<?php namespace Jamba;


use Illuminate\Support\ServiceProvider;
use Jamba\Ws\WsConn;

class JambaServiceProvider extends ServiceProvider
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
        $this->app->singleton('Jamba/Ws', function ($app) {
            return new WsConn($app);
        });

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['Jamba'];
    }
}