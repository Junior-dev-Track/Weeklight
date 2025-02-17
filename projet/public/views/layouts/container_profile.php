<section class="container_profile">
    <div class="card_profile">
        <div class="user_profile">
            <h1>Souvenirs de <?php echo $_SESSION["search"]["first_name"] . " " . $_SESSION["search"]["last_name"] ?></h1>
            <?php if ($account) { ?>
                <?php require __DIR__ . "/component_menu_profile.php"; ?>
            <?php } ?>
        </div>
        <div class="user_counter">
            <div class="counter_followers">
                <p class="title">Suivi(e)s</p>
                <p>0</p>
            </div>
            <div class="counter_friends">
                <p class="title">Ami(e)s</p>
                <p>0</p>
            </div>
            <div class="counter_memory">
                <p class="title">Highlights</p>
                <p>0</p>
            </div>
        </div>
    </div>

    <div class="card_timeline"></div>

    <section class="card_user">
        <div class="user_bio">
            <img src="/projet/public/assets/images/profile_ghost.png" alt="photo profil">
            <span></span>
            <div>
                <h2>Bio</h2>
                <pre><?php echo var_export($_SESSION["search"]); ?></pre>
            </div>
        </div>
        <div class="best_post">
        </div>
    </section>
</section>