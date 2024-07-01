<?php

use models\TokenManager;
use controllers\SessionManager;

session_start();
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
        <title>Messages | Weeklight</title>
    </head>

    <body>
        <?php require_once __DIR__ . "/components/navbar_menu.php"; ?>

        <main>
            <h2>Page Messages</h2>
        </main>

        <script defer src="./../assets/scripts/navbar_menu.js"></script>
    </body>

    </html>

<?php } ?>