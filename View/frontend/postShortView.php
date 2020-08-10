<div class="card col-lg-4 col-md-6 col-sm-12 mb-5">
    <div class="card-header bg-secondary">
        <h3><?= $post['title'] ?></h3>
    </div>
    <div class="card-body">
        <p>
            <?php
            $this->getPostShort($post['content']);
            ?>
        </p>
    </div>
    <div ="card-footer bg-light">
        <a href="../../index.php?action=post&post_id=<?= $post['post_id'] ?>" class="btn btn-primary btn-block" role="button">Lire la suite</a>
    </div>
</div>