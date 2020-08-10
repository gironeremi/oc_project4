<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<div>
    <p>Dernier épisode:</p>

</div>
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