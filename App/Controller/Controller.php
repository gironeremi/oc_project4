<?php
namespace App\Controller;
use App\Model\PostManager, App\Model\CommentManager;
class Controller
{
    public function post()
    {
        $postId = intval($_GET['post_id']);
        if ($postId> 0) {
            $postManager = new PostManager();
            $commentManager = new CommentManager();
            $post = $postManager->getPostById($postId);
            if (!empty($post)) {
                $comments = $commentManager->listComments($postId);
                $previousPostId = $postManager->getPreviousPost($postId);
                $nextPostId = $postManager->getNextPost($postId);
                require('View/postView.php');
            } else {
                throw new \Exception('aucun identifiant de billet envoyé.');
            }
        } else {
            throw new \Exception('l\'argument saisi n\'est pas un entier');
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