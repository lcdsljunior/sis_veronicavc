<?php

include('conexao.php');

$senha = '123';
$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

// Preparar a declaração SQL
$sql = "INSERT INTO `user` (`CadastroID`, `Nome`, `DocFederal`, `Email`, `Usuario`, `Senha`, `DataInc`, `Permissao`)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?) LIMIT 1";

// Preparar a declaração
$stmt = $conn->prepare($sql);

// Vincular parâmetros
$stmt->bind_param("ssssssss", $CadastroID, $Nome, $DocFederal, $Email, $Usuario, $Senha, $DataInc, $Permissao);

// Atribuir valores aos parâmetros
$CadastroID = '1';
$Nome = 'João Pedro';
$DocFederal = '123456789';
$Email = 'joaopedro@gmail.com';
$Usuario = 'joaopedro';
$Senha = $senhaCriptografada;
$DataInc = '2024-01-22';
$Permissao = 'admin';

// Executar a declaração
$result = $stmt->execute();

// Verificar o resultado
if ($result) {
    echo "Inserção bem-sucedida!";
} else {
    echo "Erro ao inserir dados: " . $stmt->error;
}

// Fechar a declaração e a conexão
$stmt->close();
$conn->close();