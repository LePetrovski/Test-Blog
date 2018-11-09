<?php
require('controller/frontend.php');

try{
  if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
      listPosts();
    } elseif ($_GET['action'] == 'post') {
      if (isset($_GET['id']) && $_GET['id'] > 0) {
        post();
      } else {
        throw new Exception('Aucun identifiant de billet envoyé');
      }
    } elseif ($_GET['action'] == 'addComment') {
      if (isset($_GET['id']) && $_GET['id'] > 0) {
        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
          addComment($_GET['id'], $_POST['author'], $_POST['comment'], 0);
        } else {
          throw new Exception('Tous les champs ne sont pas remplis !');
        }
      } else {
        throw new Exception('Aucun identifiant de billet envoyé');
      }
    } elseif ($_GET['action'] == 'report') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
          if (isset($_GET['comment']) && $_GET['comment'] > 0) {
          report($_GET['comment']);
          } else {
            throw new Exception('Le commentaire est introuvable');
            }
        } else {
          throw new Exception('Aucun identifiant de billet envoyé');
        }
      }
  } else {
    listPosts();
  }
}
catch(exception $e) {
  echo 'Erreur : ' . $e->getMessage();
}





