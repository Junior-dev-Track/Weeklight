<?php

use models\TokenManager;
use controllers\SessionManager;

session_start();

$firstName = $_SESSION["account"]["first_name"];
$lastName = $_SESSION["account"]["last_name"];
$nickName = $_SESSION["account"]["nick_name"];

$token = isset($_COOKIE["token"]) ? $_COOKIE["token"] : null;
$account = null;

if ($token) {
    $tokenManager = new TokenManager;
    $account = $tokenManager->matchToken($token);
}

if (!$account) {
    $session = new SessionManager();
    $session->logout();
} else { ?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./../../assets/styles/import.css" />
        <title>Ami(e)s | Weeklight</title>
    </head>

    <body>
        <?php require_once __DIR__ . "/components/navbar_menu.php"; ?>

        <main>
            <h2>Page Ami(e)s</h2>
        </main>

        <script defer src="./../assets/scripts/header.js"></script>
    </body>

    </html>
<?php } ?>