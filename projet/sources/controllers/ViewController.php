<?php

namespace controllers;

use models\GetUser;
use Exception;

class ViewController
{
    public function home()
    {
        include __DIR__ . "/../../public/views/home.php";
    }

    public function forgotPassword()
    {
        include __DIR__ . "/../../public/views/forgot-password.php";
    }

    public function friends()
    {
        include __DIR__ . "/../../public/views/friends.php";
    }

    public function messages()
    {
        include __DIR__ . "/../../public/views/messages.php";
    }

    public function profile($param)
    {
        $getUser = new GetUser();
        $search = $getUser->searchUser($param);
        session_start();
        if ($search) {
            $_SESSION["search"] = $search;
        } else {
            $_SESSION["search"] = null;
        }
        include __DIR__ . "/../../public/views/profile.php";
    }

    public function error404(): void
    {
        include __DIR__ . "/../../public/views/404.php";
    }

    public function error500(): void
    {
        include __DIR__ . "/../../public/views/500.php";
    }
}
