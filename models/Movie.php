<?php
    class Movie{
        public $id;
        public $titulo;
        public $imagem;
        public $categoria;
        public $descricao;
        public $tamanho;
        public $trailer;
        public $users_id;

        public function generateImageName(){
            return bin2hex(random_bytes(50)) . ".jpeg";
        }

    }

    interface MovieDAOInterface{
        public function buildMovie($data);
        public function getLatesMovies();
        public function getMoviesByCategory();
        public function getMoviesByUserId();
        public function findAll();
        public function findById($id);
        public function findByTitle($titulo);
        public function create(Movie $movie);
        public function update(Movie $movie);
        public function destroy($id);



    }
?>