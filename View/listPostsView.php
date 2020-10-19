<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>

    <section class="projects-section bg-light d-flex flex-column justify-content-center align-items-center" id="projects">
    <h2 class="p-2">Liste des épisodes :</h2>
    <div>
        <?php
            foreach ($posts as $post) {
        ?>
            <div class="card m-5 p-4 shadow p-3 mb-5 bg-white rounded">
                <h3 class="card-title"><?= $post['title'] ?></h3>
                <p class="card-text">
                <?php
                    $this->getPostShort($post['content']);
                ?>
                </p>
                <a href="index.php?action=post&post_id=<?= $post['post_id'] ?>" class="btn btn-primary" role="button">Lire la suite</a>
            </div>
        <?php
            }
        ?>
    </div>
    <nav>
        <ul class="pagination">
            <li class="page-item <?php if($currentPage == 1) { echo "disabled";} ?>">
                <a href="index.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédent</a>
            </li>
            <?php
            for($page=1; $page<=$pages; $page++):
            ?>
                <li class="page-item <?php if($currentPage == $page){ echo "active"; }?>">
                    <a href="index.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                </li>
            <?php endfor ?>
            <li class="page-item <?php if($currentPage == $pages) { echo "disabled";} ?>">
                <a href="index.php?page=<?= $currentPage + 1 ?>" class="page-link">Suivant</a>
            </li>
        </ul>
    </nav>
</section>
<?php $content = ob_get_clean();
require('template.php'); ?>