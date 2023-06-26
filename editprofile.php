<?php
require_once("templat/header.php");
require_once("dao/UserDAO.php");
require_once("models/Users.php");

$userDao = new UserDAO($conn, $BASE_URL);
$user = new User();
$fullName = $user->getFullName($userData);

$userDao->verifyToken(true);

// Caso a imagem não exista, é usada uma imagem padrão
if ($userData->imagem == "") {
  $userData->imagem = "users.jpeg";
}
?>

<div id="main-container" class="container-fluid">
  <div class="row">
    <div class="col-md-6">
      <!-- Exibe o nome completo do Usuário -->
      <h1><?= $fullName ?></h1>
      <p class="page-description">Altere seus dados no formulário abaixo:</p>

      <form action="<?= $BASE_URL ?>user_process.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="type" value="update">

        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" placeholder="Edite seu nome:" value="<?= trim($userData->nome) ?>">
        </div>

        <div class="form-group">
          <label for="sobrenome">Sobrenome</label>
          <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Edite seu sobrenome:" value="<?= trim($userData->sobrenome) ?>">
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control disabled" id="email" readonly name="email" placeholder="Edite seu Email:" value="<?= trim($userData->email) ?>">
        </div>

        <input type="submit" class="btn form-btn" value="Alterar">
      </form>
    </div>

    <div class="col-md-6">
      <div id="profile-image-container" style="background-image: url('<?= $BASE_URL ?>img/users/<?= $userData->imagem ?>');"></div>

      <form action="<?= $BASE_URL ?>user_process.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="imagem">Foto:</label>
          <br />
          <input type="file" class="form-control-file" name="imagem">
        </div>

        <div class="form-group">
          <label for="bio">Sobre você:</label>
          <textarea class="form-control" name="bio" id="bio" cols="5" placeholder="Campo onde você pode se descrever melhor"><?= $userData->bio ?></textarea>
        </div>

        <input type="submit" class="btn form-btn" value="Alterar">
      </form>
    </div>
  </div>
</div>

<?php
require_once("templat/footer.php");
?>
