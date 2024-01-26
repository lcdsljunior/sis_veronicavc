<?php
session_start();
include("conexao.php");

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM `user` WHERE `Email` = '$email'";
$result = $conn->query($sql) or die("Não foi possível continuar");

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $senhaArmazenada = $row['Senha'];

    if (password_verify($senha, $senhaArmazenada)) {
        header("Location: ../pages/painel.html");
        exit();
    }
}

// Se chegou aqui, a autenticação falhou
$_SESSION['error'] = "Email ou senha incorretos!";
header("Location: ../pages/index.php");
exit();