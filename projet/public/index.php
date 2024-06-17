<?php

use router\Root;

try {
    require_once __DIR__ . "/../vendor/autoload.php";

    $router = new Root();
    $router->path();
} catch (Exception) {
    header(__DIR__ . "/views/500.php");
    exit();
}
