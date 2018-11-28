<?php
namespace App\src\DAO;

use App\src\model\Comment;

class CommentDAO extends DAO
{
  public function getComments($postId)
  {
    $sql = 'SELECT id, id_post, author, comment, report_comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\')
 AS date_comment_fr FROM comments WHERE id_post = ? ORDER BY date_comment DESC';
    $result = $this->sql($sql, [$postId]);
    $comments = [];
    foreach ($result as $row){
      $commentId = $row['id'];
      $comments[$commentId] = $this->buildObject($row);
    }
    return $comments;
  }

  public function addComment($postId, $comment)
  {
    extract($comment);
    $sql = 'INSERT INTO comments(id_post, author, comment, report_comment, date_comment) VALUES(?, ?, ?, ?, NOW())';
    $this->sql($sql, [$postId, $author, $comment, 0]);
  }

  public function reportComment($commentId)
  {
    $sql = 'UPDATE comments SET report_comment = report_comment+1 WHERE id = ?';
    $this->sql($sql, [$commentId]);
  }

  public function deleteComment($commentId)
  {
    $sql = 'DELETE FROM comments WHERE id = ?';
    $this->sql($sql, [$commentId]);
  }

  public function resetReport($commentId)
  {
    $sql = 'UPDATE comments SET report_comment = ? WHERE id = ?';
    $this->sql($sql,[0, $commentId]);
  }

  private function buildObject(array $row)
  {
    $comment = new Comment();
    $comment->setId($row['id']);
    $comment->setIdPost($row['id_post']);
    $comment->setAuthor($row['author']);
    $comment->setComment($row['comment']);
    $comment->setReportComment($row['report_comment']);
    $comment->setDateCommentFr($row['date_comment_fr']);
    return $comment;
  }
}