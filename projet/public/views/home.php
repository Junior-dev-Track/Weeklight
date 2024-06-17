<?php

use controllers\Session;

session_start();

$session = new Session();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    $session->logout();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
    $session->login();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $session->register();
}

if (isset($_SESSION["user"])) {
    require_once __DIR__ . "/components/home.php";
} else {
    require_once __DIR__ . "/components/login.php";
}
