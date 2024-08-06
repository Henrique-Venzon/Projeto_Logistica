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

        // Inicia a transação
        $conn->begin_transaction();


        // Seleciona o produto na tabela 'pegado'
        $sql = "SELECT * FROM picking_pegado WHERE id = ? AND id_turma = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $id, $turma);
        $stmt->execute();
        $result = $stmt->get_result();
        var_dump($result); // Verificar se a consulta retornou resultados
        $produto = $result->fetch_assoc();
        var_dump($produto); // Verificar se $produto contém os dados esperados

        if ($produto) {
            // Verifica se o produto já existe no estoque
            $sql_check = "SELECT * FROM estoque WHERE nome_produto = ? AND id_turma = ? AND posicao = ?";
            $stmt_check = $conn->prepare($sql_check);
            $stmt_check->bind_param("sis", $produto['nome_produto'], $turma, $produto['posicao']);
            $stmt_check->execute();
            $result_check = $stmt_check->get_result();
            $existing_product = $result_check->fetch_assoc();

            if ($existing_product) {
                // Verifica se a quantidade no estoque é suficiente
                if ($existing_product['quantidade_enviada'] >= $produto['quantidade_enviada']) {
                    // Remove a quantidade do estoque
                    $nova_quantidade = $existing_product['quantidade_enviada'] - $produto['quantidade_enviada'];
                    $sql_update = "UPDATE estoque SET quantidade_enviada = ? WHERE posicao = ? AND nome_produto = ? AND id_turma = ?";
                    $stmt_update = $conn->prepare($sql_update);
                    $stmt_update->bind_param("issi", $nova_quantidade, $produto['posicao'], $produto['nome_produto'], $turma);
                    $stmt_update->execute();

                    // Insere o item na tabela 'expedicao'
                    $sql_insert_item = "INSERT INTO expedicao (id_pedido, nome_produto, quantidade_enviada, id_doca,id_turma) VALUES (?, ?, ?, ?,?)";
                    $stmt_insert_item = $conn->prepare($sql_insert_item);
                    $stmt_insert_item->bind_param("isiii", $id_pedido, $produto['nome_produto'], $produto['quantidade_enviada'], $id_doca, $turma);
                    $stmt_insert_item->execute();

                    // Remove o registro da tabela 'pegado'
                    $sql_delete = "DELETE FROM picking_pegado WHERE id = ? AND id_turma = ?";
                    $stmt_delete = $conn->prepare($sql_delete);
                    $stmt_delete->bind_param("ii", $id, $turma);
                    $stmt_delete->execute();

                    // Commit da transação
                    $conn->commit();
                    // Verifica se ainda existem produtos para o pedido
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
                    // Quantidade insuficiente no estoque
                    $_SESSION['error_message'] = "Quantidade insuficiente no estoque para o produto: " . $produto['nome_produto'];
                }
            } else {
                // Produto não encontrado no estoque
                $_SESSION['error_message'] = "Produto não encontrado no estoque: " . $produto['nome_produto'];
            }
        }

    }
}