<?php $title = 'Editeur de chapitre'; ?>

<?php ob_start(); ?>
<script type="text/javascript">
    tinymce.init({
        selector: '#postContent',
        language: 'fr_FR',
        language_url: '/vendor/tinymce/tinymce/langs/fr_FR.js',
    });
</script>
<form method="post" class="form-group"
      <?php
      if(!empty($post)) {?>
          action="index.php?action=updatePost&post_id=<?= $post['post_id'] ?>"
      <?php } else { ?>
          action="index.php?action=addPost"
      <?php
      }
      ?>
  >
    <p>
        <label for="postTitle">Titre du chapitre : </label><input type="text" name="postTitle" class="form-control" value="
        <?php
            if(!empty($post['title'])) {
                echo $post['title'];
            }
        ?>
        "/>
    </p>
    <label for="postContent">Contenu de l'épisode : </label><br />
    <p><textarea id="postContent" class="form-control" name="postContent" rows="15">
    <?php
        if(!empty($post['content'])) {
            echo $post['content'];
        }
    ?>
    </textarea>
    </p>
    <p>
        <label for="postPublishDate">Date de publication : </label><input type="date" name="postPublishDate" class="form-control" value="<?= date('Y-m-d') ?>" />
    </p>
    <button type="submit">Valider</button>
</form>
<?php $content = ob_get_clean();
require('template.php'); ?>