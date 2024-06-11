<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $hostname = "127.0.0.1";
        $user = "root.Att";
        $password = "root";
        $database = "logistica";
    
        $conexao = new mysqli($hostname, $user, $password, $database);
    
 // Conexão com o banco de dados


// Verifique a conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $mysqli->connect_error);
}


// Informações do produto
$nome_produto = 'Nome do Produto';
$quantidade_enviada = '';
$posicao = 'Posição do Produto';

// Consulta SQL
$sql = "SELECT * FROM estoque WHERE nome_produto = '$nome_produto'";

$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    // O produto existe no estoque
    while($row = $resultado->fetch_assoc()) {
        if ($row['quantidade'] >= $quantidade_enviada) {
            echo "envia"; // Enviar normalmente
        } else {
            echo "Quantidade insuficiente no estoque para o produto: $nome_produto";
        }
    }
} else {
    // O produto não existe no estoque
    echo "O produto $nome_produto não existe no estoque.";
}

$conexao->close();
    }
?>
