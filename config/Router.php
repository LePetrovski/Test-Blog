<?php

namespace App\config;

use App\src\controller\BackController;
use App\src\controller\ErrorController;
use App\src\controller\FrontController;

class Router
{

  private $backController;
  private $frontController;
  private $errorController;

  public function __construct()
  {
    $this->backController = new BackController();
    $this->frontController = new FrontController();
    $this->errorController = new ErrorController();
  }

  public function run()
  {
    try{
      if(isset($_GET['route']))
      {
        if($_GET['route'] === 'post'){
          $this->frontController->post($_GET['postId']);
        }
        else if($_GET['route'] === "addComment") {
          $this->frontController->addComment($_GET['postId'], $_POST);
        }
        else if($_GET['route'] === "reportComment") {
          $this->frontController->reportComment($_GET['commentId'], $_GET['postId']);
        }
        else if($_GET['route'] === "addPost") {
          $this->backController->addPost($_POST);
        }
        else if($_GET['route'] === "updatePost") {
          $this->backController->updatePost($_POST, $_GET['postId']);
        }
        else if($_GET['route'] === "deletePost") {
          $this->backController->deletePost($_GET['postId']);
        }
        else if($_GET['route'] === "resetReport") {
          $this->backController->resetReport($_GET['commentId'], $_GET['postId']);
        }
        else if($_GET['route'] === "deleteComment") {
          $this->backController->deleteComment($_GET['commentId'], $_GET['postId']);
        }
        else if($_GET['route'] === "login") {
          $this->backController->login($_POST);
        }
        else if($_GET['route'] === "destroy") {
          $this->backController->destroy();
        }
        else{
          $this->errorController->unknown();
        }
      }
      else{
        $this->frontController->home();
      }
    }
    catch (Exception $e)
    {
      $this->errorController->error();
    }
  }
}
