<?php 
    //conexão com o banco de dados
    $servername = "localhost";
    $db_name = "pessoa";
    $username = "root";
    $password = "admin";

    $connect = mysqli_connect($servername, $username, $password, $db_name);

    if (mysqli_connect_error()){
        echo "Erro ao conectar ao banco de dados";
    }
?>