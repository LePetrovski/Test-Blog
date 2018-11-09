<?php
class CommentManager
{
  public function getComments($postId)
  {
    $db = $this->dbConnect();
    $comments = $db->prepare('SELECT id, author, comment, report_comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments WHERE id_post = ? ORDER BY date_comment DESC');
    $comments->execute(array($postId));

    return $comments;
  }

  public function newComment($postId, $author, $comment, $report)
  {
    $db = $this->dbConnect();
    $comments = $db->prepare('INSERT INTO comments(id_post, author, comment, report_comment, date_comment) VALUES(?, ?, ?, ?, NOW())');
    $newCommentLines = $comments->execute(array($postId, $author, $comment, $report));

    return $newCommentLines;
  }

  public function reportComment($commentId)
  {
    $db = $this->dbConnect();
    $comment = $db->prepare('UPDATE comments SET report_comment = report_comment+1 WHERE id = ?');
    $report =$comment->execute(array($commentId));

    return $report;
  }

  public function deleteComment($commentId)
  {
    $db = $this->dbConnect();
    $comment = $db->prepare('DELETE FROM comments WHERE id = ?');
    $deleteCommentLine = $comment->execute(array($commentId));

    return $deleteCommentLine;
  }

  private function dbConnect()
  {
    $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
    return $db;
  }
}