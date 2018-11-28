<?php

namespace App\src\model;

class Post
{
  private $id;

  private $title;

  private $content;

  private $date_creation_fr;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getTitle()
  {
   return $this->title;
  }

  public function setTitle($title)
  {
    $this->title = $title;
  }

  public function getContent()
  {
    return $this->content;
  }

  public function setContent($content)
  {
    $this->content = $content;

  }

  public function getDateCreationFr()
  {
    return $this->date_creation_fr;
  }

  public function setDateCreationFr($date_creation_fr)
  {
    $this->date_creation_fr = $date_creation_fr;
  }
}