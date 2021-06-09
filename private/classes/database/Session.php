<?php

namespace Database;

class Session
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function setSessionData($session_name, $session_value)
    {
        $_SESSION[$session_name] = $session_value;
    }

    public static function getSessionData($session_name)
    {
        if (self::checkSession($session_name)) {
            return $_SESSION[$session_name];
        } else {
            return false;
        }
    }

    public static function getFlashData($session_name)
    {
        if (self::checkSession($session_name)) {
            $v = $_SESSION[$session_name];
            unset($_SESSION[$session_name]);
            return $v;
        } else {
            return false;
        }
    }

    public static function checkSession($session_name)
    {
        if (isset($_SESSION[$session_name])) {
            return true;
        } else {
            return false;
        }
    }

    // Clear all session variables
    // and Destroy the session itself
    public static function clearSession()
    {
        session_unset();
        return session_destroy();
    }
}
$session = new Session(); // Start a new session
