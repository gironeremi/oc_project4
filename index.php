<?php
session_start();
require 'vendor/autoload.php';
use App\Controller\Controller;
use App\Controller\CommentsController;
use App\Controller\PostsController;
use App\Controller\MembersController;
use App\Model\MembersManager;

$action = "";
$controller = new Controller();
$commentsController = new CommentsController();
$postsController = new PostsController();
$membersController = new MembersController();
$membersManager = new MembersManager();
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
        case 'addPost':
            $postsController->addPost();
            break;
        case 'getPostEditor':
            $postsController->getPostEditor();
            break;
        case 'updatePost':
            $postsController->updatePost();
            break;
        case 'deletePost':
            $postsController->deletePost();
            break;
        case 'addComment':
            $commentsController->addComment();
            break;
        case 'flagComment':
            $commentsController->flagComment();
            break;
        case 'validateComment':
            $commentsController->validateComment();
            break;
        case 'deleteComment':
            $commentsController->deleteComment();
        case 'nextPost':
            $postsController->nextPost();
            break;
        case 'admin':
            $controller->admin();
            break;
        case 'login':
            $membersController->login();
            break;
        case 'logout':
            $membersController->logout();
            break;
        case 'register':
            $membersController->register();
            break;
        case 'addMember':
            $membersManager->addMember($memberName, $passwordHashed, $email);
            break;
        default:
            $postsController->listPosts();
    }
}
catch(Exception $e) {
    $error = new \App\Controller\ErrorsController();
    $error->error($e);
}