<?php

namespace App\src\controller;

use App\src\DAO\AdminDAO;
use App\src\DAO\CommentDAO;
use App\src\DAO\PostDAO;
use App\src\model\View;

class BackController
{
  private $view;
  private $postDAO;
  private $commentDAO;
  private $adminDAO;

  public function __construct()
  {
    $this->view = new View();
    $this->postDAO = new PostDAO();
    $this->commentDAO = new CommentDAO();
    $this->adminDAO = new AdminDAO();
  }

  public function addPost($post)
  {
    if(isset($post['submit'])) {
      $this->postDAO->addPost($post);
      session_start();
      $_SESSION['add_post'] = 'Le nouveau chapitre a bien été ajouté';
      header('location: ../public/index.php#admin');
    }
    $this->view->render('add_post', [
      'post' => $post
    ]);
  }

  public function updatePost($post, $postId)
  {
    if(isset($post['submit'])) {
      $this->postDAO->updatePost($post, $postId);
      session_start();
      $_SESSION['update_post'] = 'Le chapitre a bien été modifié';
      header('location: ../public/index.php?route=post&postId='.$postId.'#update');
    }
    $idPost = $this->postDAO->getPost($postId);
    $this->view->render('update_post', [
      'idPost' => $idPost
    ]);
  }

  public function deletePost($postId)
  {
    $this->postDAO->deletePost($postId);
    session_start();
    $_SESSION['delete_post'] = 'Le chapitre et ses commentaires ont été supprimés';
    header('location: ../public/index.php#admin');
  }

  public function resetReport($commentId, $postId)
  {
    $this->commentDAO->resetReport($commentId);
    header('Location: ../public/index.php?route=post&postId='. $postId);
  }

  public function deleteComment($commentId, $postId)
  {
    $this->commentDAO->deleteComment($commentId);
    header('Location: ../public/index.php?route=post&postId='. $postId);
  }

  public function login($log)
  {
    extract($log);
    $admin = $this->adminDAO->logIn($pseudo);

    $isPasswordCorrect = password_verify($password, $admin->getPassword());

    if (!$admin) {
      session_start();
      $_SESSION['wrong'] = '1Mauvais identifiant ou mot de passe !';
      header('Location: ../public/index.php');
    }else {
      if ($isPasswordCorrect) {
        session_start();
        $_SESSION['status'] = 'Vous êtes connectés';
        $_SESSION['admin'] = 'Rochefort';
        header('Location: ../public/index.php#admin');
      }else {
        session_start();
        $_SESSION['wrong'] = '2Mauvais identifiant ou mot de passe !';
        header('Location: ../public/index.php');
      }
    }
  }

  public function destroy()
  {
    session_start();

    $_SESSION = array();
    session_destroy();
    unset($_SESSION);

    header('Location: index.php#blog');
  }
}