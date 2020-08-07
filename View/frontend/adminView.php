<?php $title = 'Espace Administrateur'; ?>
<?php ob_start(); ?>
<div class="h1">Bonjour monsieur Forteroche</div>

<table class="table table-hover">
    <thead class="thead-light">
    <tr>
        <th>Liste des épisodes</th>
        <th><button type="button" class="btn btn-primary">Créer un nouvel épisode</button></th>
    </tr>
    </thead>
    <tbody>
    <!--ici il y aura un foreach avec la liste des épisodes-->
    <tr>
        <td>
            Épisode 1: la Communauté de l'Anneau
        </td>
        <td>
            <button type="button" class="btn btn-primary">Consulter</button>
            <button type="button" class="btn btn-warning">Éditer</button>
            <button type="button" class="btn btn-danger">Supprimer</button>
        </td>
    </tr>
    <tr>
        <td>
            Épisode 2 : Rocco et ses soeurs DVDRip
        </td>
        <td>
            <button type="button" class="btn btn-primary">Consulter</button>
            <button type="button" class="btn btn-warning">Éditer</button>
            <button type="button" class="btn btn-danger">Supprimer</button>
        </td>
    </tr>
    <tr>
        <td>
            Episode IV: A New Hope
        </td>
        <td>
            <button type="button" class="btn btn-primary">Consulter</button>
            <button type="button" class="btn btn-warning">Éditer</button>
            <button type="button" class="btn btn-danger">Supprimer</button>
        </td>
    </tr>
    </tbody>
</table>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
