<?php
namespace App\Model;
class PostManager extends Manager
{
    public function listPosts($firstPost, $postsPerPages)
    {
        $db = $this->getDbConnect();
        $req = $db->prepare('SELECT * FROM posts ORDER BY creation_date LIMIT :first_post, :posts_per_pages');
        $req->bindValue(':first_post', $firstPost, \PDO::PARAM_INT);
        $req->bindValue(':posts_per_pages', $postsPerPages, \PDO::PARAM_INT);
        $req->execute();
        return $req;

    }
    public function getPostById($postId)
    {
        $db = $this->getDbConnect();
        $req = $db->prepare('SELECT * FROM posts WHERE post_id = ?');
        $req->execute(array($postId));
        return $post = $req->fetch();
    }
    public function getNextPost($postId)
    {
        $db = $this->getDbConnect();
        $req = $db->prepare('CALL getNextPost(?)');
        $req->execute(array($postId));
        return $req->fetchColumn();
    }
    public function getPreviousPost($postId)
    {
        $db = $this->getDbConnect();
        $req = $db->prepare('CALL getPreviousPost(?)');
        $req->execute(array($postId));
        return $req->fetchColumn();
    }
    public function getNumberOfPosts()
    {
        $db = $this->getDbConnect();
        $req = $db->query('SELECT COUNT(*) AS number_of_posts FROM posts');
        return $numberOfPosts = (int) $req->fetchColumn();
    }
    public function addPost($postTitle, $postContent, $postPublishDate)
    {
        $db = $this->getDbConnect();
        $newPost = $db->prepare('INSERT INTO posts(title, content, publish_date) VALUES (?,?,?)');
        return $affectedLines = $newPost->execute(array($postTitle, $postContent, $postPublishDate));
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