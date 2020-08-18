<?php
namespace App\Controller;
use App\Model\CommentManager;
class CommentsController extends Controller
{
    public function addComment()//vu que les tables ont été modifiées, il faudra retravailler l'ajout de commentaires.
    {
        $postId = parent::cleanVar($_GET['post_id']);
        $author = parent::cleanVar($_POST['member_id']);
        $comment = parent::cleanVar($_POST['comment']);
        if ((isset($postId)) && $postId > 0) {
            if (!empty($author) && !empty($comment)) {
                $commentManager = new CommentManager();
                $affectedLines = $commentManager->addComment($postId, $author, $comment);
                if ($affectedLines === false) {
                    throw new \Exception('Impossible d\'ajouter le commentaire.');
                } else {
                    header('Location: index.php?action=post&id=' . $postId);
                }
            } else {
                throw new \Exception('tous les champs ne sont pas remplis !');
            }
        }
    }
    //TODO une fonction qui valide un commentaire (en mettant un petit icône vert, par exemple.
    //TODO une fonction qui, au contraire, supprime le commentaire disgracieux.
}