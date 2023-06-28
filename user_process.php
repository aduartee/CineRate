<?php 

require_once("global.php");
require_once("db.php");
require_once("dao/UserDAO.php");
require_once("models/Message.php");
require_once("models/Users.php");

$userDao = new UserDAO($conn, $BASE_URL);

$message = new Message($BASE_URL);

$type = filter_input(INPUT_POST, "type");

if($type == "update"){
    
    $userData = $userDao->verifyToken();

    $nome = filter_input(INPUT_POST, "nome");
    $sobrenome = filter_input(INPUT_POST, "sobrenome");
    $email = filter_input(INPUT_POST, "email");
    $bio = filter_input(INPUT_POST, "bio");

    $user = new User();

    $userData->nome = $nome;
    $userData->sobrenome = $sobrenome;
    $userData->email = $email;
    $userData->bio = $bio;

    $userDao->update($userData);



} else if($type == "changepassword"){ 

}else{ 
    $message->setMessage("Faça login no sistema para acessar essa pagina", "error", "index.php");
}

?>
