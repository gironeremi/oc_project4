<?php $title = 'Espace Administrateur'; ?>
<div class="h1">Bonjour monsieur Forteroche</div>
<?php ob_start(); ?>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
