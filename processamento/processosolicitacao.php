<?php
session_start();
if (!isset($_SESSION['id']) || !isset($_SESSION['turma'])) {
    header("Location: index.php");
    exit;
}

// Conexão com o banco de dados
include_once ('../include/conexao.php');

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$id_pedido = isset($_POST['npedido']) ? $_POST['npedido'] : 1;
$produto = isset($_POST['produto']) ? $_POST['produto'] : '';
$quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : 0;
$produto2 = isset($_POST['produto2']) ? $_POST['produto2'] : '';
$quantidade2 = isset($_POST['quantidade2']) ? $_POST['quantidade2'] : 0;
$produto3 = isset($_POST['produto3']) ? $_POST['produto3'] : '';
$quantidade3 = isset($_POST['quantidade3']) ? $_POST['quantidade3'] : 0;
$produto4 = isset($_POST['produto4']) ? $_POST['produto4'] : '';
$quantidade4 = isset($_POST['quantidade4']) ? $_POST['quantidade4'] : 0;
$turma = $_SESSION['turma'];
$situacao = 'enviado';


$stmt = $conn->prepare("INSERT INTO solicitacao (id_pedido, produto, quantidade, produto2, quantidade2, produto3, quantidade3, produto4, quantidade4, id_turma,situacao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
$stmt->bind_param("isisisisiis", $id_pedido, $produto, $quantidade, $produto2, $quantidade2, $produto3, $quantidade3, $produto4, $quantidade4, $turma,$situacao);

if ($stmt->execute()) {
    $ultimo_id = $conn->insert_id;
    header('Location: ../criandoNotaFiscal_expedicao.php?id=' . urlencode($ultimo_id) . '&turma_id=' . urlencode($turma));
    exit();
} else {
    echo 'Erro ao inserir dados: ' . $conn->error;
}



$stmt->close();
$conn->close();