<?php
require('App/controller/Controller.php');
require('App/controller/PostsController.php');
require('App/controller/CommentsController.php');
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