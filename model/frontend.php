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
    return $db;
  }
  catch(Exception $e)
  {
    die('Erreur : '.$e->getMessage());
  }
}

function getPosts()
{
  $db = dbConnect();
  $posts = $db->query('SELECT id, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\')
AS date_creation_fr FROM posts ORDER BY date_creation DESC LIMIT 0, 5');

  return $posts;
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

function newPost($title, $content)
{
  $db = dbConnect();
  $req = $db->prepare('INSERT INTO posts (title, content, date_creation) VALUES(?, ?, NOW())');
  $newPostLines = $req->execute(array($title, $content));

  return $newPostLines;
}

function newComment($postId, $author, $comment)
{
  $db = dbConnect();
  $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
  $newCommentLines = $comments->execute(array($postId, $author, $comment));

  return $newCommentLines;
}

function modifyPost($title, $content, $postId)
{
  $db = dbConnect();
  $req = $db->prepare('UPDATE posts SET title = :title, content= :content WHERE id = :id');
  $modifyPostLine = $req->execute(array(
    'title' => $title,
    'content' => $content,
    'id' => $postId
  ));

  return $modifyPostLine;
}

function reportComment($commentId)
{
  $db = dbConnect();
  $comment = $db->prepare('UPDATE comments SET report_comment = report_comment+1 WHERE id = ?');
  $report =$comment->execute(array($commentId));

  return $report;
}


function deletePost($postId)
{
  $db = dbConnect();
  $post = $db->prepare('DELETE FROM posts WHERE id = ?');
  $deletePostLine = $post->execute(array($postId));

  return $deletePostLine;
}

function deleteComment($commentId)
{
  $db = dbConnect();
  $comment = $db->prepare('DELETE FROM comments WHERE id = ?');
  $deleteCommentLine = $comment->execute(array($commentId));

  return $deleteCommentLine;
}