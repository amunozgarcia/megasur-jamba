<?php namespace Jamba\Flash\Facades;


use Illuminate\Support\Facades\Facade;

class Message extends Facade
{
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Jamba\Flash\Facade\Message';
    }
}