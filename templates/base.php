<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?= $title ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--<link rel="stylesheet" href="../public/css/style.css">-->
  <link rel="stylesheet" href="../public/css/normalize.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="../public/css/main.css" />
  <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <noscript><link rel="stylesheet" href="../public/css/noscript.css" /></noscript>
</head>

<body>
    <div id="wrapper" class="fade-in">

      <!-- Intro -->
      <div id="intro">
        <a href="#header" class="scrolly" id="logo"><img src="../public/images/logo5.png" id="logo" alt=""></a>
      </div>

      <!-- Header -->
      <header id="header">
        <a href="index.php" class="logo">FORTEROCHE</a>
      </header>

      <!-- Nav -->
      <nav id="nav">
        <ul class="links">
          <li class="active" id="blog"><a href="#main">LE BLOG</a></li>
          <!--<li><a href="generic.html">Generic Page</a></li>
          <li><a href="elements.html">Elements Reference</a></li>-->
        </ul>
        <ul class="icons">
          <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
          <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
          <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
          <li><a href="#" class="icon fa-github"><span class="label">GitHub</span></a></li>
        </ul>
      </nav>

      <!-- Main -->
      <div id="main">

        <!-- Posts -->
        <section class="posts container-fluid">


              <?= $content ?>




      </div>

      <!-- Footer -->
      <footer id="footer">
        <section>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
              Administration
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <?php if(!isset($_SESSION['admin'])){
                ?>
                <form action="index.php?route=login" method="post">
                  <p>
                    <label for="pseudo">Identifiant:</label><input type="text" name="pseudo"><br/>
                    <label for="password">Mot de Passe:</label><input type="password" name="password"><br/>
                    <input type="submit" value="Valider"/>
                  </p>
                </form>
                <?php
              }
              ?>
              <?php if(isset($_SESSION['admin'])) {
                ?>
                <p>Connecté !</p>
                <button><a href="index.php?route=destroy">Déconnexion</a></button>
                <?php
              }
              ?>
            </div>
          </div>
        </section>
        <section class="split contact">
          <section>
            <h3>Email</h3>
            <p><a href="#">info@untitled.tld</a></p>
          </section>
          <section>
            <h3>Social</h3>
            <ul class="icons alt">
              <li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
              <li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
              <li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
              <li><a href="#" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
            </ul>
          </section>
        </section>
      </footer>

      <!-- Copyright -->
      <div id="copyright">
        <ul><li>&copy; FORTEROCHE</li><li>Design: <a href="https://html5up.net">HTML5 UP & PETROVAULT</a></li></ul>
      </div>

    </div>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
  <script src="../public/js/tinyMCE_Start.js"></script>
    <script src="../public/js/jquery.min.js"></script>
    <script src="../public/js/jquery.scrollex.min.js"></script>
    <script src="../public/js/jquery.scrolly.min.js"></script>
    <script src="../public/js/browser.min.js"></script>
    <script src="../public/js/breakpoints.min.js"></script>
    <script src="../public/js/util.js"></script>
    <script src="../public/js/main.js"></script>
</html>