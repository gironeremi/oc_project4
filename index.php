<?php
require 'vendor/autoload.php';
use App\Controller\Controller, App\Controller\CommentsController, App\Controller\PostsController;
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
        default:
            listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur: ' . $e->getMessage();
    require('view/errorView.php');
}