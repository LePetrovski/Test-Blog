<?php $title = 'Post'; ?>

<?php ob_start(); ?>
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

<form action="index.php?action=addComment&id=<?= $post['id']; ?>" method="post">
  <div>
    <label for="author">Pseudo</label> : <input type="text" name="author" id="author" /><br />
    <label for="comment">Message</label> :  <textarea type="text" name="comment" class="message" ></textarea>

    <input type="submit" value="Envoyer" /><br />
  </div>

<div class="comments">
<?php
while ($comment = $comments->fetch())
{
  ?>
  <p><strong><?= strip_tags($comment['author']) ?></strong> le <?= $comment['date_comment_fr'] ?></p>
  <p><?= nl2br(strip_tags($comment['comment'])) ?></p>
  <a href="index.php?action=report&comment=<?= $comment['id']; ?>&id=<?= $post['id']; ?>">
    <small>Signaler ce commentaire</small>
  </a><br />
  <?php
}
$comments->closeCursor();
?>
</div>

  <button><a href="index.php">Retour</a></button>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>