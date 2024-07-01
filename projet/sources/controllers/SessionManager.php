<?php

namespace controllers;

use models\RegisterNewUser;
use models\LoginUser;
use models\NewPasswordUser;

class SessionManager
{
    public function register()
    {
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $birth = $_POST['birth'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $registerNewUser = new RegisterNewUser();
        return $registerNewUser->register($firstName, $lastName, $birth, $gender, $email, $password);
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
