<?php

namespace Ryodevz\CiAuth\Illuminate\Support\Foundation;

use Ryodevz\CiAuth\Illuminate\Support\Auth;

class Routes extends Auth
{
    protected static $routes;   

    public static function login()
    {
        static::$routes->get('/login', 'Ryodevz\CiAuth\Illuminate\Support\Foundation\Http\Controllers\LoginController::index');
        static::$routes->post('/login', 'Ryodevz\CiAuth\Illuminate\Support\Foundation\Http\Controllers\LoginController::login');

        return new static;
    }

    public static function registration()
    {
        static::$routes->get('/register', 'Ryodevz\CiAuth\Illuminate\Support\Foundation\Http\Controllers\RegisterController::index');

        return new static;
    }

    public static function make()
    {
        return static::$routes;
    }

    protected static function registerAuth()
    {
        static::$username = config('CiAuth')->username;
        static::$password = config('CiAuth')->password;
        static::syncUserFromDatabase();

        return new static;
    }
}