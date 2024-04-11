<?php
$host = "127.0.0.1";
$db = "logistica";
$user = "root.Att";
$pass = "root";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$tipo_login = $_POST['tipo_login'];
$Senha = $_POST['Senha'];
$username = $_POST['username'];  

if (empty($username)) {
    echo "Error: Please enter a username.";
    exit;
}
$stmt = $conn->prepare("INSERT INTO professores (username, password, ) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $Senha);

if ($stmt->execute() === TRUE) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
