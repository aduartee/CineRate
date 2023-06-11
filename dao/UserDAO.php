<?php
require_once("models/Users.php");

class UserDAO implements UserDAOInterface
{
    private $conn;
    private $url;

    public function __construct(PDO $conn, $url)
    {
        $this->conn = $conn;
        $this->url = $url;
    }

    public function buildUser($data)
    {
        $user = new User();

        $user->id = $data["id"];
        $user->nome = $data["name"];
        $user->email = $data["email"];
        $user->senha = $data["senha"];
        $user->imagem = $data["imagem"];
        $user->bio = $data["bio"];
        $user->token = $data["token"];
        return  $user;
    }
    public function create(User $user, $authUser = false)
    {
        $stmt = $this->conn->prepare(" INSERT INTO users(
                                       nome, email, senha, token) 
                                       VALUES ( :nome, :email, :senha, :token)");

        $stmt->bindParam(":nome", $user->nome);
        $stmt->bindParam(":email", $user->email);
        $stmt->bindParam(":senha", $user->senha);
        $stmt->bindParam(":token", $user->token);


        $stmt->execute();
    }
    public function update(User $user)
    {
    }
    public function findByToken(User $token)
    {
    }
    public function verifyToken($protected = false)
    {
    }
    public function setTokenToSession($token, $redirect = true)
    {
    }
    public function authenticateUser($email, $senha)
    {
    }
    public function findByEmail($email)
    {
        if ($email = !"") {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");

            $stmt->bindParam(":email", $email);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $data = $stmt->fetch();
                $user = $this->buildUser($data);
                return $user;
            } else {
                return false;
            }
        }
    }
    public function findById($id)
    {
    }
    public function changePassword(User $senha)
    {
    }
}
