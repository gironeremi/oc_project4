<?php $title = 'Espace Administrateur'; ?>
<?php ob_start(); ?>
<div class="h1 text-center">Bonjour monsieur Forteroche</div>
<a href="../index.php?action=newPost"><button type="button" class="btn btn-primary btn-sm">Nouvel épisode</button></a>
    <table class="table table-hover">
    <thead class="thead-dark">
    <th>Commentaires signalés</th>
    </thead>
    <tbody>
    <?php
        if (isset($flaggedComments) && !empty($flaggedComments)) {
            foreach ($flaggedComments as $flaggedComment) {
    ?>
        <tr>
            <td><?= $flaggedComment['member_id']; ?></td>
            <td><?= $flaggedComment['post_id']; ?></td>
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
<table class="table table-hover">
    <thead class="thead-light">
    <th>Liste des épisodes</th>
    <th></th>
    </thead>
    <tbody>
    <!--ici il y aura un foreach avec la liste des épisodes-->
    <tr>
        <td>
            Épisode 1: la Communauté de l'Anneau
        </td>
        <td>
            <div class="btn-group">
                <button type="button" class="btn btn-info">Consulter</button>
                <button type="button" class="btn btn-warning">Modifier</button>
                <button type="button" class="btn btn-danger">Supprimer</button>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            Épisode 2 : Rocco et ses soeurs DVDRip
        </td>
        <td>
            <button type="button" class="btn btn-primary">Consulter</button>
            <button type="button" class="btn btn-warning">Éditer</button>
            <button type="button" class="btn btn-danger">Supprimer</button>
        </td>
    </tr>
    <tr>
        <td>
            Episode IV: A New Hope
        </td>
        <td>
            <button type="button" class="btn btn-primary">Consulter</button>
            <button type="button" class="btn btn-warning">Éditer</button>
            <button type="button" class="btn btn-danger">Supprimer</button>
        </td>
    </tr>
    </tbody>
</table>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
