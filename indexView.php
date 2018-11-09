<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>
  <h1>BILLET SIMPLE POUR L'ALASKA</h1>
  <p>Une oeuvre originale de Jean Forteroche:</p>


<?php
while ($data = $req->fetch())
{
  ?>
  <div class="posts">
    <h3>
      <?= strip_tags($data['title']) ?>
      <em>le <?= $data['date_creation_fr'] ?></em>
    </h3>

    <p>
      <?= nl2br(strip_tags($data['content'])) ?>
      <br />
      <em><a href="post.php?id=<?= $data['id'] ?>">Commentaires</a></em>
    </p>
  </div>
  <?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>