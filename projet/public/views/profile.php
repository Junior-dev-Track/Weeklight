<?php
session_start();

$firstName = $_SESSION["user"]["first_name"];
$lastName = $_SESSION["user"]["last_name"];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil | Weeklight</title>
    <link rel="stylesheet" href="./../styles/import.css" />
    <script defer src="./../assets/header.js"></script>
</head>

<body>
    <?php include_once __DIR__ . "/components/header.php" ?>

    <h2>Bienvenue <?php echo $firstName ?> <?php echo $lastName ?> !</h2>

    <form action="/" method="POST">
        <button type="submit" name="logout">Déconnecter</button>
    </form>
</body>

</html>