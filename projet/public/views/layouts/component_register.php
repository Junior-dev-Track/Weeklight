<?php require __DIR__ . "/component_filter.php"; ?>

<section id="container_register">
    <div class="card-title">
        <button id="button_close_window">❌</button>
        <h2 class="title">S’inscrire</h2>
        <p class="text">C'est rapide et simple.</p>
    </div>
    <hr />
    <form method="POST">
        <div class="card_name">
            <input type="text" name="first_name" placeholder="Prénom" required />
            <input type="text" name="last_name" placeholder="Nom" required />
        </div>
        <div class="tag_birth">
            <label for="birth">Date de naissance:</label>
            <input type="date" id="birth" name="birth" />
        </div>
        <div class="card_gender">
            <p class="question_gender">Genre:</p>
            <div class="container_tag_gender">
                <div class="tag_gender">
                    <label for="gender_woman">Femme</label>
                    <input type="radio" id="gender_woman" name="gender" value="woman" />
                </div>
                <div class="tag_gender">
                    <label for="gender_man">Homme</label>
                    <input type="radio" id="gender_man" name="gender" value="man" />
                </div>
            </div>
        </div>
        <input type="email" name="email" placeholder="Email" />
        <input type="password" name="password" placeholder="Mot de passe" />
        <p class="general_condition">
            En cliquant sur "s’inscrire", vous acceptez nos
            <a href="/" target=" _blank">conditions générales</a>.
        </p>
        <p class="general_condition">
            Découvrez comment nous recueillons, utilisons et partageons vos
            données en lisant notre
            <a href="/" target="_blank">politique de confidentialité</a> et
            comment nous utilisons les cookies et autres technologies similaires
            en consultant notre <a href="/" target="_blank">politique d’utilisation des cookies</a>.
        </p>
        <p class="general_condition">
            Vous recevrez peut-être des notifications par texto de notre part et
            vous pouvez à tout moment vous désabonner.
        </p>

        <button type="submit" id="button_register_account" name="register">S'inscrire</button>
    </form>
</section>