<?php
namespace App\Controller;
use App\Model\PostManager;
class PostsController extends Controller
{
    public function listPosts()
    {
        $postManager = new PostManager();
        $posts = $postManager->listPosts();
        require('View/listPostsView.php');
    }
    public function getPostShort($str)
    {
        //ici la méthode permettant de récupérer les articles raccourcis correctement.
        $contentExtract = mb_substr($str, 0, 180);
        $lastSpace = mb_strrpos($contentExtract,' ', 0);
        echo nl2br(mb_substr($str, 0, $lastSpace)). "...";
    }
    public function nextPost()
    {

    }
    public function previousPost()
    {

    }
    public function addPost()
    {
        //déclaration et nettoyage des données
        $postTitle = $this->cleanVar($_POST['postTitle']);
        $postContent = $_POST['postContent'];//cleanVar retiré, TinyMCE fait dejà le taf.
        $postPublishDate = $this->cleanVar($_POST['postPublishDate']);
        if (empty($postTitle) || empty($postContent) ||empty($postPublishDate))
        {
            throw new \Exception('Toutes les données ne sont pas saisies!');
        } else {
            $postManager = new PostManager();
            $affectedLines = $postManager->addPost($postTitle, $postContent, $postPublishDate);
            if ($affectedLines === false) {
                throw new \Exception('impossible d\'ajouter ce chapitre');
            } else {
                //message de réussite
                $successMessage = "Le chapitre a bien été ajouté!";
                require('View/template.php');
            }
        }
    }
    public function getPostEditor()
    {
        if (isset($_GET['post_id']) && $_GET['post_id'] > 0) {
            $postManager = new PostManager();
            $post = $postManager->getPostById($_GET['post_id']);
        }
        require('View/postEditorView.php');
    }
    public function updatePost()
    {
        $postId = $_GET['post_id'];
        $postTitle = $this->cleanVar($_POST['postTitle']);
        $postContent = $_POST['postContent'];//cleanVar retiré, TinyMCE fait dejà le taf.
        $postPublishDate = $this->cleanVar($_POST['postPublishDate']);
        if (empty($postTitle) || empty($postContent) || empty($postPublishDate)) {
            throw new \Exception('Toutes les données ne sont pas saisies!');
        } else {
            $postManager = new PostManager();
            $postManager->updatePost($postId, $postTitle, $postContent, $postPublishDate);
            $successMessage = 'Le chapitre a bien été mis à jour!';
            require('View/template.php');
        }
    }
    public function deletePost()
    {
        $postId = $_GET['post_id'];
        $postManager = new PostManager();
        $postManager->deletePost($postId);
        $successMessage = 'Le chapitre est supprimé!';
        require('View/template.php');
    }
    //TODO la méthode getLastPost avec GetPosts dedans... puis un tri (avec end()?)
}