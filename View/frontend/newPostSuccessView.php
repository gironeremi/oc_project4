<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<div class="text-center">
    <p>
        Le nouvel épisode a été ajouté au site!
    </p>
    <a href="../../index.php?action=admin"><button class="btn btn-success btn-lg">Retour au panneau d'administration</button></a>
</div>
<?php $content = ob_get_clean();
require('template.php'); ?>
