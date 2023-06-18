<?php
require_once("global.php");
require_once("db.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");


$message = new Message($BASE_URL);

$flashMessage = $message->getMessage();

if (!empty($flashMessage["msg"])) {
  $message->clearMessage();
}

$userDao = new UserDAO($conn, $BASE_URL);

$userData = $userDao->verifyToken(false);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>CineRate</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?= $BASE_URL ?>img/favicon.png" type="image/x-icon">
  <!-- Jquey -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Css !-->
  <link rel="stylesheet" href="css/style.css">
  <!-- Preloader !-->
  <link rel="stylesheet" href="css/preloader.css">
  <!-- Bootstrap !-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.css" integrity="sha512-bR79Bg78Wmn33N5nvkEyg66hNg+xF/Q8NA8YABbj+4sBngYhv9P8eum19hdjYcY7vXk/vRkhM3v/ZndtgEXRWw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Font awesome  !-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="js/preloader.js"></script>
</head>

<body>
  <div id="preloader">
    <div class="spinner"></div>
    <div class="fill"></div>
  </div>

  <header>
    <nav id="main-navbar" class="navbar navbar-expand-lg">
      <a href="<?= $BASE_URL ?>" class="navbar-brand">
        <span id="cinerate-title">CineRate</span>
        <img href="<?= $BASE_URL ?>" src="img/logo.png" id="logo">

      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbar">
        <form action="" method="get" id="search-form" class="d-flex align-items-center">
          <input type="text" name="query" id="search" class="form-control mr-sm-2" type="search" placeholder="Buscar Filmes" aria-label="Search">
          <button class="btn my-2 my-sm-0" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </form>
        <ul class="navbar-nav">

          <?php if ($userData) : ?>
            <li class="nav-item">
              <a href="<?= $BASE_URL ?>novofilme.php" class="nav-link">
                <i class="far fa-plus-square"></i>Incluir filme
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= $BASE_URL ?>dashbord.php" class="nav-link">
                Meus filmes
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= $BASE_URL ?>editprofile.php" class="nav-link bold">
                <?= $userData->nome ?>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= $BASE_URL ?>logout.php" class="nav-link bold">
                Sair
              </a>
            </li>


          <?php else: ?>
            <li class="nav-item">
              <a href="<?= $BASE_URL ?>auth.php" class="nav-link">
                Entrar / Cadastrar
              </a>
            </li>
            <?php endif; ?> 
          </ul>
      </div>
    </nav>
  </header>
  <?php if (!empty($flashMessage["msg"])) : ?>
    <div class="msg-container">
      <p class="msg <?= $flashMessage['type'] ?>"><?= $flashMessage["msg"] ?></p>
    </div>
  <?php endif; ?>