<?php
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../sources/models/Database.php";
require_once __DIR__ . "/../sources/controllers/Page.php";
require_once __DIR__ . "/../sources/router/Router.php";

use router\Router;

try {
    $router = new Router();
    $router->route();
} catch (Exception) {
    header(__DIR__ . "/views/maintenance.php");
    exit();
}
