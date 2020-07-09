<?php
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
function listPosts() {
    $postManager = new OpenClassrooms\Blog\Model\PostManager();
    $posts = $postManager->getPosts();
    require('view/frontend/listPostsView.php');
}
function post() {
    if (isset($_GET['id']) && $_GET['id'] >0) {
        $postManager = new OpenClassrooms\Blog\Model\PostManager();
        $commentManager = new OpenClassrooms\Blog\Model\CommentManager();
        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);
        require('view/frontend/postView.php');
    } else {
        throw new Exception('acucun identifiant de billet envoyé.');
    }
}
function addComment () {
    $postId = cleanVar($_GET['id']);
    $author = cleanVar($_POST['author']);
    $comment = cleanVar($_POST['comment']);
    if ((isset($postId)) && $postId > 0) {
        if (!empty($author) && !empty($comment)) {
            $commentManager = new OpenClassrooms\Blog\Model\CommentManager();
            $affectedLines = $commentManager->postComment($postId, $author, $comment);
            if ($affectedLines === false)
            {
                throw new Exception('Impossible d\'ajouter le commentaire.');
            }
            else
            {
                header('Location: index.php?action=post&id=' . $postId);
            }
        }
        else {
            throw new Exception('tous les champs ne sont pas remplis !');
        }
    }
}
function cleanVar($str)
{
    if(isset($str))
    {
        return trim(htmlspecialchars($str));
    }
    else
    {
        return "";
    }
}