<?php

namespace router;

use controllers\ViewController;
use Exception;

class Root
{
    public function __construct()
    {
        $page = new ViewController();

        try {
            $url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");

            if (strpos($url, ".php") === true) {
                return $page->error404();
            }

            switch ($url) {
                case "":
                    $page->home();
                    break;

                case "forgot-password":
                    $page->forgotPassword();
                    break;

                case "friends":
                    $page->friends();
                    break;

                case "messages":
                    $page->messages();
                    break;

                default:
                    $page->profile($url);
                    break;
            }
        } catch (Exception $error) {
            $page->error500();
        }
    }
}
