<?php $title = 'Delete'; ?>

<?php ob_start(); ?>

  <h1>SUPPRESSION DU BILLET: <?php echo strtoupper($post['title']); ?></h1>

  <div class="news">
    <h3>
      <?php echo strip_tags($post['title']); ?>
      <em>le <?php echo $post['date_creation_fr']; ?></em>
    </h3>

    <p>
      <?php
      echo nl2br(strip_tags($post['content']));
      ?>
    </p>
  </div>
  <button><a href="admin.php?action=delete&id=<?php echo $post['id']; ?>">Supprimer</a></button>
  <button><a href="admin.php">Retour</a></button>




<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>