<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $hostname = "127.0.0.1";
        $user = "root.Att";
        $password = "root";
        $database = "logistica";
    
        $conexao = new mysqli($hostname, $user, $password, $database);
    



    if ($conexao->connect_error) {
    die("Falha na conexão: " . $mysqli->connect_error);
    }



$produto= $_POST['produto'];
$quantidade = $_POST['quantidade'];

$sql = "SELECT * FROM `estoque` WHERE nome_produto = '$produto' AND quantidade_enviada= '$quantidade'";

$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    // O produto existe no estoque
    while($row = $resultado->fetch_assoc()) {
        if ($row['quantidade_enviada'] >= $quantidade) {
            echo "enviaf"; 
        } else {
            echo "Quantidade insuficiente no estoque para o produto: $produto";
        }
    }
} else {
    // O produto não existe no estoque
    echo "O produto $produto não existe no estoque.";
}

$conexao->close();
    }
?>
