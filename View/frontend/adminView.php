<?php $title = 'Espace Administrateur'; ?>
<?php ob_start(); ?>
<div class="h1">Bonjour monsieur Forteroche</div>
<table class="table table-hover">
    <thead class="thead-dark">
    <th>Commentaires signalés par les membres</th>
    </thead>
    <tbody>
    <!--Ici également une boucle foreach avec tous les commentaires qui ont été signalés-->
    <tr>
        <td>Micheldu38</td>
        <td>Chapitre La Louve</td>
        <td>Pfff c'est nul!!</td>
        <td>
            <form>
                <button type="button" class="btn btn-primary btn-sm">Acceptable</button>
                <button type="button" class="btn btn-danger btn-sm">Suppression</button>
            </form>
        </td>
    </tr>
    <tr>
        <td>DarkANgel64</td>
        <td>le chapitre de la fin</td>
        <td>TU VEU RENCONTRER D MEUF DE TON TIéKAR??? TAPE MEUF AU 81212 ET RAMASSE GRAVE TA VU WESH GROS!!!</td>
        <td>
            <button type="button" class="btn btn-primary btn-sm">Acceptable</button>
            <button type="button" class="btn btn-danger btn-sm">Suppression</button>
        </td>
    </tr>
    </tbody>
</table>
<a href="../../index.php?action=newPost"><button type="button" class="btn btn-primary btn-sm">Nouvel épisode</button></a>
<table class="table table-hover">
    <thead class="thead-light">
        <th>Liste des épisodes</th>
        <th></th>
    </thead>
    <tbody>
    <!--ici il y aura un foreach avec la liste des épisodes-->
    <tr>
        <td>
            Épisode 1: la Communauté de l'Anneau
        </td>
        <td>
            <form>
                <button type="button" class="btn btn-primary">Consulter</button>
                <button type="button" class="btn btn-warning">Éditer</button>
                <button type="button" class="btn btn-danger">Supprimer</button>
            </form>
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
