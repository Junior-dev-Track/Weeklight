<?php

namespace controllers;

use controllers\Login;
use controllers\Subscribe;

class Session
{
    public function subscribe()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = $_POST["first_name"];
            $lastName = $_POST["last_name"];
            $nickName = $_POST["nick_name"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            $newUser = new Subscribe();
            $result = $newUser->register($firstName, $lastName, $nickName, $email, $password);

            echo $result;
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $login = new Login();
            $result = $login->authenticate($email, $password);

            echo $result;
        }
    }

    public function logout()
    {
        if (isset($_POST['logout'])) {
            session_unset();
            session_destroy();

            header('Location: http://localhost:3000/');

            exit();
        }
    }
}
