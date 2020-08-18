<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<script type="text/javascript">
    tinymce.init({
        selector: '#postContent',
        language: 'fr_FR',
        language_url: '/vendor/tinymce/tinymce/langs/fr_FR.js',
    });
</script>
<form method="post" class="form-group" action="index.php?action=addPost">
    <p>
        <label for="postTitle">Titre du chapitre : </label><input type="text" name="postTitle" class="form-control"/>
    </p>
    <label for="postContent">Contenu du nouvel épisode : </label><br />
    <p><textarea id="postContent" class="form-control" name="postContent" rows="15">

    </textarea>
    </p>
    <p>
        <label for="postPublishDate">Date de publication : </label><input type="date" name="postPublishDate" class="form-control" value="<?= date('Y-m-d') ?>" />
    </p>
    <button type="submit">Valider</button>
</form>
<?php $content = ob_get_clean();
require('template.php'); ?>