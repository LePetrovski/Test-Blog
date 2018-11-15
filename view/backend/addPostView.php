<?php $title = 'AddPost'; ?>

<?php ob_start(); ?>

  <h1>CREER UN NOUVEAU BILLET</h1>

  <form action="admin.php?action=addPost" method="post">
    <p>
      <label for="title">Titre</label> : <input type="text" name="title" id="title"/><br />
      <label for="content">Texte</label> :  <textarea name="content" class="message"></textarea><br />

      <input type="submit" value="Envoyer" />
    </p>
  </form>

  <button><a href="admin.php?action=adminTab">Retour</a></button>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>