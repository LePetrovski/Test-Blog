<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>
  <h1>Espace Administration</h1>
  <p>Veuillez-vous connecter pour accéder à votre espace personnalisé :</p>

  <form action="admin.php?action=login" method="post">
    <p>
      <label for="pseudo">Identifiant</label> : <input type="text" name="pseudo"><br />
      <label for="password">Mot de Passe</label> : <input type="password" name="password"><br />
      <input type="submit" value="Valider" />
    </p>
  </form>

  <button><a href="index.php">Retour</a></button>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>