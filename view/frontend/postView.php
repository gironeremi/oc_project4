<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<p><a href="../../index.php">Retour à la liste des épisodes</a></p>

<div class="card">
    <div class="card-header">
        <h2><?= htmlspecialchars($post['title']) ?></h2>
    </div>
    <div class="card-body">
        <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
    </div>
</div>

<h2>Commentaires</h2>
<form action="index.php?action=addComment&id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>
<?php
foreach ($comments as $comment)
{
    ?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
