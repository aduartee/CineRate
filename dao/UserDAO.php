<?php 
require_once("models/Users.php");

class UserDAO implements UserDAOInterface{
    public function buildUser($data){

    }
    public function create(User $user, $authUser = false){

    }
    public function update(User $user){

    }
    public function findByToken(User $token) {

    }
    public function verifyToken($protected = false) {

    }
    public function setTokenToSession($token, $redirect = true) {

    }
    public function authenticateUser($email, $senha) {

    }
    public function findByEmail($email) {

    }
    public function findById($id) {

    }
    public function changePassword(User $senha) {

    }

}

?>