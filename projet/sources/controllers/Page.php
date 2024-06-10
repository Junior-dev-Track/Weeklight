<?php

namespace controllers;

class Page
{
    public function home(): void
    {
        include __DIR__ . "/../views/home.php";
    }

    public function login(): void
    {
        include __DIR__ . "/../views/login.php";
    }

    public function logout(): void
    {
        include __DIR__ . "/../views/logout.php";
    }

    public function subscribe(): void
    {
        include __DIR__ . "/../views/subscribe.php";
    }

    public function error_404(): void
    {
        include __DIR__ . "/../views/404.php";
    }

    public function error_500($error)
    {
        include __DIR__ . "/../views/500.php";
        $error;
    }
}
