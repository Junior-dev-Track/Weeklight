<main class="component_new_password">
    <section class="container_new_password">
        <h1>Trouvez votre compte</h1>
        <hr>
        <form action="/forgot-password" method="GET">
            <label for="email">Veuillez introduire votre boîte mail pour rechercher votre compte.</label>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <div>
                <a href="/" class="button_cancel">Annuler</a>
                <input type="submit" class="button_forgot_password" value="Envoyer">
            </div>
        </form>
    </section>
</main>