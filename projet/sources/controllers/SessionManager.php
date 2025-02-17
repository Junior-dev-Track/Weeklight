<?php

namespace controllers;

use models\Register;
use models\Login;
use models\Password;

class SessionManager
{
    public function registerUser()
    {
        $registerNewUser = new Register;
        return $registerNewUser->register($_POST['first_name'], $_POST['last_name'], $_POST['birth'], $_POST['gender'], $_POST['email'], $_POST['password']);
    }

    public function loginUser()
    {
        $LoginUser = new Login;
        return $LoginUser->authenticate($_POST['email'], $_POST['password']);
    }

    public function resetPassword($email)
    {
        $resetPassword = new Password;
        return $resetPassword->sendAnEmail($email);
    }

    public function logoutUser()
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
