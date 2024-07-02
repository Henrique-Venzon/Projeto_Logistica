<?php
session_start();
if (!isset($_SESSION['id']) || !isset($_SESSION['turma'])) {
    header("Location: index.php");
    exit;
}

// Conexão com o banco de dados
include_once('../include/conexao.php');

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


$stmt = $conn->prepare("INSERT INTO solicitacao (id_pedido, produto, quantidade, produto2, quantidade2, produto3, quantidade3, produto4, quantidade4, id_turma) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isisisisii", $id_pedido, $produto, $quantidade, $produto2, $quantidade2, $produto3, $quantidade3, $produto4, $quantidade4, $turma);

if ($stmt->execute()) {
    header('location:../solicitacao.php', true,301 );
} else {
    echo "Erro: " . $stmt->error;
}

$stmt->close();
$conn->close();

