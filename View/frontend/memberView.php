<?php $title = 'Bienvenue utilisateur'; ?>
<?php ob_start(); ?>

<h1>Bienvenue Machin!</h1>
<form>
    <button type="submit" class="btn btn-primary" formaction="">Lire le dernier épisode paru</button>
</form>

<?php $content = ob_get_clean();
require('template.php'); ?>