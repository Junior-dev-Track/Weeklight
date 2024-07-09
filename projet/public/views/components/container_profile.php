<section class="container">
    <div class="user_profile">
        <h1>Souvenirs de <?php echo $_SESSION["search"]["first_name"] . " " . $_SESSION["search"]["last_name"] ?></h1>

        <div class="card_picture">
            <img src="./../../assets/images/marc.jpg" alt="photo profil">
        </div>

        <div class="user_counter">
            <div class="counter_followers">
                <p>0</p>
                <p>souvenirs</p>
            </div>
            <div class="counter_friends">
                <p>0</p>
                <p>followers</p>
            </div>
            <div class="counter_followers">
                <p>0</p>
                <p>suivi(e)s</p>
            </div>
        </div>
    </div>

    <div class="card_timeline"></div>

    <section class="container_profile">
        <div class="card_profile">
            <pre class="user_bio">
                <?php echo var_export($_SESSION["search"]); ?>
            </pre>
        </div>

        <?php if ($account) { ?>
            <div class="card_menu">
                <button id="button_settings">Paramètres</button>
                <button id="button_open_window_post">Capturer un souvenir</button>
            </div>
        <?php } ?>
    </section>
</section>

<?php require_once __DIR__ . "/container_show.php"; ?>