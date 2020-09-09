<?php $title = $post['title']; ?>

<?php ob_start(); ?>
<p><a href="index.php">Retour à la liste des épisodes</a></p>

<div class="card">
    <div class="card-header">
        <h2><?= $post['title'] ?></h2>
    </div>
    <div class="card-body">
        <p><?= nl2br($post['content']) ?></p>
    </div>
    <div class="card-footer d-flex justify-content-center">
        <a href="index.php" class="btn btn-primary">Retour à l'accueil</a>
    </div>
</div>



<h2>Commentaires</h2>
<form action="index.php?action=addComment&id=<?= $post['post_id'] ?>" method="post">
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
    <p><strong><?= $comment['member_id'] ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br($comment['comment']) ?></p>
    <?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
