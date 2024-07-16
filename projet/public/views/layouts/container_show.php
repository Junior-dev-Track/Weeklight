<span id="component_filter"></span>

<section id="container_show">
    <div class="card-title">
        <h2 class="title">Publier un ghost souvenir</h2>
        <button id="button_close_window">❌</button>
    </div>
    <hr>
    <form action="/<?php echo $_SESSION["account"]["nick_name"] ?>" method="POST" enctype="multipart/form-data">
        <textarea name="post_content" placeholder="Quoi de neuf ?" required></textarea>
        <input type="url" name="post_link" placeholder="Lien (facultatif)">
        <input type="file" name="post_image" accept="image/*">
        <button type="submit" class="button_add_new_post">Light</button>
    </form>
</section>