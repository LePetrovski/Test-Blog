<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AdminManager.php');

function identification()
{
  require('view/backend/loginView.php');
}

function login()
{
  $adminManager = new AdminManager();

  $admin = $adminManager->logIn($_GET['pseudo']);
}

function adminTab()
{
  $postManager = new PostManager();
  $commentManager = new CommentManager();

  $posts = $postManager->getPosts();
  $comments = $commentManager->getReportedComments();

  require('view/backend/adminView.php');
}

function modify($postId)
{
 $postManager = new PostManager();

 $post = $postManager->getPost($postId);

 require('view/backend/updateView.php');
}

function update($title, $content, $postId)
{
  $postManager = new PostManager();

  $update = $postManager->modifyPost($title, $content, $postId);

  if ($update === false) {
    throw new Exception('Impossible de modifier le post !');
  } else {
    header('Location: admin.php?action=modify&id=' . $postId);
  }
}

function canDelete($postId)
{
    $postManager = new PostManager();

    $post = $postManager->getPost($postId);

    require('view/backend/deleteView.php');
}

function delete($postId)
{
    $postManager = new PostManager();

    $delete = $postManager->deletePost($postId);

  if ($delete === false) {
    throw new Exception('Impossible de supprimer le post !');
  } else {
    header('Location: admin.php');
  }
}

function writePost()
{
  require('view/backend/addPostView.php');
}

function addPost($title, $content)
{
  $postManager = new PostManager();

  $add = $postManager->newPost($title, $content);

  if ($add === false) {
    throw new Exception('Impossible d\'ajouter ce billet!');
  } else {
    header('Location: admin.php');
  }
}

function deleteCom($commentId)
{
  $commentManager = new CommentManager();

  $delete = $commentManager->deleteComment($commentId);

  if ($delete === false) {
    throw new Exception('Impossible de remettre à zéro le signalement');
  } else {
    header('Location: admin.php');
  }
}

function resetCom($commentId)
{
  $commentManager = new CommentManager();

  $reset = $commentManager->resetComment($commentId);

  if ($reset === false) {
    throw new Exception('Impossible de remettre à zéro le signalement');
  } else {
    header('Location: admin.php');
  }
}
