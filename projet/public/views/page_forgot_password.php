<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../assets/styles/import.css" />
    <?php if (!isset($_GET['token'])) { ?>
        <title>Mot de passe oublié | Connexion</title>
    <?php } else { ?>
        <title>Réinitialiser mot de passe</title>
    <?php } ?>
</head>

<body>
    <?php
    if (!isset($_GET['token'])) {
        require_once __DIR__ . "/components/navbar_login.php";
        require_once __DIR__ . "/components/component_new_password.php";
    } else {
        require_once __DIR__ . "/components/component_reset_password.php";
    } ?>
</body>

</html>