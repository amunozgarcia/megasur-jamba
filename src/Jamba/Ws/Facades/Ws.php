<?php
namespace Jamba\Ws\Facades;

use Illuminate\Support\Facades\Facade;

class Ws extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'Jamba/Ws';
    }
}