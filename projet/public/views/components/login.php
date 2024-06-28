<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./../../assets/styles/import.css" />
  <title>Weeklight - Connexion ou Inscription</title>
</head>

<body>
  <main class="component_login">
    <div class="container_login">
      <section class="about">
        <h1 class="title logo">-- Weeklight --</h1>
        <p class="text">
          Partagez, aimez et rappelez-vous<br /><strong>des moments qui comptent vraiment pour vous</strong>
        </p>
      </section>
      <section class="connexion">
        <div class="container_connexion">
          <form method="POST">
            <input type="email" name="email" placeholder="Email" required /><br />
            <input type="password" name="password" placeholder="Mot de passe" required /><br />
            <button type="submit" id="button_connexion_account">Se connecter</button>
          </form>
          <a href="forgot-password">Mot de passe oublié ?</a>
          <hr />
          <button id="button_view_register">Créer un compte</button>
        </div>
      </section>
    </div>

    <span id="filter_container"></span>

    <section id="container_register">
      <div class="card-title">
        <button id="button_close_register">❌</button>
        <h2 class="title">S’inscrire</h2>
        <p class="text">C'est rapide et simple.</p>
      </div>
      <hr />
      <form action="/" method="POST">
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
  </main>

  <script defer src="./../../assets/scripts/button-register.js"></script>
</body>

</html>