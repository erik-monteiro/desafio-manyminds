<?php

class Auth extends Model
{
    public static function authenticate($email)
    {
        $_SESSION['user'] = $email;
    }

    public static function loggedIn()
    {
        if (isset($_SESSION['user'])) {
            return true;
        }

        return false;
    }

    public static function user()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        return false;
    }

    public static function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
    }
}

?>