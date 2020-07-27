<?php
namespace App\Controller;
use App\Model\PostManager;
class PostsController extends Controller
{
    public function listPosts()
    {
        $postManager = new PostManager();
        $posts = $postManager->getPosts();
        require('view/frontend/listPostsView.php');
    }
}