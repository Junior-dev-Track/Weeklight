<?php

use controllers\Session;

session_start();

$connection = new Session();
$connection->logout();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
    $connection->login();
}

if (!isset($_SESSION["user"])) {
    require_once __DIR__ . "/components/login.php";
} else {
    require_once __DIR__ . "/components/home.php";
}
