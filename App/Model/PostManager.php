<?php
namespace App\Model;
class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT post_id, title, content, creation_date FROM posts ORDER BY creation_date');
        return $req;
    }
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT post_id, title, content, creation_date FROM posts WHERE post_id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }
}