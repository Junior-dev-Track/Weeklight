<main class="component_reset_password">
    <section class="container_reset_password">
        <h1>Réinitialisez votre mot de passe</h1>
        <hr>
        <form action="/" method="POST">
            <input type="hidden" name="token" value="<?php echo ($_GET['token']); ?>">
            <div>
                <label for="password">Nouveau mot de passe :</label>
                <input type="password" id="password" name="new_password" required>
            </div>
            <div>
                <label for="confirm_password">Confirmer le mot de passe :</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <input type="submit" id="button_register_account" value="Réinitialiser">
        </form>
    </section>
</main>