<?php 
    $db_name = "cinerate";
    $db_host = "localhost";
    $db_user = "root2";
    $db_password = "root";

    $conn = new PDO("mysql:dbname=" . $db_name . ";host=" . $db_host, $db_user, $db_password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

?>