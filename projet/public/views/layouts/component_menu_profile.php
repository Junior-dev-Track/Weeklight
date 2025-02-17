<div class="component_menu_profile">
    <?php if ($account) { ?>
        <button id="button_open_window_post">
            <img src="/projet/public/assets/svgs/ghost-smile.svg" alt="bouton capturer un souvenir">
        </button>

        <?php require __DIR__ . "/container_show.php"; ?>
    <?php } ?>

    <a href="/settings">
        <img src="/projet/public/assets/svgs/settings.svg" alt="lien paramètre">
    </a>

    <form action="/" method="POST">
        <button type="submit" name="logout">
            <img src="/projet/public/assets/svgs/hand.svg" alt="bouton pour se déconnecter">
        </button>
    </form>
</div>