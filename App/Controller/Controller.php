<?php
namespace App\Controller;
use App\Model\PostManager, App\Model\CommentManager;
class Controller
{
    public function post()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $postManager = new PostManager();
            $commentManager = new CommentManager();
            $post = $postManager->getPost($_GET['id']);
            $comments = $commentManager->getComments($_GET['id']);
            require('view/frontend/postView.php');
        } else {
            throw new Exception('aucun identifiant de billet envoyé.');
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
}