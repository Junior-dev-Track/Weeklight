<span id="filter_container"></span>

<section id="container_show">
    <div class="card-title">
        <h2 class="title">Créer une publication</h2>
        <button id="button_close_window">❌</button>
    </div>
    <hr>
    <form action="/<?php echo $_SESSION["account"]["nick_name"] ?>" method="POST">
        <textarea name="content" placeholder="Écrivez votre publication ici..."></textarea>
        <button type="submit" class="button_add_new_post">Publier</button>
    </form>
</section>