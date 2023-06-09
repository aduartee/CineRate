<?php

class User
{
    public $id;
    public $nome;
    public $sobrenome;
    public $email;
    public $senha;
    public $imagem;
    public $bio;
    public $token;

    public function getFullName($user){
        return $user->nome . " " . $user->sobrenome;
    }

    public function generateToken(){
        return bin2hex(random_bytes(50));
    }

    public function generatePassword($senha){
        return password_hash($senha, PASSWORD_DEFAULT);
    }

    public function generateImageName(){
        return bin2hex(random_bytes(50)) . ".jpeg";
    }
}

interface UserDAOInterface
{
    public function buildUser($data);
    public function create(User $user, $authUser = false);
    public function update(User $user, $redirect = true);
    public function findByToken(User $token);
    public function verifyToken($protected = false);
    public function setTokenToSession($token, $redirect = true);
    public function authenticateUser($email, $senha);
    public function findByEmail($email);
    public function findById($id); 
    public function destroyToken();
    public function changePassword(User $senha);
}
