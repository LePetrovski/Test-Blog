<?php $title = 'Update'; ?>

<?php ob_start(); ?>

<h1>MODIFIER LE BILLET: <?= strtoupper($post['title']); ?></h1>

<form action="admin.php?action=update&id=<?= $post['id']; ?>" method="post">
  <p>
    <label for="title">Titre</label> : <input type="text" name="title" id="title" value="<?= $post['title']; ?>" /><br />
    <label for="content">Texte</label> :  <textarea name="content" class="message"><?= strip_tags($post['content']); ?></textarea><br />

    <input type="submit" value="Envoyer" />
  </p>
</form>

<button><a href="admin.php">Retour</a></button>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
