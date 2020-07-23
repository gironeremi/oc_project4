<?php
require_once('../model/PostManager.php');
class PostsController extends Controller
{
    public function listPosts()
    {
        $postManager = new OpenClassrooms\Blog\Model\PostManager();
        $posts = $postManager->getPosts();
        require('view/frontend/listPostsView.php');
    }
}