<?php
session_start();

$first_name = $_SESSION["user"]["first_name"];
$last_name = $_SESSION["user"]["last_name"];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil | Weeklight</title>
    <link rel="stylesheet" href="./../styles/import.css" />
</head>

<body>
    <?php include_once __DIR__ . "/components/header.php" ?>

    <h2>Bienvenue <?php echo $first_name ?> <?php echo $last_name ?> !</h2>

    <form action="/" method="post">
        <button type="submit" name="logout">Déconnecter</button>
    </form>
</body>

</html>