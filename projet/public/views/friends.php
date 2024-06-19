<?php
session_start();

$firstName = $_SESSION["account"]["first_name"];
$lastName = $_SESSION["account"]["last_name"];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ami(e)s | Weeklight</title>
    <link rel="stylesheet" href="./../styles/import.css" />
    <script defer src="./../assets/header.js"></script>
</head>

<body>
    <?php require_once __DIR__ . "/components/header.php" ?>

    <main>
        <h2>Page Ami(e)s</h2>
    </main>
</body>

</html>