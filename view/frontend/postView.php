<?php $title = 'Post'; ?>

<?php ob_start(); ?>
  <h1>BILLET SIMPLE POUR L'ALASKA</h1>
  <p>Une oeuvre originale de Jean Forteroche:</p>


  <div class="posts">
    <h3>
      <?= strip_tags($post['title']) ?>
      <em>le <?= $post['date_creation_fr'] ?></em>
    </h3>

    <p>
      <?= nl2br(strip_tags($post['content'])) ?>
    </p>
  </div>

  <h2>Commentaires</h2>

<?php
while ($comment = $comments->fetch())
{
  ?>
  <p><strong><?= strip_tags($comment['author']) ?></strong> le <?= $comment['date_comment_fr'] ?></p>
  <p><?= nl2br(strip_tags($comment['comment'])) ?></p>
  <?php
}
$comments->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>