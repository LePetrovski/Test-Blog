<?php

namespace App\src\model;

class Comment
{
  private $id;

  private $id_post;

  private $author;

  private $comment;

  private $report_comment;

  private $date_comment_fr;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getIdPost()
  {
    return $this->id_post;
  }

  public function setIdPost($id_post)
  {
    $this->id_post = $id_post;
  }

  public function getAuthor()
  {
    return $this->author;
  }

  public function setAuthor($author)
  {
    $this->author = $author;
  }

  public function getComment()
  {
    return $this->comment;
  }

  public function setComment($comment)
  {
    $this->comment = $comment;
  }

  public function getReportComment()
  {
    return $this->report_comment;
  }

  public function setReportComment($report_comment)
  {
    $this->report_comment = $report_comment;
  }

  public function getDateCommentFr()
  {
    return $this->date_comment_fr;
  }

  public function setDateCommentFr($date_comment_fr)
  {
    $this->date_comment_fr = $date_comment_fr;
  }

}