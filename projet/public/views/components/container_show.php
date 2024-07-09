<span id="filter_container"></span>

<section id="container_show">
    <div class="card-title">
        <h2 class="title">Publier un nouveau souvenir</h2>
        <button id="button_close_window">❌</button>
    </div>
    <hr>
    <form action="/<?php echo $_SESSION["account"]["nick_name"] ?>" method="POST">
        <textarea name="post_content" placeholder="Quoi de neuf ?" required></textarea>
        <button type="submit" class="button_add_new_post">Light</button>
    </form>
</section>