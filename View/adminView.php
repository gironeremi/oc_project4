<?php $title = 'Espace Administrateur'; ?>
<?php ob_start(); ?>
<div class="h1 text-center">Bonjour monsieur Forteroche</div>
    <table class="table table-hover">
    <thead class="thead-dark">
    <th>Commentaires signalés</th>
    </thead>
    <tbody>
    <?php
        if (!empty($flaggedComments)) {
            foreach ($flaggedComments as $flaggedComment) {
    ?>
        <tr>
            <td><?= $flaggedComment['member_name']; ?> a commenté: </td>
            <td><?= $flaggedComment['comment']; ?></td>
            <td>
                <div class="btn-group">
                    <a href="index.php?action=validateComment&comment_id=<?= $flaggedComment['comment_id'];?>" class="btn btn-primary btn-sm">Valider</a>
                    <a href="index.php?action=deleteComment&comment_id=<?= $flaggedComment['comment_id'];?>" class="btn btn-danger btn-sm">Supprimer</a>
                </div>
            </td>
        </tr>
    <?php
            }
        }
    ?>
    </tbody>
</table>
<p><a href="index.php?action=getPostEditor"><button type="button" class="btn btn-primary btn-sm">Nouvel épisode</button></a></p>
<table class="table table-hover">
    <thead class="thead-light">
    <th>Liste des épisodes</th>
    <th></th>
    </thead>
    <tbody>
    <?php
        foreach ($posts as $post) {
    ?>
        <tr>
            <td>
                <?= $post['title']?>
            </td>
            <td>
                <div class="btn-group">
                    <a href="index.php?action=post&post_id=<?= $post['post_id'] ?>" class="btn btn-info">Consulter</a>
                    <a href="index.php?action=getPostEditor&post_id=<?= $post['post_id'] ?>" class="btn btn-warning">Modifier</a>
                    <a href="index.php?action=deletePost&post_id=<?= $post['post_id'] ?>" class="btn btn-danger">Supprimer</a>
                </div>
            </td>
        </tr>
    <?php
        }
    ?>
    </tbody>
</table>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
