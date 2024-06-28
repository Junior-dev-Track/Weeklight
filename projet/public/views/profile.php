<?php

use models\TokenManager;
use controllers\SessionManager;

$token = $_COOKIE["token"] ?? null;
$account = null;

if ($token) {
    $tokenManager = new TokenManager;
    $account = $tokenManager->matchToken($token);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $session = new SessionManager();
        $session->login();
    }
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
    if (!$account) {
        require_once __DIR__ . "/components/navbar_login.php";
    } else {
        require_once __DIR__ . "/components/navbar_menu.php";
    }

    if (empty($_SESSION["search"])) { ?>
        <main>
            <h1>Aucun utilisateur trouvé 😕</h1>
        </main>
    <?php
    } else { ?>
        <main>
            <h1>Profil <?php echo ($_SESSION["search"]["first_name"]); ?></h1>

            <pre>
                <?php echo (var_export($_SESSION["search"], true)); ?>
            </pre>
        </main>
    <?php
    } ?>

    <script defer src="./../assets/scripts/header.js"></script>
</body>

</html>