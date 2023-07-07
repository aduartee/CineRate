<?php 

require_once("global.php");
require_once("db.php");
require_once("dao/UserDAO.php");
require_once("dao/MovieDAO.php");
require_once("models/Message.php");
require_once("models/movie.php");

$userDao = new UserDAO($conn, $BASE_URL);

$message = new Message($BASE_URL);

$movieDao = new MovieDAO($conn, $BASE_URL);



$type = filter_input(INPUT_POST, "type");

if($type == "create"){ 
    $userData = $userDao->verifyToken();

    $titulo = filter_input(INPUT_POST, "titulo");
    $descricao = filter_input(INPUT_POST, "descricao");
    $trailer = filter_input(INPUT_POST, "trailer");
    $categoria = filter_input(INPUT_POST, "categoria");
    $tamanho = filter_input(INPUT_POST, "tamanho");
    $tamanho = filter_input(INPUT_POST, "tamanho");


    $movie = new Movie();

    if(!empty($titulo) && !empty($descricao) && !empty($categoria)){
        $movie->titulo = $titulo;
        $movie->descricao = $descricao;
        $movie->trailer = $trailer;
        $movie->categoria = $categoria;
        $movie->tamanho = $tamanho;
        $movie->users_id = $userData->id;

        if(isset($_FILES["imagem"]) && !empty($_FILES["imagem"]["tmp_name"])){
            $image = $_FILES["image"];
            $imgTypes = ["image/jpg", "image/jpeg", "image/png"];
            $jpgArray = ["image/jpg", "image/jpeg"];

            if(in_array($image["type"], $imgTypes)){

                if(in_array($imagem, $jpgArray )){

                    $imageFile = imageCreateFromJpeg($imagem["tmp_name"]);
    
                } else{
                    $imageFile = imageCreateFromPng($imagem["tmp_name"]);

                }

                $imageName = $movie->generateImageName();

                imagejpeg($imageFile, "img/moveis/" . $imageName, 100);
    
                $userData->imagem = $imageName;
            } else{ 
                $message->setMessage("Tipo inválido de imagem", "error", "back");

            }
        }

        $movieDao->create($movie);


    } else{
        $message->setMessage("Você precisa adicionar titulo, descricao e categoria", "error", "back");
    }
    
    
    
} else {
    $message->setMessage("Informações inválidas", "error", "back");
}

?>
 