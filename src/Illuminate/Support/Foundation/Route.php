<?php

namespace Ryodevz\CiAuth\Illuminate\Support\Foundation;

class Route extends Routes
{
    protected static $routes;   

    public static function registerRoutesFeature($routes)
    {
        static::registerAuth();
        static::$routes = $routes;

        return new static;
    }
}