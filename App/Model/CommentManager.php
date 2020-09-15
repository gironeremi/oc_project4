<?php
namespace App\Model;
class CommentManager extends Manager
{
    public function listComments($postId)
    {
        $db = $this->getDbConnect();
        $comments = $db->prepare('SELECT comment_id, member_id, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));
        return $comments;
    }
    public function addComment($postId, $author, $comment)
    {
        $db = $this->getDbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, member_id , comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));
        return $affectedLines;
    }
}