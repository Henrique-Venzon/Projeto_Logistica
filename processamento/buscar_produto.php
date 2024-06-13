<?php
$hostname = "127.0.0.1";
$user = "root.Att";
$password = "root";
$database = "logistica";

// Estabelece a conexão
$conexao = new mysqli($hostname, $user, $password, $database);

// Verifica se houve um erro na conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

if (isset($_POST['sku'])) {
    $sku = $_POST['sku'];

    // Consulta SQL para buscar os dados do produto pelo SKU
    $sql = "SELECT nome_produto, preco FROM produto WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $sku);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $produto = $resultado->fetch_assoc();
        echo json_encode($produto);
    } else {
        echo json_encode(["nome_produto" => "", "preco" => ""]);
    }

    $stmt->close();
}

// Fecha a conexão
$conexao->close();

