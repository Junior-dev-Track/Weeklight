<?php

namespace router;

use controllers\ViewController;

class Root
{
    public function __construct()
    {
        $page = new ViewController();

        $url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");

        if (strpos($url, ".php") !== false) {
            return $page->error404();
        }

        switch ($url) {
            case "":
                $page->home();
                break;

            case "forgot-password":
                if (isset($_GET['new_password_user'])) {
                    $email = urldecode($_GET['new_password_user']);
                    $page->forgotPassword($email);
                } else {
                    $page->forgotPassword(null);
                }
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
    }
}
