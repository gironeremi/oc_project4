<?php
require 'vendor/autoload.php';
use App\Controller\Controller;
use App\Controller\CommentsController;
use App\Controller\PostsController;
use App\Controller\MembersController;

$action = "";
$controller = new Controller();
$commentsController = new CommentsController();
$postsController = new PostsController();
$membersController = new MembersController();
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
        case 'admin':
            $controller->admin();
            break;
        case 'memberPanel':
            $membersController->memberPanel();
            break;
        case 'newPost':
            $postsController->newPost();
            break;
        case 'addPost':
            $postsController->addPost();
            break;
        default:
            $postsController->listPosts();
    }
}
catch(Exception $e) {
    $error = $e->getMessage();
}