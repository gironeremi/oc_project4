<?php $title = 'Jean Forteroche';
ob_start(); ?>
<!--
CONTENU ICI
-->
    <h3>liste des épisodes tronqués</h3>
    <div class="container">
        <div class="row">
        <?php
foreach ($posts as $post)
{
    ?>
    <div class="card col-md-4">
        <div class="card-header">
            <h2><?= htmlspecialchars($post['title']) ?></h2>
        </div>
        <div class="card-body">
            <p><?= substr(nl2br(htmlspecialchars($post['content'])), 0, 20) ?>...</p>
        </div>
        <div ="card-footer">
            <a href="../../index.php?action=post&id=<?= $post['id'] ?>" class="btn btn-primary btn-block" role="button">Lire la suite</a>
        </div>
    </div>

<?php $content = ob_get_clean();
require_once('template.php'); ?>