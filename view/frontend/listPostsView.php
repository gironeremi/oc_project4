<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

    <p>Derniers épisodes parus :</p>
<div class="row">
<?php
foreach ($posts as $post)
{
    ?>
    <div class="card col-md-4">
        <div class="card-header">
            <h2><?= htmlspecialchars($post['title']) ?></h2>
        </div>
        <div class="card-body">
            <p><?= substr(nl2br(htmlspecialchars($post['content'])), 0, 250) ?>...</p>
        </div>
        <div ="card-footer">
            <a href="../../index.php?action=post&id=<?= $post['id'] ?>">Lire la suite</a>
        </div>
    </div>
    <?php
}
//$posts->closeCursor();
?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>