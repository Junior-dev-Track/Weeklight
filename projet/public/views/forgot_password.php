<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../assets/styles/import.css" />
    <?php if (!isset($_GET['token'])) { ?>
        <title>Weeklight - Mot de passe oublié</title>
    <?php } else { ?>
        <title>Weeklight - Réinitialiser mon mot de passe</title>
    <?php } ?>
</head>

<body>
    <?php if (!isset($_GET['token'])) { ?>
        <?php require_once __DIR__ . "/components/navbar_login.php" ?>

        <main>
            <h1>Trouvez votre compte</h1>
            <section>
                <form action="/" method="GET">
                    <label for="email">Veuillez introduire votre boite e-mail :</label>
                    <input type="email" id="email" name="new_password_user">
                    <a href="/">Annuler</a>
                    <input type="submit" value="Envoyer">
                </form>
            </section>
        </main>
    <?php } else { ?>
        <main>
            <h1>Réinitialisez votre mot de passe</h1>
            <section>
                <form action="/" method="POST">
                    <input type="hidden" name="token" value="<?php echo ($_GET['token']); ?>">
                    <label for="password">Nouveau mot de passe :</label>
                    <input type="password" id="password" name="new_password" required>
                    <label for="confirm_password">Confirmer le mot de passe :</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                    <input type="submit" value="Réinitialiser">
                </form>
            </section>
        </main>
    <?php } ?>
</body>

</html>