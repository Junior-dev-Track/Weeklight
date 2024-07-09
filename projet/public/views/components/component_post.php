<section class="component_post">
    <?php if (!empty($postsByDay)) : ?>
        <?php foreach ($postsByDay as $day => $posts) : ?>
            <article class="container_post">
                <h2 class="day"><?php echo ($day); ?></h2>
                <div class="card_post">
                    <?php foreach ($posts as $post) : ?>
                        <div class="post">
                            <p><?php echo ($post['created_at']); ?></p>
                            <p><?php echo ($post['content']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </article>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Aucune publication pour le moment.</p>
    <?php endif; ?>
</section>