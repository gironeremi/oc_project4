<?php
namespace App\Controller;
use App\Model\CommentManager;
class CommentsController extends Controller
{
    public function addComment()
    {
        $postId = $this->cleanVar($_GET['id']);
        $author = $this->cleanVar($_SESSION['member_id']);
        $comment = $this->cleanVar($_POST['comment']);
        if ((isset($postId)) && $postId > 0) {
            if (!empty($comment)) {
                $commentManager = new CommentManager();
                $affectedLines = $commentManager->addComment($postId, $author, $comment);
                if ($affectedLines === false) {
                    throw new \Exception('Impossible d\'ajouter le commentaire.');
                }
            }
        }
    }
    public function flagComment()
    {
            $commentId = $_GET['comment_id'];
            $commentManager = new CommentManager();
            $commentManager->flagComment($commentId);
    }
    public function validateComment()
    {
        $commentId = $_GET['comment_id'];
        $commentManager = new CommentManager();
        $commentManager->validateComment($commentId);
    }
    public function deleteComment()
    {
        $commentId = $_GET['comment_id'];
        $commentManager = new CommentManager();
        $commentManager->deleteComment($commentId);
    }
    //TODO une fonction qui valide un commentaire (en mettant un petit icône vert, par exemple.
    //TODO une fonction qui, au contraire, supprime le commentaire disgracieux.
}