<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hostname = '127.0.0.1';
    $user = 'root.Att';
    $password = 'root';
    $database = 'logistica';

    $conn = new mysqli($hostname, $user, $password, $database);

    // Verifique a conexão
    if ($conn->connect_error) {
        die('Falha na conexão: ' . $conn->connect_error);
    }
    

    if ($conn->query($sql) === TRUE) {
        echo 'Dados inseridos com sucesso!';
        header('location:../containerP.php');
    } else {
        echo 'Erro ao inserir dados: ' . $conn->error;
    }

    $conn->close();

}


