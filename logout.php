<?php 
require_once('templat/header.php');


if($userDao){
    $userDao->destroyToken();
} else { 
    echo "Erro interno";

}
// ($userDao) ? $userDao->destroyToken() : "Erro interno";
