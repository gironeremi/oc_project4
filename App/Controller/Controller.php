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
        if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) {
            //ici créer une méthode récupérant les commentaires "signalés"
            $commentManager = new CommentManager();
            $flaggedComments = $commentManager->listFlaggedComments();
            //et générer le tableau avec les épisodes et les boutons CRUD
            $postManager = new PostManager();
            $posts = $postManager->listPosts();
            require('View/adminView.php');
        } else {
            header('location:index.php');
        }
    }
}