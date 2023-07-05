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

    if(isset($_FILES["imagem"]) && !empty($_FILES["imagem"]["tmp_name"])){
        $imagem = $_FILES["imagem"];
        $imgTypes = ["image/jpg", "image/jpeg", "image/png"];
        $jpgArray = ["image/jpg", "image/jpeg"];

        if(in_array($imagem["type"], $imgTypes)){

            if(in_array($imagem, $jpgArray )){

                $imageFile = imageCreateFromJpeg($imagem["tmp_name"]);

            } else{
                $imageFile = imageCreateFromPng($imagem["tmp_name"]);

            }

            $imageName = $user->generateImageName();

            imagejpeg($imageFile, "img/users/" . $imageName, 100);

            $userData->imagem = $imageName;


        } else{ 
            $message->setMessage("Imagem inválida, formato está incorreto. Formatos permtidos: png, jpeg e jpg", "error", "back");

        }
    }

    $userDao->update($userData);



} else if($type == "changepassword"){ 

}else{ 
    $message->setMessage("Faça login no sistema para acessar essa pagina", "error", "index.php");
}

?>
