<?php
namespace App\src\DAO;

use App\src\model\Post;

class PostDAO extends DAO
{
  public function getListPosts()
  {
    $sql = 'SELECT id, title, IF(CHAR_LENGTH(content) > 255, CONCAT(LEFT(content, 255), \'...\'), content) AS content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\')
AS date_creation_fr FROM posts ORDER BY date_creation DESC';
    $result = $this->sql($sql);
    $posts = [];
    foreach ($result as $row) {
      $idPost = $row['id'];
      $posts[$idPost] = $this->buildObject($row);
    }
    return $posts;
  }

  public function getPost($postId)
  {
    $sql = 'SELECT id, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\')
 AS date_creation_fr FROM posts WHERE id = ?';
    $results = $this->sql($sql, [$postId]);
    $row = $results->fetch();
    if($row){
      return $this->buildObject($row);
    } else {
      echo 'Aucun article existant avec cet identifiant';
    }
  }

  public function addPost($post)
  {
    extract($post);
    $sql = 'INSERT INTO posts (title, content, date_creation) VALUES(?, ?, NOW())';
    $this->sql($sql, [$title, $content]);

  }

  public function updatePost($post, $postId)
  {
    extract($post);
    $sql = 'UPDATE posts SET title = :title, content= :content WHERE id = :id';
    $id = $postId;
    $this->sql($sql, [
      'title' => $title,
      'content' => $content,
      'id' => $postId
    ]);
  }

  public function deletePost($postId)
  {
    $sql = 'DELETE posts, comments FROM posts LEFT JOIN comments ON posts.id = comments.id_post WHERE posts.id = ?';
    $this->sql($sql, [$postId]);
  }

  private function buildObject(array $row)
  {
    $post = new Post();
    $post->setId($row['id']);
    $post->setTitle($row['title']);
    $post->setContent($row['content']);
    $post->setDateCreationFr($row['date_creation_fr']);
    return $post;
  }
}