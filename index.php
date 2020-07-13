<?php
require('controller/controller.php');
require('controller/posts.php');
require('controller/comments.php');
$action = "";
if (isset($_GET['action'])) {
    $action = cleanVar($_GET['action']);
}
try {
    switch ($action) {
        case 'listPosts':
            listPosts();
            break;
        case 'post':
            post();
            break;
        case 'addComment':
            addComment();
            break;
        case 'welcome':
            require('view/frontend/welcome.php');
        default:
            listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur: ' . $e->getMessage();
    require('view/errorView.php');
}