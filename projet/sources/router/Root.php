<?php

namespace router;

use controllers\View;
use Exception;

class Root
{
    public function path()
    {
        $page = new View();

        try {
            $url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");

            match ($url) {
                ""       => $page->home(),
                "forgot-password" => $page->forgot_password(),
                default  => $page->error_404(),
            };
        } catch (Exception $error) {
            $page->error_500($error->getMessage());
        }
    }
}
