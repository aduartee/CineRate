<?php

require_once("global.php");
require_once("db.php");
require_once("dao/UserDAO.php");
require_once("models/Message");
require_once("models/Users.php");

$message = new Message($BASE_URL);

$userDao = new UserDao($conn, $BASE_URL);

$type = filter_input(INPUT_POST, "type");


if ($type == "register") {

    $nome = filter_input(INPUT_POST, "name");
    $sobrenome = filter_input(INPUT_POST, "sobrenome");
    $email = filter_input(INPUT_POST, "email");
    $senha = filter_input(INPUT_POST, "password");
    $confirmaSenha = filter_input(INPUT_POST, "confirmpassoword");

    if ($nome &&  $sobrenome &&  $email &&  $senha) {
        if($senha === $confirmaSenha){ 
            if($userDao->findByEmail($email) === false){
                echo "Nenhum usuario encontrado";
            } else{ 
                $message->setMessage("Esse email já foi cadastrado no sistema", "error", "back");
            }
        } else if($senha =! $confirmaSenha){
            $message->setMessage("As senhas não são iguais", "error", "back");
        }

    }
} else if ($type === "login") {

} else {
    $message->setMessage("Por favor preencha todos os campos", "error", "back");
}
