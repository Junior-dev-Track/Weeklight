<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scaleble=no">
    <?php if (!isset($_GET['token'])) { ?>
        <title>Mot de passe oublié | Connexion</title>
    <?php } else { ?>
        <title>Réinitialiser mot de passe</title>
    <?php } ?>
    <link rel="stylesheet" href="/projet/public/assets/styles/import.css" />
</head>

<body>
    <?php
    if (!isset($_GET['token'])) {
        require __DIR__ . "/layouts/component_navbar_login.php";
        require __DIR__ . "/layouts/component_new_password.php";
    } else {
        require __DIR__ . "/layouts/component_reset_password.php";
    } ?>
</body>

</html>