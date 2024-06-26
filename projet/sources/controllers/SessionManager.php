<?php

namespace controllers;

use models\RegisterNewUser;
use models\LoginUser;

class SessionManager
{
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];
            $birth = $_POST['birth'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new RegisterNewUser();

            $result = $user->register($firstName, $lastName, $birth, $gender, $email, $password);
            echo $result;
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new LoginUser();

            $result = $user->authenticate($email, $password);
            echo $result;
        }
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
        exit();
    }
}
