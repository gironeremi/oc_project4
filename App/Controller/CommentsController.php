<?php
namespace App\Controller;
use App\Model\CommentManager;
class CommentsController extends Controller
{
    public function addComment()
    {
        if (isset($_SESSION['memberName'])) {
            if ((isset($postId)) && $postId > 0) {
                $postId = $this->cleanVar($_GET['id']);
                $author = $this->cleanVar($_SESSION['memberId']);
                $comment = $this->cleanVar($_POST['comment']);
                if (!empty($comment)) {
                    $commentManager = new CommentManager();
                    $affectedLines = $commentManager->addComment($postId, $author, $comment);
                    if ($affectedLines === false) {
                        throw new \Exception('Impossible d\'ajouter le commentaire.');
                    } else {
                        $successMessage = 'Commentaire ajouté!';
                        require('View/template.php');
                    }
                }
            }
        } else {
            throw new \Exception('Veuillez vous connecter.');
        }
    }
    public function flagComment()
    {
        if (isset($_SESSION['memberName'])) {
            $commentId = $_GET['comment_id'];
            $commentManager = new CommentManager();
            $commentManager->flagComment($commentId);
            $successMessage = 'le commentaire a été signalé!';
            require('View/template.php');
        } else {
            throw new \Exception('Veuillez vous connecter.');
        }
    }
}