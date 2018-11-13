<?php $title = 'Post'; ?>

<?php ob_start(); ?>

<div class="posts">
  <button><a href="admin.php?action=writePost">Créer un billet</a></button><br />


<?php
while ($post = $posts->fetch())
{
  ?>
  <div class="post">
    <h3>
      <?= strip_tags($post['title']) ?>
      <em>le <?= $post['date_creation_fr'] ?></em>
    </h3>
    <a href="admin.php?action=modify&id=<?php echo $post['id']; ?>">Modifier</a> -
    <a href="admin.php?action=canDelete&id=<?php echo $post['id']; ?>">Supprimer</a>
  </div>

  <?php
}
$posts->closeCursor();
?>

  <h2>Commentaires signalés</h2>

  <?php
    while ($comment = $comments->fetch())
    {
    ?>
      <p><strong><?php echo strip_tags($comment['author']); ?></strong> le <?php echo strip_tags($comment['date_comment_fr']); ?></p>
      <p><?php echo nl2br(strip_tags($comment['comment'])); ?></p>
      <strong>Message signalé: <?php echo $comment['report_comment']?> fois</strong> - <a href="admin.php?action=deleteCom&id=<?php echo $comment['id']; ?>">Supprimer ce commentaire</a> -
      <a href="admin.php?action=resetCom&id=<?php echo $comment['id']; ?>">Annuler le signalement</a>
    <?php
    }
      $comments->closeCursor();
    ?>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>