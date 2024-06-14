<?php

namespace controllers;

class View
{
    public function home(): void
    {
        include __DIR__ . "/../../public/views/home.php";
    }

    public function forgot_password(): void
    {
        include __DIR__ . "/../../public/views/forgot-password.php";
    }

    public function friends(): void
    {
        include __DIR__ . "/../../public/views/friends.php";
    }

    public function messages(): void
    {
        include __DIR__ . "/../../public/views/messages.php";
    }

    public function profile(): void
    {
        include __DIR__ . "/../../public/views/profile.php";
    }

    public function error_404(): void
    {
        include __DIR__ . "/../../public/views/404.php";
    }

    public function error_500($error)
    {
        include __DIR__ . "/../../public/views/500.php";
        $error;
    }
}
