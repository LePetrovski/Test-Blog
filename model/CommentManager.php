<?php
require_once('model/Manager.php');

class CommentManager extends Manager
{
  public function getComments($postId)
  {
    $db = $this->dbConnect();
    $comments = $db->prepare('SELECT id, author, comment, report_comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments WHERE id_post = ? ORDER BY date_comment DESC');
    $comments->execute(array($postId));

    return $comments;
  }

  public function getReportedComments()
  {
    $db = $this->dbConnect();
    $reportedComments = $db->query('SELECT id, author, comment, report_comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments WHERE report_comment >= 1 ORDER BY date_comment DESC');

    return $reportedComments;
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

  public function resetComment($commentId)
  {
    $db = $this->dbConnect();
    $comment = $db->prepare('UPDATE comments SET report_comment = :report_comment WHERE id = :id');
    $reset = $comment->execute(array(
      'id' => $commentId,
      'report_comment' => 0
    ));

    return $reset;
  }
}