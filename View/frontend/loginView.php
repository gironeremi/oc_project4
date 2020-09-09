<?php $title = 'Connexion';
ob_start(); ?>
<h1>Connexion</h1>
<?php
if (!empty($errors)) { ?>
    <div class="alert alert-danger">
        <p>Vous n'avez pas rempli le formulaire correctement:</p>
        <ul>
            <?php foreach ($errors as $error) { ?>
                <li><?= $error; ?></li>
                <?php
            }
            ?>
        </ul>
    </div>
    <?php
}
?>
<form method="post" action="">
    <div class="form-group">
        <label for="memberName">Pseudo</label>
        <input type="text" name="memberName" class="form-control" />
    </div>
    <div class="form-group">
        <label for="password">Mot de Passe</label>
        <input type="password" name="password" class="form-control" />
        <button type="submit" class="btn btn-primary m-4">Se connecter</button>
</form>
<?php $content = ob_get_clean();
require('template.php'); ?>