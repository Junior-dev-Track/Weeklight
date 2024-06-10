<?php require_once "includes/header.php" ?>

<main>
    <h1>Page Inscription</h1>

    <form method="POST" action="/">
        <label for="first_name">Prénom :</label>
        <input type="text" id="first_name" name="first_name" required><br>

        <label for="last_name">Nom :</label>
        <input type="text" id="last_name" name="last_name" required><br>

        <label for="nick_name">Pseudo :</label>
        <input type="text" id="nick_name" name="nick_name" required><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">S'inscrire</button>
    </form>
</main>

<?php require_once "includes/footer.php"; ?>