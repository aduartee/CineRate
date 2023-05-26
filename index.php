<?php
require_once("global.php");
require_once("db.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>CineRate</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?= $BASE_URL ?>img/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="css/style.css">
  <!-- Bootstrap !-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.css" integrity="sha512-bR79Bg78Wmn33N5nvkEyg66hNg+xF/Q8NA8YABbj+4sBngYhv9P8eum19hdjYcY7vXk/vRkhM3v/ZndtgEXRWw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Font awesome  !-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <header>
    <nav id="main-navbar" class="navbar navbar-expand-lg">
      <a href="<?= $BASE_URL ?>" class="navbar-brand">
        <img href="<?= $BASE_URL ?>" src="img/logo.png" id="logo">
        <span id="cineride-title">CineRide</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <form action="" method="get" id="search-form" class="d-flex align-items-center">
        <input type="text" name="query" id="search" class="form-control mr-sm-2" type="search" placeholder="Buscar Filmes" aria-label="Search">
        <button class="btn my-2 my-sm-0" type="submit">
          <i class="fas fa-search"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="<?= $BASE_URL ?>auth.php" class="nav-link"> Entrar / Cadastrar</a>
            </li>
          </ul>
        </div>
    </nav>
  </header>
  <div id="main-container" class="container-fluid">

  </div>
  <footer id="footer">
    <div class="social-container">
      <ul class="social-conatiner">
        <li>
          <a href="#" class="fab fa-facebook-square"> </a>
        </li>
        <li>
          <a href="#" class="fab fa-youtube"> </a>
        </li>
        <li>
          <a href="#" class="fab fa-twitter-square"> </a>
        </li>
      </ul>
    </div>
    <div id="footer-links-container">
      <li><a href="#">Adicionar Filme</a></li>
      <li><a href="#">Adicionar critica</a></li>
      <li><a href="#">Entrar/registrar</a></li>
    </div>
    <p>&copy; 2023 Arthur Duarte</p>
  </footer>

  </i>
  <!-- Bootstrap !-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.bundle.js" integrity="sha512-gMrnU9iM+azBQtrSC8kTJy6+g+hjaIHnElQmb41QeHNTGYjbbtm0BptpIMgXYpS6iyWq9bPkxrcqgK8aqRsjAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>