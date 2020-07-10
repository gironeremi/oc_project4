<?php
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
function post() {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $postManager = new OpenClassrooms\Blog\Model\PostManager();
            $commentManager = new OpenClassrooms\Blog\Model\CommentManager();
            $post = $postManager->getPost($_GET['id']);
            $comments = $commentManager->getComments($_GET['id']);
            require('view/frontend/postView.php');
        } else {
            throw new Exception('acucun identifiant de billet envoyé.');
        }
    }
function cleanVar($str) {
        if (isset($str)) {
            return trim(htmlspecialchars($str));
        } else {
            return "";
        }
}