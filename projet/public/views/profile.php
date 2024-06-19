<?php

$firstName = $_SESSION["account"]["first_name"];
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
    <?php require_once __DIR__ . "/components/header.php"; ?>

    <h1>Profil de l'utilisateur</h1>
    <?php if (!isset($_SESSION["search"])) { ?>
        <p>Aucun utilisateur trouvé.</p>
    <?php } else { ?>
        <?php echo var_dump($_SESSION["search"]) ?>;

        <p>Nom: <?php echo $_SESSION["search"]['first_name']; ?></p>
        <p>Email: <?php echo $_SESSION["search"]['email']; ?></p>
    <?php } ?>
</body>

</html>