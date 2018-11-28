<?php
session_start();
?>
<?php
$this->title = "Modifier un chapitre";
?>
<h1 class="titre co-md-12">MODIFIER UN CHAPITRE</h1>
<div class="addPost col-md-12">
  <form method="post" action="../public/index.php?route=updatePost&postId=<?= strip_tags($_GET['postId']);?>">
    <label for="title">Titre</label><br>
    <input type="text" id="title" name="title" value="<?= strip_tags($idPost->getTitle());?>"><br>
    <label for="content">Contenu</label><br>
    <textarea id="content" name="content"><?= strip_tags($idPost->getContent());?></textarea><br>
    <input type="submit" value="Envoyer" id="submit" name="submit">
  </form>
  <a href="../public/index.php#blog">Retour à l'accueil</a>
</div>
