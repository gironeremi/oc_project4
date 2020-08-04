<?php
namespace App\Controller;
use App\Model\PostManager;
class PostsController extends Controller
{
    public function listPosts()
    {
        $postManager = new PostManager();
        $posts = $postManager->getPosts();
        //ici on pourrait rajouter une fonction qui ne renvoie qu'une partie du chapitre, coupé correctement.
        require('view/frontend/listPostsView.php');
    }
    public function getPostShort()
    {
        //ici la méthode permettant de récupérer les articles raccourcis correctement.
    }
}