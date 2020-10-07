<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>
<div>
    <?php
    if (!empty($_SESSION['flash'])) {
        foreach($_SESSION['flash'] as $message) {?>
            <h3><?= $message; ?></h3>
            <?php
        }
    }?>
<!--Pour l'instant, pas d'affichage du dernier épisode
</div>
    <div>
    <p>Dernier épisode:</p>

</div>
-->
<div class="container-fluid">
    <p>Tous les épisodes :</p>
    <div class="row">
        <?php
            foreach ($posts as $post)
            {
                require('postShortView.php');
            }
        ?>
    </div>
</div>
<?php $content = ob_get_clean();
require('template.php'); ?>