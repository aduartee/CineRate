<?php
require_once("templat/header.php");
require_once("dao/UserDAO.php");
require_once("models/Message.php");
require_once("models/Users.php");

$user = new User();
$userDao = new UserDAO($conn, $BASE_URL);
$userData = $userDao->verifyToken(true);
$message = new Message($BASE_URL);
?>

<div id="main-container" class="container-fluid">

    <div class="offset-md-4 col-md-4 new-movie-container">
        <h1 class="page-title">Adicionar Filme</h1>
        <p class="page-description">Adicione aqui sua crítica</p>
        <form method="POST" action="<?= $BASE_URL ?>movieprocess.php" id="add-movie-form" enctype="multipart/form-data">
            <input type="hidden" name="type" value="create">

            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" class="form-control" id="title" name="titulo" placeholder="Digite o Título do filme">
            </div>

            <div class="form-group">
                <label for="tamanho">Duração:</label>
                <input type="text" class="form-control" id="tamanho" name="tamanho" placeholder="Digite a duração do filme">
            </div>

            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <select class="form-control" id="categoria" name="categoria" placeholder="Digite a duração do filme">
                    <option value="">Selecione</option>
                    <option value="Ação">Ação</option>
                    <option value="Comédia">Comédia</option>
                    <option value="Drama">Drama</option>
                    <option value="Romance">Romance</option>
                    <option value="Terror">Terror</option>
                </select>
            </div>

            <div class="form-group">
                <label for="trailer">Trailer:</label>
                <input type="text" class="form-control" id="trailer" name="trailer" placeholder="Cole aqui o link do trailer no YouTube">
            </div>

            <div class="form-group">
                <label for="imagem">Imagem:</label>
                <input type="file" class="form-control" id="imagem" name="imagem">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea class="form-control" id="descricao" name="descricao" placeholder="Descreva aqui o filme"></textarea>
            </div>

            <input type="submit" class="card-btn btn-lg" value="Adicionar critica">

        </form>
    </div>
</div>

<?php
require_once("templat/footer.php");
?>
