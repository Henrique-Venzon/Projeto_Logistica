<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $servername = "127.0.0.1";
    $username = "root";
    $password = "root";
    $database = "logistica";

    
 // Conexão com o banco de dados
$mysqli = new mysqli('severname', 'username', 'password', 'database');

// Verifique a conexão
if ($mysqli->connect_error) {
    die("Falha na conexão: " . $mysqli->connect_error);
}

// Informações do produto
$nome_produto = 'Nome do Produto';
$quantidade_enviada = '';
$posicao = 'Posição do Produto';

// Consulta SQL
$sql = "SELECT * FROM estoque WHERE nome_produto = '$nome_produto'";

$resultado = $mysqli->query($sql);

if ($resultado->num_rows > 0) {
    // O produto existe no estoque
    while($row = $resultado->fetch_assoc()) {
        if ($row['quantidade'] >= $quantidade_enviada) {
            echo "enviaf"; // Enviar normalmente
        } else {
            echo "Quantidade insuficiente no estoque para o produto: $nome_produto";
        }
    }
} else {
    // O produto não existe no estoque
    echo "O produto $nome_produto não existe no estoque.";
}

$mysqli->close();
}
?>