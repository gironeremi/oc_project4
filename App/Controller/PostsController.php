<?php
namespace App\Controller;
use App\Model\PostManager;
class PostsController extends Controller
{
    public function listPosts()
    {
        $postManager = new PostManager();
        $posts = $postManager->getPosts();
        require('View/frontend/listPostsView.php');
    }
    public function getPostShort($str)
    {
        //ici la méthode permettant de récupérer les articles raccourcis correctement.
        $contentExtract = mb_substr($str, 0, 180);
        $lastSpace = mb_strrpos($contentExtract,' ', 0);
        echo nl2br(mb_substr($str, 0, $lastSpace)). "...";
    }
    public function newPost()
    {
        require('View/frontend/newPostView.php');
    }
    //TODO une méthode qui créé un article.
    public function addPost()
    {
        //déclaration et nettoyage des données
        $postTitle = parent::cleanVar($_POST['postTitle']);
        $postContent = $_POST['postContent'];//cleanVar enlevé...pour éviter un soucis avec htmlspecialchars, on va tenter.
        $postPublishDate = parent::cleanVar($_POST['postPublishDate']);
        if (!empty($postTitle) && !empty($postContent) && !empty($postPublishDate))
        {
            $postManager = new PostManager();
            $affectedLines = $postManager->postPost($postTitle, $postContent, $postPublishDate);
            if ($affectedLines === false) {
                throw new \Exception('impossible d\'ajouter ce chapitre');
            }
        } else {
            throw new \Exception('Toutes les données ne sont pas saisies!');
        }
    }
    //TODO la méthode getLastPost avec GetPosts dedans... puis un tri (avec end()?)
    //TODO une autre qui modifie
    //TODO encore une qui supprime
}