<?php

require_once("global.php");
require_once("db.php");
require_once("dao/UserDAO.php");
require_once("models/Message.php");
require_once("models/Users.php");

$message = new Message($BASE_URL);

$userDao = new UserDAO($conn, $BASE_URL);

$type = filter_input(INPUT_POST, "type");


if ($type == "register") {

    $nome = filter_input(INPUT_POST, "nome");
    $sobrenome = filter_input(INPUT_POST, "sobrenome");
    $email = filter_input(INPUT_POST, "email");
    $senha = filter_input(INPUT_POST, "senha");
    $confirmasenha = filter_input(INPUT_POST, "confirmasenha");

    if ($nome &&  $sobrenome &&  $email &&  $senha) {

        if ($senha === $confirmasenha) {

            if ($userDao->findByEmail($email) === false) {

                $user = new User();
                $userToken = $user->generateToken();
                $finalPassword = $user->generatePassword($senha);

                $user->nome = $nome;
                $user->sobrenome = $sobrenome;
                $user->email = $email;
                $user->senha = $finalPassword;
                $user->token = $userToken;

                $auth = true;

                $userDao->create($user, $auth);
                
                echo "inserido";
            } else {
                $message->setMessage("Esse email já foi cadastrado no sistema", "error", "back");
            }
        } else if ($senha != $confirmaSenha) {
            $message->setMessage("As senhas não são iguais", "error", "back");
        }
    }
    
} else if ($type === "login") {
    
} else {
    $message->setMessage("Por favor preencha todos os campos", "error", "back");
}
