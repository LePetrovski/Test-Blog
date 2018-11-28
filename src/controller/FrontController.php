<?php

namespace App\src\controller;

use App\src\DAO\CommentDAO;
use App\src\DAO\PostDAO;
use App\src\model\View;

class FrontController
{
  private $postDAO;
  private $commentDAO;
  private $view;

  public function __construct()
  {
    $this->postDAO = new PostDAO();
    $this->commentDAO = new CommentDAO();
    $this->view = new View();
  }

  public function home()
  {
    $posts = $this->postDAO->getListPosts();
    $this->view->render('home', [
      'posts' => $posts
    ]);
  }

  public function post($postId)
  {

    $post = $this->postDAO->getPost($postId);
    $comments = $this->commentDAO->getComments($postId);
    $this->view->render('single', [
      'post' => $post,
      'comments' => $comments,
    ]);
  }

  public function addComment($postId, $comment)
  {
    $secret = "6LdbXn0UAAAAABr6LmkSY6mSpReh_FRKr-6TXqoP";
    $response = $_POST['g-recaptcha-response'];
    $remoteip = $_SERVER['REMOTE_ADDR'];

    $api_url = "https://www.google.com/recaptcha/api/siteverify?secret="
        . $secret
        . "&response=" . $response
        . "&remoteip=" . $remoteip ;

    $decode = json_decode(file_get_contents($api_url), true);

    if ($decode['success'] == true) {
      $this->commentDAO->addComment($postId, $comment);
      header('Location: ../public/index.php?route=post&postId='. $postId);
    } else {
      header('Location: ../public/index.php?route=post&postId='. $postId);
    }
  }

  public function reportComment($commentId, $postId)
  {
    $this->commentDAO->reportComment($commentId);
    header('Location: ../public/index.php?route=post&postId='. $postId);
  }
}