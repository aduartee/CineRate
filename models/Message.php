<?php 

class Message {
    private $url; 

    public function __construct($url){
        $this->$url = $url;
    }

    public function setMessage($msg, $type, $redirect = "index.php"){
        $_SESSION['msg'] = $msg;
        $_SESSION['type'] = $type;

        // CASO FOR DIFERENTE DE BACK, MANDA PARA A ULTIMA PAGINA QUE O USER ENTROU
        $redirect != "back" ? header("Location: $this->url" . $redirect) :  header("Location: " . $_SERVER["HTTP_REFERER"]);

    }

    public function getMessage(){

    }

    public function clearMessage(){ 

    }
}

?>