<?php 

    $usuario = "root";
    $dataBase = "data";
    $senha = "";
    $host = "localhost";

    $conn = mysqli_connect($host, $usuario, $senha, $dataBase);

    if ($conn->error) {
        die("". $conn->error);
    }