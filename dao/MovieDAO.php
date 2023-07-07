<?php

require_once("models/Movie.php");
require_once("models/Message.php");

class MovieDAO implements MovieDAOInterface
{
    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn, $url)
    {
        $this->conn = $conn;
        $this->url = $url;
        $this->message = new Message($url);
    }

    public function buildMovie($data)
    {
        $movie = new Movie();

        $movie->id = $data["id"];
        $movie->titulo = $data["titulo"];
        $movie->descricao = $data["descricao"];
        $movie->categoria = $data["categoria"];
        $movie->tamanho = $data["tamanho"];
        $movie->trailer = $data["trailer"];
        $movie->users_id = $data["users_id"];
        $movie->imagem = $data["imagem"];

        return $movie;
    }
    public function getLatesMovies()
    {
    }
    public function getMoviesByCategory()
    {
    }
    public function getMoviesByUserId()
    {
    }
    public function findAll()
    {
    }
    public function findById($id)
    {
    }
    public function findByTitle($titulo)
    {
    }
    public function create(Movie $movie) {
        $stmt = $this->conn->prepare("INSERT INTO filmes (
                                      titulo, descricao,image,
                                      trailer,categoria,tamanho,
                                      users_id)
                                      VALUES (
                                      :titulo, :descricao, :image, 
                                      :trailer, :categoria, :tamanho,
                                      :users_id)");

        $stmt->bindParam(":titulo", $movie->titulo);                             
        $stmt->bindParam(":descricao", $movie->descricao);                            
        $stmt->bindParam(":image", $movie->imagem);                            
        $stmt->bindParam(":trailer", $movie->trailer);                            
        $stmt->bindParam(":categoria", $movie->categoria);                            
        $stmt->bindParam(":tamanho", $movie->tamanho);                            
        $stmt->bindParam(":users_id", $movie->users_id);         
        
        $stmt->execute();

        $this->message->setMessage("O filme  foi adicionado com sucesso", "sucess", "index.php");

    }
    public function update(Movie $movie)
    {
    }
    public function destroy($id)
    {
    }
}
