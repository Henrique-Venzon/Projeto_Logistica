<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}

try {
    $pdo = new PDO('mysql:host=localhost;dbname=logistica', 'root.Att', 'root');
} catch (PDOException $e) {
    die('Erro ao conectar com o MySQL: ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomeCliente = $_POST['nomeCliente'];
    $cep = $_POST['cep'];
    $telefone = $_POST['telefone'];
    $num = $_POST['num'];

    $stmtPedido = $pdo->prepare('INSERT INTO pedidos (nomeCliente, cep, telefone, num) VALUES (?, ?, ?, ?)');
    $stmtPedido->execute([$nomeCliente, $cep, $telefone, $num]);
    $pedidoId = $pdo->lastInsertId();

    for ($i = 0; $i < count($_POST['produto']); $i++) {
        $produto = $_POST['produto'][$i];
        $unidade = $_POST['unidade'][$i];
        $quantidade = $_POST['quantidade'][$i];
        $valor = $_POST['valor'][$i];
        $ncm = $_POST['ncm'][$i];
        $cst = $_POST['cst'][$i];
        $cfop = $_POST['cfop'][$i];

        $stmtProduto = $pdo->prepare('INSERT INTO produtos (pedidoId, nome, unidade, quantidade, valor, ncm, cst, cfop) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $stmtProduto->execute([$pedidoId, $produto, $unidade, $quantidade, $valor, $ncm, $cst, $cfop]);
    }

    header('Location: ../produtos.php', true, 301);
    exit;
}

