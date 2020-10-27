<?php $title = 'Espace Administrateur'; ?>
<?php ob_start(); ?>
<div class="text-center m-5">
<h1 class="">Bienvenue monsieur Forteroche</h1>
</div>
<div class="card m-5 p-4 shadow bg-white rounded d-flex flex-column justify-content-center align-items-center">
    <h2>Commentaires signalés par les membres</h2>
    <?php
        if (!empty($flaggedComments)) {
            foreach ($flaggedComments as $flaggedComment) {
    ?>
    <div class="card col-md-8 m-3 p-3 shadow-sm">
        <h4 class="card-title p-3"><?= $flaggedComment['member_name']; ?> a commenté: </h4>
        <p class="card-text"><?= $flaggedComment['comment']; ?></p>
        <a href="index.php?action=validateComment&comment_id=<?= $flaggedComment['comment_id'];?>" class="btn btn-primary m-2">Valider</a>
        <a href="index.php?action=deleteComment&comment_id=<?= $flaggedComment['comment_id'];?>" class="btn btn-danger m-2">Supprimer</a>
    </div>
    <?php
            }
        }
    ?>
</div>
<div class="card m-5 p-4 shadow bg-white rounded d-flex flex-column justify-content-center align-items-center">
    <h2 class="m-3">liste des épisodes</h2>
    <a href="index.php?action=getPostEditor" class="btn btn-primary btn-sm">Créer un nouvel épisode</a>
    <?php
        foreach ($posts as $post) {
    ?>
    <div class="card col-md-8 m-3 p-3 shadow-sm">
        <h4 class="card-title p-3"><?= $post['title']?></h4>
        <a href="index.php?action=post&post_id=<?= $post['post_id'] ?>" class="btn btn-primary m-2">Consulter</a>
        <a href="index.php?action=getPostEditor&post_id=<?= $post['post_id'] ?>" class="btn btn-secondary m-2">Modifier</a>
        <a href="index.php?action=deletePost&post_id=<?= $post['post_id'] ?>" class="btn btn-danger m-2">Supprimer</a>
    </div>
    <?php
        }
    ?>
    <nav>
        <ul class="pagination">
            <li class="page-item <?php if($currentPage == 1) { echo "disabled";} ?>">
                <a href="index.php?action=admin&page=<?= $currentPage - 1 ?>" class="page-link">Précédent</a>
            </li>
            <?php
            for($page=1; $page<=$pages; $page++):
                ?>
                <li class="page-item <?php if($currentPage == $page){ echo "active"; }?>">
                    <a href="index.php?action=admin&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                </li>
            <?php endfor ?>
            <li class="page-item <?php if($currentPage == $pages) { echo "disabled";} ?>">
                <a href="index.php?action=admin&page=<?= $currentPage + 1 ?>" class="page-link">Suivant</a>
            </li>
        </ul>
    </nav>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
