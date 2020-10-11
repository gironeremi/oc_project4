<?php
namespace App\Controller;
use App\Model\PostManager, App\Model\CommentManager;
class Controller
{
    public function post()
    {
        if (isset($_GET['post_id']) && $_GET['post_id'] > 0) {
            $postManager = new PostManager();
            $commentManager = new CommentManager();
            $post = $postManager->getPostById($_GET['post_id']);
            $comments = $commentManager->listComments($_GET['post_id']);
            $previousPostId = $postManager->getPreviousPost($_GET['post_id']);
            $nextPostId = $postManager->getNextPost($_GET['post_id']);
            require('View/postView.php');
        } else {
            throw new \Exception('aucun identifiant de billet envoyé.');
        }
    }

    public function cleanVar($str)
    {
        if (isset($str)) {
            return trim(htmlspecialchars($str));
        } else {
            return "";
        }
    }
    public function admin()
    {
        if ($_SESSION['isAdmin'] == 1) {
            $commentManager = new CommentManager();
            $flaggedComments = $commentManager->listFlaggedComments();
            $postManager = new PostManager();
            $posts = $postManager->listPosts();
            require('View/adminView.php');
        } else {
            throw new \Exception('Accès administateur non autorisé!');
        }
    }
}