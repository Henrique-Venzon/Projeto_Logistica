<?php
include_once('../include/conexao.php');
session_start();

// Verifique se o formulário foi enviado e se há produtos selecionados
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['produtos_selecionados'])) {
    // Recupere os produtos selecionados
    $produtosSelecionados = $_POST['produtos_selecionados'];

    // Prepare a instrução SQL de inserção
    $sqlInsert = "INSERT INTO picking_pegado (nome_produto, quantidade_enviada, posicao, id_carga, id_aluno, id_turma,id_pedido) 
                  VALUES (?, ?, ?, ?, ?, ?,?)";
    $stmtInsert = $conn->prepare($sqlInsert);

    // Prepare a instrução SQL de exclusão
    $sqlDelete = "DELETE FROM picking WHERE id = ?";
    $stmtDelete = $conn->prepare($sqlDelete);

    foreach ($produtosSelecionados as $idProduto) {
        // Recupere os valores dos campos
        $nomeProduto = $_POST['nome_produto'][$idProduto];
        $quantidadeEnviada = $_POST['quantidade_solicitada'][$idProduto];
        $posicao = $_POST['posicao'][$idProduto];
        $idCarga = $_POST['id_carga'][$idProduto];
        $idAluno = $_SESSION['id']; 
        $idTurma = $_SESSION['turma'];

        // Vincule os parâmetros e execute a instrução SQL de inserção
        $stmtInsert->bind_param("sisiiii", $nomeProduto, $quantidadeEnviada, $posicao, $idCarga, $idAluno, $idTurma,$idCarga);
        $stmtInsert->execute();

        // Vincule os parâmetros e execute a instrução SQL de exclusão
        $stmtDelete->bind_param("i", $idProduto);
        $stmtDelete->execute();
    }

    // Feche as instruções e a conexão
    $stmtInsert->close();
    $stmtDelete->close();
    $conn->close();

    header('Location: ../picking2.php?id=' . urldecode($idCarga), true, 301);
    exit();
}

