<section class="card_my_profile">
    <div class="user_profile">
        <div class="user_picture">
            <img src="./../../assets/images/user-picture.png" alt="photo profil">
        </div>
        <div class="user_counter">
            <div class="counter_friends">
                <p>Ami(e)s</p>
                <p>0</p>
            </div>
            <div class="counter_followers">
                <p>Suivi(e)s</p>
                <p>0</p>
            </div>
        </div>
    </div>
    <div class="user_info">
        <h1><?php echo $_SESSION["search"]["first_name"] . " " . $_SESSION["search"]["last_name"] ?></h1>
        <pre>
            <?php echo var_export($_SESSION["search"]); ?>
        </pre>
        <?php if ($account) { ?>
            <button id="button_open_window_post">Ajouter une publication</button>
        <?php } ?>
    </div>
</section>