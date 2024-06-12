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


$id_pedido= $_POST['npedido'];
$produto= $_POST['produto'];
$quantidade = $_POST['quantidade'];
$sql = "SELECT * FROM `estoque` WHERE nome_produto = '$produto'";

$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    // O produto existe no estoque
    while($row = $resultado->fetch_assoc()) {
        if ($row['quantidade_enviada'] >= $quantidade) {
            // Cria um novo pedido
            $sql_pedido = "INSERT INTO `pedidos` (id_pedido, nome_produto, quantidade) VALUES ('$id_pedido', '$produto', '$quantidade')";
            if ($conexao->query($sql_pedido) === TRUE) {
                echo "Pedido criado com sucesso para o produto: $produto";
                
                // Atualiza a quantidade no estoque
                $nova_quantidade = $row['quantidade_enviada'] - $quantidade;
                $sql_update = "UPDATE `estoque` SET quantidade_enviada = '$nova_quantidade' WHERE nome_produto = '$produto'";
                if ($conexao->query($sql_update) === TRUE) {
                    echo "Quantidade atualizada no estoque para o produto: $produto";
                } else {
                    echo "Erro ao atualizar a quantidade no estoque: " . $conexao->error;
                }
            } else {
                echo "Erro ao criar o pedido: " . $conexao->error;
            }
        } else {
            echo "Quantidade insuficiente no estoque para o produto: $produto";
        }
    }
} else {
    echo "Produto não encontrado no estoque.";
}

$conexao->close();
    }