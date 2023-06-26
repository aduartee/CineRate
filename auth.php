<?php
require_once("templat/header.php");
?>
<div id="main-container" class="container-fluid">

  <div class="col-md-12">
    <div class="row" id="auth-row">
      <div class="col-md-4" id="login-container">
        <h2>Entrar</h2>
        <form action="<?=$BASE_URL?>auth_process.php" method="post">
          <div class="form-group">
            <input type="hidden" value="login" name="type">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu email" required>
          </div>
          <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha" required>
          </div>
          <input type="submit" class="card-btn" value="Entrar">
        </form>
      </div>
      <div class="col-md-4" id="register-container">
        <form action = "<?=$BASE_URL?>auth_process.php" method="post">
          <h2>Registrar-se</h2>
          <input type="hidden" value="register" name="type">

          <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" name="nome" id="name" placeholder="Digite seu nome" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="sobrenome">Sobrenome:</label>
            <input type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="Digite seu sobrenome" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu email" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" class="form-control" name="senha" id="password" placeholder="Digite sua senha" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="confirmasenha">Confirmar senha:</label>
            <input type="password" class="form-control" name="confirmasenha" id="confirmpassoword" placeholder="Confirme sua senha" required autocomplete="off">
          </div>
          <div id="password-bar"></div>
          <input type="submit" id="register-button" class="card-btn btn-lg" value="Cadastrar">
        </form>




      </div>


      <div class="col-md-4" id="register-container">

      </div>
    </div>
  </div>
  <script src="js/alertaValidaSenha.js"></script>

</div>

<?php
require_once("templat/footer.php");
?>