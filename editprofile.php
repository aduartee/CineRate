<?php
require_once("templat/header.php");
require_once("dao/UserDAO.php");

$userDao = new UserDAO($conn, $BASE_URL);

$userData->$userDao->verifyToken(true);
?>


<div id="main-container" class="container-fluid">

  <h2>Edição de perfil</h2>

</div>

<?php
require_once("templat/footer.php");
?>