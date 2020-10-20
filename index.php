<?php
session_start();
require 'vendor/autoload.php';
use App\Controller\ErrorsController;
use App\Controller\Controller;
use App\Controller\CommentsController;
use App\Controller\PostsController;
use App\Controller\MembersController;
use App\Controller\AdminController;
use App\Model\MembersManager;

$action = "";
$controller = new Controller();
$commentsController = new CommentsController();
$postsController = new PostsController();
$membersController = new MembersController();
$adminController = new AdminController();
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
            $adminController->addPost();
            break;
        case 'getPostEditor':
            $adminController->getPostEditor();
            break;
        case 'updatePost':
            $adminController->updatePost();
            break;
        case 'deletePost':
            $adminController->deletePost();
            break;
        case 'addComment':
            $commentsController->addComment();
            break;
        case 'flagComment':
            $commentsController->flagComment();
            break;
        case 'validateComment':
            $adminController->validateComment();
            break;
        case 'deleteComment':
            $adminController->deleteComment();
            break;
        case 'admin':
            $adminController->admin();
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
    $error = new ErrorsController();
    $error->error($e);
}