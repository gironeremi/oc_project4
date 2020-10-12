<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>
<section class="d-flex flex-column justify-content-center align-items-center">
    <h3>Tous les épisodes :</h3>
    <div class="container">
        <div>
            <?php
                foreach ($posts as $post) {
            ?>
                <div class="card mt-5 mb-5">
                    <div class="card-header bg-secondary">
                        <h3><?= $post['title'] ?></h3>
                    </div>
                    <div class="card-body">
                        <p>
                        <?php
                            $this->getPostShort($post['content']);
                        ?>
                        </p>
                    </div>
                    <div ="card-footer bg-light">
                        <a href="index.php?action=post&post_id=<?= $post['post_id'] ?>" class="btn btn-primary btn-block" role="button">Lire la suite</a>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
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