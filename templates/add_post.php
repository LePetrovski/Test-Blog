<?php
$this->title = "Ajouter un article";
?>
<h1 class="titre co-md-12" id="add">AJOUTER UN CHAPITRE</h1>
<div class="addPost col-md-12">
  <form method="post" action="../public/index.php?route=addPost">
    <label for="title">Titre</label><br>
    <input type="text" id="title" name="title" value="<?php
    if(isset($post['title'])){
      echo $post['title'];}
    ?>"><br>
    <label for="content">Contenu</label><br>
    <textarea id="content" name="content"><?php if(isset($post['content'])){ echo $post['content']; } ?></textarea><br>
    <input type="submit" value="Envoyer" id="submit" name="submit">
  </form>
  <a href="../public/index.php#blog">Retour à l'accueil</a>
</div>
