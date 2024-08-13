<?php
// cancelar_finalizar_expedicao.php

// Inclua o arquivo de conexão com o banco de dados
include_once '../include/conexao.php'; // Ajuste o caminho conforme necessário

// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtenha os dados do formulário
    $produto_id = $_POST['produto_id'];
    $id_pedido = $_POST['id_pedido'];

    // Iniciar a transação
    $conn->begin_transaction();

    try {
        // Selecionar o registro da tabela picking_pegado
        $sql_select = "SELECT * FROM picking_pegado WHERE id = ?";
        $stmt_select = $conn->prepare($sql_select);
        $stmt_select->bind_param("i", $produto_id);
        $stmt_select->execute();
        $result = $stmt_select->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Inserir o registro de volta na tabela picking
            $sql_insert = "INSERT INTO picking (id_pedido, quantidade_solicitada, produto, posicao, quantidade, id_turma) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("iissii", $row['id_pedido'], $row['quantidade_enviada'], $row['nome_produto'], $row['posicao'], $row['quantidade_enviada'], $row['id_turma']);
            $stmt_insert->execute();

            // Deletar o registro da tabela picking_pegado
            $sql_delete = "DELETE FROM picking_pegado WHERE id = ?";
            $stmt_delete = $conn->prepare($sql_delete);
            $stmt_delete->bind_param("i", $produto_id);
            $stmt_delete->execute();

            // Confirmar a transação
            $conn->commit();

            // Redirecionar de volta à página original com uma mensagem de sucesso
            header("Location: ../picking2.php?id=" . urlencode($id_pedido), true, 301);
        } else {
            throw new Exception("Produto não encontrado");
        }
    } catch (Exception $e) {
        // Reverter a transação
        $conn->rollback();

        // Redirecionar de volta à página original com uma mensagem de erro
        header("Location: ../picking2.php?id=" . urlencode($id) . "status=error&message=" . $e->getMessage());
    }

    // Fechar as declarações
    $stmt_select->close();
    $stmt_insert->close();
    $stmt_delete->close();
} else {
    // Redirecionar se o método de solicitação não for POST
    header("Location: ../picking2.php?id=" . urlencode($id_pedido), true, 301);
}

// Fechar a conexão
$conn->close();
?>