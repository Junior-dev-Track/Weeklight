<?php

use models\TokenManager;

$token = $_COOKIE["token"] ?? null;
$account = null;

if ($token) {
    $tokenManager = new TokenManager;
    $account = $tokenManager->matchToken($token);
} ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../assets/styles/import.css" />
    <title>Profil | Weeklight</title>
</head>

<body>
    <?php
    if ($account) {
        require_once __DIR__ . "/components/navbar_menu.php";
    } else {
        require_once __DIR__ . "/components/navbar_login.php";
    }

    if (empty($_SESSION["search"])) { ?>
        <main>
            <h1>Aucun utilisateur trouvé 😕</h1>
        </main>
    <?php
    } else {
        require_once __DIR__ . "/components/component_my_profile.php";
    } ?>

    <script defer src="./../assets/scripts/navbar_menu.js"></script>
    <script defer src="./../assets/scripts/button_open_window_post.js"></script>
</body>

</html>