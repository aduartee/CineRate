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

<div id="main-container" class="container-fluid edit-profile-page">
    <div class="row">
        <div class="col-md-6">
            <!-- Exibe o nome completo do Usuário -->
            <h1><?= $fullName ?></h1>
            <p class="page-description">Altere seus dados no formulário abaixo:</p>

            <form action="<?= $BASE_URL ?>user_process.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="type" value="update">

                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Edite seu nome" value="<?= trim($userData->nome) ?>">
                </div>

                <div class="form-group">
                    <label for="sobrenome">Sobrenome:</label>
                    <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Edite seu sobrenome" value="<?= trim($userData->sobrenome) ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control disabled" id="email" readonly name="email" placeholder="Edite seu email" value="<?= trim($userData->email) ?>">
                </div>

                <input type="submit" class="card-btn btn-lg" value="Alterar">
            </form>
        </div>

        <div class="col-md-6">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div id="profile-image-container" style="background-image: url('<?= $BASE_URL ?>img/users/<?= $userData->imagem ?>');"></div>

                    <form action="<?= $BASE_URL ?>user_process.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="imagem">Foto:</label>
                            <input type="file" class="form-control-file" name="imagem">
                        </div>

                        <div class="form-group">
                            <label for="bio">Sobre você:</label>
                            <textarea class="form-control" name="bio" id="bio" cols="5" rows="3" placeholder="Descreva-se aqui"><?= $userData->bio ?></textarea>
                        </div>

                        <input type="submit" class="card-btn btn-lg" value="Alterar">
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-4">
            <div id="change-password-container">
                <h2>Alterar senha</h2>
                <p class="page-description">Digite sua nova senha:</p>
                <form action="<?= $BASE_URL ?>user_process.php" method="post">
                    <input type="hidden" name="type" value="changepassword">

                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua nova senha">
                    </div>

                    <div class="form-group">
                        <label for="confirmasenha">Confirme a senha:</label>
                        <input type="password" class="form-control" id="confirmasenha" name="confirmasenha" placeholder="Confirme sua nova senha">
                    </div>

                    <input type="submit" class="card-btn btn-lg" value="Alterar a senha">
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require_once("templat/footer.php");
?>