<?php $title = 'Inscription';
ob_start(); ?>
<h1>Inscription</h1>
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
<form action="" method="post">
    <div class="form-group">
        <label for="memberName">Pseudonyme</label>
        <input type="text" name="memberName" class="form-control" />
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" />
    </div>
    <div class="form-group">
        <label for="password">Mot de Passe</label>
        <input type="password" name="password" class="form-control" />
    </div>
    <div class="form-group">
        <label for="passwordConfirm">Confirmation Mot de Passe</label>
        <input type="password" name="passwordConfirm" class="form-control" />
    </div>
    <button type="submit" class="btn btn-primary">M'inscrire</button>
</form>
<?php $content = ob_get_clean();
require('template.php'); ?>
