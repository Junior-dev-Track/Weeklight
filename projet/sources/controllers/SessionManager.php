<?php

namespace controllers;

use models\RegisterNewUser;
use models\LoginUser;
use models\NewPasswordUser;

class SessionManager
{
    public function register()
    {
        $registerNewUser = new RegisterNewUser();
        return $registerNewUser->register($_POST['first_name'], $_POST['last_name'], $_POST['birth'], $_POST['gender'], $_POST['email'], $_POST['password']);
    }

    public function login()
    {
        $user = new LoginUser();
        return $user->authenticate($_POST['email'], $_POST['password']);
    }

    public function forgotPassword($email)
    {
        $newPasswordUser = new NewPasswordUser();
        return $newPasswordUser->sendMail($email);
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        if (isset($_COOKIE['token'])) {
            setcookie('token', '', time(), '/');
        }

        header('Location: /');
        exit;
    }
}
