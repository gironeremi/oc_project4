<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<div class="text-center">
    <p>
        <h2>Le nouvel épisode a été ajouté au site!</h2>
    </p>
    <a href="../index.php?action=admin"><button class="btn btn-success btn-sm">Retour au panneau d'administration</button></a>
</div>
<?php $content = ob_get_clean();
require('template.php'); ?>
