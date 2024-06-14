<?php

namespace router;

use controllers\Page;
use Exception;

class Router
{
    public function route()
    {
        $page = new Page();

        try {
            $url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");

            match ($url) {
                ""          => $page->login(),
                default     => $page->error_404(),
            };
        } catch (Exception $error) {
            $page->error_500($error->getMessage());
        }
    }
}
