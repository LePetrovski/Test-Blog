<?php
require('controller/backend.php');

try{
  if (isset($_GET['action'])) {
    if ($_GET['action'] == 'identification') {
      identification();
    }elseif ($_GET['action'] == 'login') {
      if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
        login($_POST['pseudo'], $_POST['password']);
      } else {
        throw new Exception('Tous les champs ne sont pas remplis !');
      }
    }elseif ($_GET['action'] == 'adminTab') {
      adminTab();
    }elseif ($_GET['action'] == 'destroy') {
      destroy();
    }elseif ($_GET['action'] == 'modify') {
      if(isset($_GET['id']) && $_GET['id'] > 0) {
        modify($_GET['id']);
       }else {
        throw new Exception('Aucun identifiant de billet envoyé');
      }
    }elseif ($_GET['action'] == 'update') {
      if (isset($_GET['id']) && $_GET['id'] > 0) {
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
          update($_POST['title'], $_POST['content'], $_GET['id']);
        } else {
          throw new Exception('Tous les champs ne sont pas remplis !');
        }
      } else {
        throw new Exception('Aucun identifiant de billet envoyé');
      }
    }elseif ($_GET['action'] == 'canDelete') {
      if (isset($_GET['id']) && $_GET['id'] > 0) {
        canDelete($_GET['id']);
      }else {
        throw new Exception('Aucun identifiant de billet envoyé');
      }
    }elseif ($_GET['action'] == 'delete') {
      if (isset($_GET['id']) && $_GET['id'] > 0) {
        delete($_GET['id']);
      } else {
        throw new Exception('Aucun identifiant de billet envoyé');
      }
    }elseif ($_GET['action'] == 'writePost') {
      writePost();
    }elseif ($_GET['action'] == 'addPost') {
      if (!empty($_POST['title']) && !empty($_POST['content'])) {
        addPost($_POST['title'], $_POST['content']);
      } else {
        throw new Exception('Tous les champs ne sont pas remplis !');
      }
    }elseif ($_GET['action'] == 'deleteCom') {
      if (isset($_GET['id']) && $_GET['id'] > 0) {
        deleteCom($_GET['id']);
      }else {
        throw new Exception('Aucun identifiant de commentaire envoyé');
      }
    }elseif ($_GET['action'] == 'resetCom') {
      if (isset($_GET['id']) && $_GET['id'] > 0) {
        resetCom($_GET['id']);
      }else {
        throw new Exception('Aucun identifiant de commentaire envoyé');
      }
    }
  } else {
    adminTab();
  }
}
catch(exception $e) {
  echo 'Erreur : ' . $e->getMessage();
}