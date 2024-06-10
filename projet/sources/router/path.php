<?php

use controllers\Page;

$page = new Page();

try {
    $url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");

    match ($url) {
        ""          => $page->home(),
        "subscribe" => $page->subscribe(),
        "login"     => $page->login(),
        "logout"    => $page->logout(),
        default     => $page->error_404(),
    };
} catch (Exception $error) {
    $page->error_500($error->getMessage());
}
