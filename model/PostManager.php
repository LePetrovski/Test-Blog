<?php
require_once('model/Manager.php');

class PostManager extends Manager
{
  public function getPosts()
  {
    $db = $this->dbConnect();
    $posts = $db->query('SELECT id, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\')
AS date_creation_fr FROM posts ORDER BY date_creation DESC LIMIT 0, 5');

    return $posts;
  }

  public function getPost($postId)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\')
 AS date_creation_fr FROM posts WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
  }

  public function newPost($title, $content)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('INSERT INTO posts (title, content, date_creation) VALUES(?, ?, NOW())');
    $newPostLines = $req->execute(array($title, $content));

    return $newPostLines;
  }

  public function modifyPost($title, $content, $postId)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE posts SET title = :title, content= :content WHERE id = :id');
    $modifyPostLine = $req->execute(array(
      'title' => $title,
      'content' => $content,
      'id' => $postId
    ));

    return $modifyPostLine;
  }

  public function deletePost($postId)
  {
    $db = $this->dbConnect();
    $post = $db->prepare('DELETE FROM posts WHERE id = ?');
    $deletePostLine = $post->execute(array($postId));

    return $deletePostLine;
  }
}