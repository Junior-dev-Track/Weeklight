<?php

use controllers\Session;

// $navigation = new Session();
// $navigation->to_login();

require_once "includes/header.php" ?>

<main>
    <?php if (!isset($_SESSION["user"])) : ?>
        <h1>Login :</h1>
        <form method="POST" action="login">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required><br>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required><br>

            <button type="submit">Se connecter</button>
        </form>
    <?php else : ?>
        <h1>Profil :</h1>
        <h2>Bienvenue <?php echo $_SESSION["user"]["first_name"] ?> !</h2>

        <form action="/" method="post">
            <button type="submit">Se deconnecter</button>
        </form>
    <?php endif ?>
</main>

<?php require_once "includes/footer.php"; ?>