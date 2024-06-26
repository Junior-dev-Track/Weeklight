<?php

use controllers\SessionManager;
use models\TokenManager;

session_start();
$session = new SessionManager;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch (true) {
        case isset($_POST['register']):
            $session->register();
            break;
        case isset($_POST['logout']):
            $session->logout();
            break;
        case isset($_POST['email']) && isset($_POST['password']):
            $session->login();
            break;
    }
}

if (isset($_SESSION["account"])) {
    $token = $_COOKIE["token"] ?? null;

    if ($token) {
        $tokenManager = new TokenManager();
        $account = $tokenManager->matchToken($token);

        if ($account) {
            require_once __DIR__ . "/components/home.php";
        } else {
            $session->logout();
        }
    } else {
        $session->logout();
    }
} else {
    require_once __DIR__ . "/components/login.php";

    if (isset($_SESSION['message'])) {
        echo '<span class="message">' . $_SESSION['message'] . '</span>';
        unset($_SESSION['message']);
    }
}
