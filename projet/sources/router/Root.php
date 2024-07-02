<?php

namespace router;

use controllers\ViewController;

class Root
{
    public function __construct()
    {
        $view = new ViewController();

        $url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");

        if (strpos($url, ".php") !== false) {
            return $view->pageError404();
        }

        switch ($url) {
            case "":
                $view->pageHome();
                break;

            case "forgot-password":
                if (isset($_GET['new_password_user'])) {
                    $email = urldecode($_GET['new_password_user']);
                    $view->pageForgotPassword($email);
                } else {
                    $view->pageForgotPassword(null);
                }
                break;

            case "friends":
                $view->pageFriends();
                break;

            case "messages":
                $view->pageMessages();
                break;

            default:
                $view->pageProfile($url);
                break;
        }
    }
}
