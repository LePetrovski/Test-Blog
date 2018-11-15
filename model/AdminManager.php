<?php
require_once('model/Manager.php');

class AdminManager extends Manager
{
  public function logIn($pseudo)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT password FROM admin WHERE pseudo = :pseudo');
    $req->execute(array(
      'pseudo' => $pseudo));
    $login = $req->fetch();

    return $login;
  }
}