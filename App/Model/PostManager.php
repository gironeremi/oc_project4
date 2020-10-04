<?php
namespace App\Model;
class PostManager extends Manager
{
    public function listPosts()
    {
        $db = $this->getDbConnect();
        $req = $db->query('SELECT * FROM posts ORDER BY creation_date');
        return $req;
    }

    public function getPostById($postId)
    {
        $db = $this->getDbConnect();
        $req = $db->prepare('SELECT * FROM posts WHERE post_id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }

    public function getLastPost() //pas encore mis en place
    {
        $db = $this->getDbConnect();
        $lastPost = $db->query('SELECT * FROM posts ORDER BY creation_date DESC LIMIT 1');
        return $lastPost;
        //possible fetch() par ici
    }

    public function addPost($postTitle, $postContent, $postPublishDate)
    {
        $db = $this->getDbConnect();
        $newPost = $db->prepare('INSERT INTO posts(title, content, publish_date) VALUES (?,?,?)');
        $affectedLines = $newPost->execute(array($postTitle, $postContent, $postPublishDate));
        return $affectedLines;
    }

    public function deletePost($postId)
    {
        $db = $this->getDbConnect();
        $deletePost = $db->prepare('DELETE FROM posts WHERE post_id = ?');
        $deletePost->execute(array($postId));
    }
    public function updatePost($postId, $postTitle, $postContent, $postPublishDate)
    {
        $db = $this->getDbConnect();
        $updatePost = $db->prepare('UPDATE posts SET title = ? , content = ? , publish_date = ? WHERE post_id = ?');
        $updatePost->execute(array($postTitle, $postContent, $postPublishDate, $postId));

    }
}