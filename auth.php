<?php
require_once("templat/header.php");
?>
<div id="main-container" class="container-fluid">

  <div class="col-md-12">
    <div class="row" id="auth-row">
      <div class="col-md-4" id="login-container">
        <h2>Entrar</h2>
        <form action="" method="post">
          <div class="form-group">
            <input type="hidden" value="login" name="type">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu email" required>
          </div>
          <div class="form-group">
            <label for="password">Senha:</label>
            <input type="text" class="form-control" name="passoword" id="password" placeholder="Digite sua senha" required>
          </div>
          <input type="submit" class="card-btn" value="Entrar">
        </form>
      </div>
      <div class="col-md-4" id="register-container">
        <form action="" method="post">
          <h2>Registrar-se</h2>
          <input type="hidden" value="register" name="type">

          <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Digite seu nome" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="sobrenome">Sobrenome:</label>
            <input type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="Digite seu sobrenome" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Digite seu email" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" class="form-control" name="passoword" id="password" placeholder="Digite sua senha" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="confirmpassoword">Confirmar senha:</label>
            <input type="password" class="form-control" name="confirmpassoword" id="confirmpassoword" placeholder="Confirme sua senha" required autocomplete="off">
          </div>
          <input type="submit" class="card-btn btn-lg" value="Cadastrar">
        </form>




      </div>


      <div class="col-md-4" id="register-container">

      </div>
    </div>
  </div>

</div>

<?php
require_once("templat/footer.php");
?>