<?php

namespace router;

use controllers\View;
use Exception;

class Root
{
    public function path()
    {
        $view = new View();

        try {
            $url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");

            match ($url) {
                ""                => $view->home(),
                "forgot-password" => $view->forgot_password(),
                "friends"         => $view->friends(),
                "messages"        => $view->messages(),
                "profile"         => $view->profile(),

                default           => $view->error_404(),
            };
        } catch (Exception $error) {
            $view->error_500($error->getMessage());
        }
    }
}
