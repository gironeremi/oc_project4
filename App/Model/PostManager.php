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
    public function getLastPost()
    {
        $db = $this->dbConnect();
        $lastPost = $db->query('SELECT post_id, title, content, creation_date FROM posts ORDER BY creation_date DESC LIMIT 1');
        return $lastPost;
    }
    public function postPost($postTitle, $postContent, $postPublishDate)
    {
        $db = $this->dbConnect();
        $newPost = $db->prepare('INSERT INTO posts(title, content, publish_date) VALUES (?,?,?)');
        $affectedLines = $newPost->execute(array($postTitle, $postContent, $postPublishDate));
        return $affectedLines;
    }

}