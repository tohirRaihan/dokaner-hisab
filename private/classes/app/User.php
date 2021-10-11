<?php

namespace App;

use Database\Database;
use Database\Session;

class User extends Database
{
    public static function login($email, $password)
    {
        $sql = "SELECT * FROM `users` WHERE `email` = ? AND `password` = ? LIMIT 1";
        return parent::getRow($sql, [$email, $password]);
    }

    public static function logout()
    {
        Session::clearSession();
        redirect_to(url_for('dashboard/login.php'));
        die;
    }

    public static function signup($name, $email, $password)
    {
        $sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES (?,?,?)";
        return parent::insertRow($sql, [$name, $email, $password]);
    }

    // check if a user exists with an email
    public static function checkUser($email)
    {
        $sql = "SELECT * FROM `users` WHERE `email` = ? LIMIT 1";
        return parent::getRow($sql, [$email]);
    }


    public static function auth()
    {
        if (Session::getSessionData('user_logged')) {
            return true;
        } else {
            redirect_to(url_for('dashboard/login.php'));
            die;
        }
    }
}
// Create a new user to instantiate a Connection
$user = new User;
