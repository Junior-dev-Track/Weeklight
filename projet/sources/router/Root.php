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

            // Check if the URL contains a .php file, which should not be the case
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
        } catch (Exception $error) {
            $page->error500();
        }
    }
}
