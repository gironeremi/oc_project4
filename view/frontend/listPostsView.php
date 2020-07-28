<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

    <p>Derniers épisodes parus :</p>
<div class="container-fluid">
    <div class="row">
        <?php
            foreach ($posts as $post)
            {
        ?>
        <div class="card col-lg-4 col-md-6 col-sm-12">
            <div class="card-header bg-secondary">
                <h3><?= $post['title'] ?></h3>
            </div>
            <div class="card-body">
                <p><?= mb_substr(nl2br($post['content']), 0, 250) ?>...</p>
            </div>
            <div ="card-footer bg-light">
                <a href="../../index.php?action=post&id=<?= $post['id'] ?>" class="btn btn-primary btn-block" role="button">Lire la suite</a>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>