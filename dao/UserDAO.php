<?php
require_once("models/Users.php");

class UserDAO implements UserDAOInterface
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

    public function buildUser($data)
    {
        $user = new User();

        $user->id = $data["id"];
        $user->nome = $data["nome"];
        $user->sobrenome = $data["sobrenome"];
        $user->email = $data["email"];
        $user->senha = $data["senha"];
        // $user->imagem = $data["imagem"];
        $user->bio = $data["bio"];
        $user->token = $data["token"];

        // // Verificar se a chave "imagem" está definida
        // if (isset($data["imagem"])) {
        //     $user->imagem = $data["imagem"];
        // } else {
        //     // Definir um valor padrão ou lidar com a ausência de imagem
        //     $user->imagem = "imagem_padrao.jpg";
        //     // Ou
        //     $user->imagem = null;
        //     // Ou qualquer outra lógica que faça sentido para o seu aplicativo
        // }

        return  $user;
    }


    public function create(User $user, $authUser = false)
    {
        $stmt = $this->conn->prepare(" INSERT INTO users(
                                       nome, sobrenome, email, senha, token) 
                                       VALUES ( :nome, :sobrenome,:email, :senha, :token)");

        $stmt->bindParam(":nome", $user->nome);
        $stmt->bindParam(":sobrenome", $user->sobrenome);
        $stmt->bindParam(":email", $user->email);
        $stmt->bindParam(":senha", $user->senha);
        $stmt->bindParam(":token", $user->token);


        $stmt->execute();

        if ($authUser) {

            $this->setTokenToSession($user->token);
        }
    }
    public function update(User $user, $redirect = true) {

        $stmt = $this->conn->prepare(" UPDATE users 
                                       SET nome = :nome,
                                       sobrenome = :sobrenome,
                                       email = :email,
                                       image = :image,
                                       bio = :bio,
                                       token = :token
                                       WHERE id = :id ");

        $stmt->bindParam(":nome", $user->nome);
        $stmt->bindParam(":sobrenome", $user->sobrenome);
        $stmt->bindParam(":email", $user->email);
        $stmt->bindParam(":image", $user->imagem);
        $stmt->bindParam(":bio", $user->bio);
        $stmt->bindParam(":token", $user->token);
        $stmt->bindParam(":id", $user->id);

        $stmt->execute();

        if ($redirect) {

            $this->message->setMessage("Dados alterados com sucesso", "sucess", "editprofile.php");
        }

    }

    public function findByToken($token)
    {
        if ($token != "") {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE token = :token");

            $stmt->bindParam(":token", $token);

            $stmt->execute();

            // Caso o dado exista na tabela ele pega o valor e builda o user
            if ($stmt->rowCount() > 0) {
                $data = $stmt->fetch();
                $token = $this->buildUser($data);
                return $token;
            } else {
                return false;
            }
        }
    }

    public function verifyToken($protected = false)
    {
        if (!empty($_SESSION["token"])) {

            $token = $_SESSION["token"];
            $user = $this->findByToken($token);

            if ($user) {
                return $user;
            } else if ($protected) {
                $this->message->setMessage("Faça login no sistema para acessar essa pagina", "error", "index.php");
            }
        } else if ($protected) {
            $this->message->setMessage("Faça login no sistema para acessar essa pagina", "error", "index.php");
        }
    }
    public function setTokenToSession($token, $redirect = true)
    {
        $_SESSION["token"] = $token;

        if ($redirect) {

            $this->message->setMessage("Bem-vindo ao sistema", "sucess", "editprofile.php");
        }
    }
    public function authenticateUser($email, $senha)
    {
        $user = $this->findByEmail($email);

        if ($user) {
            // Verifica se as senhas batem
            if (password_verify($senha, $user->senha)) {

                $token = $user->generateToken();

                $this->setTokenToSession($token, false);

                // Atualiza o token da sessão

                $user->token = $token;

                $this->update($user, false);

                return true;

            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function findByEmail($email)
    {
        if ($email != "") {
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
    public function changePassword(User $user)
    {
        $stmt = $this->conn->prepare(" UPDATE users 
                                       SET senha = :senha
                                       WHERE id = :id");

        $stmt->bindParam(":id", $user->id);
        $stmt->bindParam(":senha", $user->senha);

        $stmt->execute();

        $this->message->setMessage("Senha alterada com sucesso", "sucess", "editprofile.php");



    }

    public function destroyToken()
    {
        $_SESSION["token"] = "";

        $this->message->setMessage("Logout Realizado com sucesso", "sucess", "index.php");
    }
}
