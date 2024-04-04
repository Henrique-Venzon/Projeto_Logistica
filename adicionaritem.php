<?php
// Arquivo cadastro.php
$host = "127.0.0.1";
$db = "logistica";
$user = "root.Att";
$pass = "root";

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$tipo_produto = $_POST['tipo_produto'];
$fornecedora = $_POST['fornecedora'];
$nome = $_POST['nome'];
$tipo_embalagem = $_POST['tipo_embalagem'];

if (empty($tipo_produto)) {
    echo "Error: Por favor, Adicione o tipo do produto!.";
    exit;
}

// Prepare statement to prevent SQL injection (recommended)
$stmt = $conn->prepare("INSERT INTO logins (username, password, tipo_login) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $Senha, $tipo_login);

if ($stmt->execute() === TRUE) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
