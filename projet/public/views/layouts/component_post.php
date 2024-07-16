<?php if (!empty($postsByDay)) : ?>
    <?php foreach ($postsByDay as $day => $posts) : ?>
        <article class="container_post">
            <h2 class="day"><?php echo ($day); ?></h2>
            <div class="card_post">
                <?php foreach ($posts as $post) : ?>
                    <div class="post">
                        <?php if (!empty($post['image'])) : ?>
                            <img src="<?php echo ($post['image']); ?>" alt="Image de la publication">
                        <?php endif; ?>
                        <?php if (!empty($post['link'])) : ?>
                            <a href="<?php echo ($post['link']); ?>" target="_blank"><?php echo ($post['link']); ?></a>
                        <?php endif; ?>
                        <p><?php echo ($post['content']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </article>
    <?php endforeach; ?>
<?php else : ?>
    <h2>Aucune publication pour le moment.</h2>
<?php endif; ?>