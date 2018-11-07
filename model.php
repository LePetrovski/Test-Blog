<?php
/**
 * User: Petrovski
 * Date: 07/11/2018
 * Time: 13:11
 * Create a model
 */

function dbConnect()
{
  try
  {
    $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
  }
  catch(Exception $e)
  {
    die('Erreur : '.$e->getMessage());
  }
}

function getPosts()
{
  $db = dbConnect();
  $req = $db->query('SELECT id, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\')
 AS date_creation_fr FROM posts ORDER BY date_creation DESC LIMIT 0, 5');

  return $req;
}

function getPost($postId)
{
  $db = dbConnect();
  $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\')
 AS date_creation_fr FROM posts WHERE id = ?');
  $req->execute(array($postId));
  $post = $req->fetch();

  return $post;
}

function getComments($postId)
{
  $db = dbConnect();
  $comments = $db->prepare('SELECT id, author, comment, report_comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments WHERE id_post = ? ORDER BY date_comment DESC');
  $comments->execute(array($postId));

  return $comments;
}