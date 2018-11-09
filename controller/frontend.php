<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
  $postManager = new PostManager();
  $posts = $postManager->getPosts();

  require('view/frontend/listPostsView.php');
}

function post()
{
  $postManager = new PostManager();
  $commentManager = new CommentManager();

  $post = $postManager->getPost($_GET['id']);
  $comments = $commentManager->getComments($_GET['id']);

  require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment, $report)
{
  $commentManager = new CommentManager();

  $newCommentLines = $commentManager->newComment($postId, $author, $comment, $report);

  if($newCommentLines === false) {
    throw new Exception('Impossible d\'ajouter le commentaire !');
  }
  else {
    header('Location: index.php?action=post&id=' . $postId);
  }
}

function report($commentId)
{
  $commentManager = new CommentManager();

  $report = $commentManager->reportComment($commentId);

  if($report === false) {
    throw new Exception('Impossible de signaler ce commentaire !');
  }
  else {
    header('Location: index.php?action=post&id=' . $_GET['id']);
  }
}