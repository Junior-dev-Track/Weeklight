<?php

namespace controllers;

use controllers\Login;
use controllers\Subscribe;

class Session
{
    public function to_subscribe()
    {
        session_start();

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

    public function to_login()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $login = new Login();
            $result = $login->authenticate($email, $password);

            echo $result;
        }
    }
}
