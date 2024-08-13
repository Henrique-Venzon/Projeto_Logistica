<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once ('../include/conexao.php');
session_start();
$turma = $_SESSION['turma'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['finalizar'])) {
        $id = $_POST['produto_id'];
        $id_pedido = $_POST['id_pedido'];
        $id_doca = $_POST['id_doca'];

        $conn->begin_transaction();

        $sql = "SELECT * FROM picking_pegado WHERE id = ? AND id_turma = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $id, $turma);
        $stmt->execute();
        $result = $stmt->get_result();
        $produto = $result->fetch_assoc();

        if ($produto) {
            $sql_check = "SELECT * FROM estoque WHERE nome_produto = ? AND id_turma = ? AND posicao = ?";
            $stmt_check = $conn->prepare($sql_check);
            $stmt_check->bind_param("sis", $produto['nome_produto'], $turma, $produto['posicao']);
            $stmt_check->execute();
            $result_check = $stmt_check->get_result();
            $existing_product = $result_check->fetch_assoc();

            if ($existing_product) {
                if ($existing_product['quantidade_enviada'] >= $produto['quantidade_enviada']) {
                    $nova_quantidade = $existing_product['quantidade_enviada'] - $produto['quantidade_enviada'];
                    $sql_update = "UPDATE estoque SET quantidade_enviada = ? WHERE posicao = ? AND nome_produto = ? AND id_turma = ?";
                    $stmt_update = $conn->prepare($sql_update);
                    $stmt_update->bind_param("issi", $nova_quantidade, $produto['posicao'], $produto['nome_produto'], $turma);
                    $stmt_update->execute();

                    $sql_insert_item = "INSERT INTO expedicao (id_pedido, nome_produto, quantidade_enviada, id_doca,id_turma) VALUES (?, ?, ?, ?,?)";
                    $stmt_insert_item = $conn->prepare($sql_insert_item);
                    $stmt_insert_item->bind_param("isiii", $id_pedido, $produto['nome_produto'], $produto['quantidade_enviada'], $id_doca, $turma);
                    $stmt_insert_item->execute();

                    $sql_delete = "DELETE FROM picking_pegado WHERE id = ? AND id_turma = ?";
                    $stmt_delete = $conn->prepare($sql_delete);
                    $stmt_delete->bind_param("ii", $id, $turma);
                    $stmt_delete->execute();

                    $conn->commit();

                    $sql_check_produtos = "SELECT 1 FROM picking WHERE id_pedido = ? AND id_turma = ? UNION SELECT 1 FROM picking_pegado WHERE id_pedido = ? AND id_turma = ?";
                    $stmt_check_produtos = $conn->prepare($sql_check_produtos);
                    $stmt_check_produtos->bind_param("iiii", $id_pedido, $turma, $id_pedido, $turma);
                    $stmt_check_produtos->execute();
                    $stmt_check_produtos->store_result();

                    if ($stmt_check_produtos->num_rows > 0) {
                        header('Location: ../picking2.php?id=' . urlencode($id_pedido), true, 301);
                        exit;
                    } else {
                        header('Location: ../picking.php', true, 301);
                        exit;
                    }
                } else {
                    $_SESSION['error_message'] = "Quantidade insuficiente no estoque para o produto: " . $produto['nome_produto'];
                }
            } else {
                $_SESSION['error_message'] = "Produto não encontrado no estoque no lugar correto: " . $produto['nome_produto'] . " - Posição: " . $produto['posicao'];
                $conn->rollback();
                header('Location: ../picking2.php?id=' . urlencode($id_pedido));
                exit;
            }
        } else {
            $_SESSION['error_message'] = "Produto não encontrado na tabela 'pegado'";
            $conn->rollback();
            header('Location: ../picking2.php?id=' . urlencode($id_pedido));
            exit;
        }
    }
}