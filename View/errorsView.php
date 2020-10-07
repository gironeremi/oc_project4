<?php
$title = 'Jean Forteroche';
ob_start(); ?>
    <div class="alert alert-danger">
        <?= $exception->getMessage(); ?>
    </div>
<?php $content = ob_get_clean();
require('template.php'); ?>