<?php

use controllers\Session;

$connection = new Session();
$connection->login();

if (isset($_SESSION["user"])) {
    require_once __DIR__ . "/components/home.php";
} else {
    require_once __DIR__ . "/components/login.php";
}
