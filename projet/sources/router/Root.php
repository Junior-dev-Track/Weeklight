<?php

namespace router;

use controllers\ViewController;
use Exception;

class Root
{
    public function path()
    {
        $page = new ViewController();

        try {
            $url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");

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

                case strpos($url, "profile/") === 0:
                    $page->profile(substr($url, 8));
                    break;

                default:
                    $page->error404();
                    break;
            }
        } catch (Exception $e) {
            $page->error500();
        }
    }
}
