<?php

require('../model/frontend.php');

function listPosts()
{
  $posts = getPosts();

  require('../view/frontend/listPostsView.php');
}

function post()
{
  $post = getPost($_GET['id']);
  $comments = getComments($_GET['id']);

  require('../view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
  $newCommentLines = newComment($postId, $author, $comment);

  if($newCommentLines === false) {
    die('Impossible d\'ajouter le commentaire !');
  }
  else {
    header('Location: index.php?action=post&id=' . $postId);
  }
}