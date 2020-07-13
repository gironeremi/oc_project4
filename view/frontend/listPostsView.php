<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

    <p>Derniers billets du blog :</p>
<?php
foreach ($posts as $post)
{
    ?>
    <div class="card">
        <div class="card-header">
            <h2><?= htmlspecialchars($post['title']) ?></h2>
        </div>
        <div class="card-body">
            <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
        </div>
        <div ="card-footer">
            <a href="../../index.php?action=post&id=<?= $post['id'] ?>">Commentaires</a>
        </div>
    </div>
    <?php
}
//$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>