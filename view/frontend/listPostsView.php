<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>
<div class="posts">
<?php
while ($data = $posts->fetch())
{
  ?>
  <div class="post">
    <h3>
      <?= strip_tags($data['title']) ?>
      <em>le <?= $data['date_creation_fr'] ?></em>
    </h3>

    <p>
      <?= nl2br(strip_tags($data['content'])) ?>
      <br />
      <em><a href="index.php?action=post&id=<?= $data['id'] ?>">Commentaires</a></em>
    </p>
  </div>
  <?php
}
$posts->closeCursor();
?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>