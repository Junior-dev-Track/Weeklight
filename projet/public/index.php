<?php

use router\Root;

try {
    require_once __DIR__ . "/../vendor/autoload.php";
    require_once __DIR__ . "/../sources/models/Database.php";
    require_once __DIR__ . "/../sources/controllers/View.php";
    require_once __DIR__ . "/../sources/router/Root.php";

    $router = new Root();
    $router->path();
} catch (Exception) {
    header(__DIR__ . "/views/maintenance.php");
    exit();
}
