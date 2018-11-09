<?php
require('controller/backend.php');

try{
  if (isset($_GET['action'])) {
    if ($_GET['action'] == 'identification') {
      identification();
    }
  } else {
    identification();
  }
}
catch(exception $e) {
  echo 'Erreur : ' . $e->getMessage();
}