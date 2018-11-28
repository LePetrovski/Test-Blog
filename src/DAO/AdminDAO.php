<?php
namespace App\src\DAO;

use App\src\model\Admin;

class AdminDAO extends DAO
{
  public function logIn($pseudo)
  {
    $sql = 'SELECT * FROM admin WHERE pseudo = ?';
    $results = $this->sql($sql, [$pseudo]);
    $row = $results->fetch();
    if($row){
      return $this->buildObject($row);
    } else {
      echo 'Aucun article existant avec cet identifiant';
    }
  }

  private function buildObject(array $row)
  {
    $admin = new Admin();
    $admin->setId($row['id']);
    $admin->setPseudo($row['pseudo']);
    $admin->setPassword($row['password']);
    return $admin;
  }
}