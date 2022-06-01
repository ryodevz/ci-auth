<?php

namespace Ryodevz\CiAuth\Illuminate\Support;

use App\Models\User;

class Auth
{
    protected static $sessionName = '___user___';

    protected static $username;
    
    protected static $password;

    protected static $user;

    public static function attemp(string $username, string $password)
    {
        $user = static::getUserFromDatabaseBy(static::$username, $username);

        if( password_verify($password, $user[static::$password]) ) {
            static::$user = $user;
            static::setUserSession(static::$user);

            return static::$user;
        }

        return false;
    }

    public static function user()
    {
        return static::$user;
    }

    protected static function setUserSession($user = null)
    {
        if($user) {
            return session()->set([static::$sessionName => (object) $user]);
        }

        return session()->set([static::$sessionName => null]);
    }

    protected static function model()
    {
        return new User;
    }

    protected static function getUserFromDatabaseBy(string $column, string $username)
    {
        return static::model()->where($column, $username)->first();
    }

    protected static function syncUserFromDatabase()
    {
        if( session()->get(static::$sessionName) ) {
            $userFromSession = session()->get(static::$sessionName);
            $userFromDatabase = static::getUserFromDatabaseBy('id', $userFromSession->id);

            if(isset($userFromDatabase) && $userFromSession->id === $userFromDatabase['id']) {
                static::$user = $userFromDatabase;
                static::setUserSession(static::$user);

                return new static;
            }
        }

        static::setUserSession(null);
        
        return new static;
    }
}