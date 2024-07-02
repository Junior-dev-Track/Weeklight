<section class="card_posts">
    <?php if (!empty($posts)) : ?>
        <?php foreach ($posts as $post) : ?>
            <div class="post">
                <p><?php echo ($post['content']); ?></p>
                <small><?php echo ($post['created_at']); ?></small>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Aucune publication pour le moment.</p>
    <?php endif; ?>
</section>