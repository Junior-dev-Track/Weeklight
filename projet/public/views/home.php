<?php

use controllers\SessionManager;

session_start();
$session = new SessionManager();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $session->register();
} else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    $session->logout();
} else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
    $session->login();
} else if (isset($_SESSION["account"])) {
    require_once __DIR__ . "/components/home.php";
} else {
    require_once __DIR__ . "/components/login.php";
    if (isset($_SESSION['message'])) {
        echo '<span class="message">' . $_SESSION['message'] . '</span';
        unset($_SESSION['message']);
    }
}
