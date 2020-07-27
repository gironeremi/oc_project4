<?php
namespace App\Controller;
use App\Model\CommentManager;
class CommentsController extends Controller
{
    public function addComment()
    {
        $postId = cleanVar($_GET['id']);
        $author = cleanVar($_POST['author']);
        $comment = cleanVar($_POST['comment']);
        if ((isset($postId)) && $postId > 0) {
            if (!empty($author) && !empty($comment)) {
                $commentManager = new CommentManager();
                $affectedLines = $commentManager->postComment($postId, $author, $comment);
                if ($affectedLines === false) {
                    throw new Exception('Impossible d\'ajouter le commentaire.');
                } else {
                    header('Location: index.php?action=post&id=' . $postId);
                }
            } else {
                throw new Exception('tous les champs ne sont pas remplis !');
            }
        }
    }
}