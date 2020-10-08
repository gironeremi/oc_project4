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
    <div class="card-footer d-flex justify-content-around">
        <a href="index.php?action=previousPost&post_id=<?= $post['post_id'] ?>" class="btn btn-secondary">Chapitre précédent</a>
        <a href="index.php" class="btn btn-primary">Retour à l'accueil</a>
        <a href="index.php?action=nextPost&post_id=<?= $post['post_id'] ?>" class="btn btn-secondary">Chapitre suivant</a>
    </div>
</div>



<h2>Commentaires</h2>
<!--Si un utilisateur est connecté, le formulaire s'affichera-->
<?php
if (isset($_SESSION['memberName'])) {
?>
<form action="index.php?action=addComment&id=<?= $post['post_id'] ?>" method="post" class="form-group m-2">
    <div>
        <label for="comment">Votre commentaire</label><br />
        <textarea id="comment" class="form-control" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" class="btn btn-primary m-1"/>
    </div>
</form>
<?php
} else {
    echo '<div class="alert alert-info"><strong>Info: </strong>Pour laisser un commentaire, veuillez <a href="index.php?action=login">vous connecter.</a></div>';
}
?>
<div class="row">
    <?php
    foreach ($comments as $comment)
    {
        ?>
        <div class="card h-100 col-lg-3 col-md-6 col-sm-12">
            <h4 class="card-title"><?= $comment['member_name'] ?> a dit:</h4>
            <p class="card-text"><?= nl2br($comment['comment']) ?></p>
            <p class="card-text font-italic">le <?= $comment['comment_date_fr']?></p>
            <?php
                if (isset($_SESSION['memberName']) && $comment['status'] == 0 ) {?>
                    <a href="index.php?action=flagComment&comment_id=<?= $comment['comment_id'];?>" class="btn btn-danger btn-sm">Signaler ce commentaire</a>
            <?php
                }
                elseif ($comment['status'] == 1) {
                    echo '<div class="text-danger text-right"><i class="fas fa-user-clock"></i> En cours de modération.</div>';
                }
                if ($comment['status'] == 2) {
                    echo '<div class="text-success text-right"><i class="fas fa-user-check"></i> Commentaire validé.</div>';
                }
            ?>
        </div>
        <?php
    }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
