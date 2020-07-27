<?php
require 'vendor/autoload.php';
use App\Controller\Controller, App\Controller\CommentsController, App\Controller\PostsController;
$action = "";
$controller = new Controller();
$commentsController = new CommentsController();
$postsController = new PostsController();
if (isset($_GET['action'])) {
    $action = $controller->cleanVar($_GET['action']);
}
try {
    switch ($action) {
        case 'listPosts':
            $postsController->listPosts();
            break;
        case 'post':
            $controller->post();
            break;
        case 'addComment':
            $commentsController->addComment();
            break;
        default:
            $postsController->listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur: ' . $e->getMessage();
    require('view/errorView.php');
}