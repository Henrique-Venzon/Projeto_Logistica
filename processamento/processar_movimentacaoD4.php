<?php
session_start();
$turma = $_SESSION['turma'];
if (!isset($_SESSION['id']) || !isset($_SESSION['turma'])) {
    header("Location: ../index.php");
    exit;
}

include_once('../include/conexao.php');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['finalizar'])) {
        $id = $_POST['produto_id'];

        // Seleciona o produto na tabela 'pegado'
        $sql = "SELECT * FROM pegado WHERE id = ? AND id_turma = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $id, $turma);
        $stmt->execute();
        $result = $stmt->get_result();
        $produto = $result->fetch_assoc();

        if ($produto) {
            // Verifica se o produto já existe na posição e possui o mesmo nome e turma
            $sql_check = "SELECT * FROM estoque WHERE nome_produto = ? AND id_turma = ? AND posicao = ?";
            $stmt_check = $conn->prepare($sql_check);
            $stmt_check->bind_param("sis", $produto['nome_produto'], $turma, $produto['posicao']);
            $stmt_check->execute();
            $result_check = $stmt_check->get_result();
            $existing_product = $result_check->fetch_assoc();

            if ($existing_product) {
                // Atualiza a quantidade se o produto já existir na mesma posição e na mesma turma
                $nova_quantidade = $existing_product['quantidade_enviada'] + $produto['quantidade_enviada'];
                $sql_update = "UPDATE estoque SET quantidade_enviada = ? WHERE posicao = ? AND nome_produto = ? AND id_turma = ?";
                $stmt_update = $conn->prepare($sql_update);
                $stmt_update->bind_param("issi", $nova_quantidade, $produto['posicao'], $produto['nome_produto'], $turma);
                $stmt_update->execute();
            } else {
                // Insere um novo registro no estoque com a turma
                $sql_insert = "INSERT INTO estoque (nome_produto, quantidade_enviada, posicao, id_turma) VALUES (?, ?, ?, ?)";
                $stmt_insert = $conn->prepare($sql_insert);
                $stmt_insert->bind_param("sisi", $produto['nome_produto'], $produto['quantidade_enviada'], $produto['posicao'], $turma);
                $stmt_insert->execute();
            }

            // Remove o registro da tabela 'pegado'
            $sql_delete = "DELETE FROM pegado WHERE id = ? AND id_turma = ?";
            $stmt_delete = $conn->prepare($sql_delete);
            $stmt_delete->bind_param("ii", $id, $turma);
            $stmt_delete->execute();

            // Seleciona o id_doca do produto processado
            $id_doca = $produto['id_doca'];

            // Verifica se não há mais produtos para processar na tabela 'pegado' com o mesmo id_doca e turma
            $sql_check_pegado_doca = "SELECT * FROM pegado WHERE id_doca = ? AND id_turma = ?";
            $stmt_check_pegado_doca = $conn->prepare($sql_check_pegado_doca);
            $stmt_check_pegado_doca->bind_param("ii", $id_doca, $turma);
            $stmt_check_pegado_doca->execute();
            $result_check_pegado_doca = $stmt_check_pegado_doca->get_result();

            // Verifica se todos os produtos relacionados à mesma id_doca na tabela 'vistoriado' estão com quantidade zero
            $sql_check_vistoriado = "SELECT * FROM vistoriado WHERE id IN (SELECT id_carga FROM docas WHERE id_doca = ? AND id_turma = ?) AND quantidade1 > 0";
            $stmt_check_vistoriado = $conn->prepare($sql_check_vistoriado);
            $stmt_check_vistoriado->bind_param("ii", $id_doca, $turma);
            $stmt_check_vistoriado->execute();
            $result_check_vistoriado = $stmt_check_vistoriado->get_result();

            // Se não houver mais produtos relacionados ao id_doca nas tabelas 'pegado' e todos em 'vistoriado' estiverem com quantidade zero, remove a entrada da tabela 'docas'
            if ($result_check_pegado_doca->num_rows === 0 && $result_check_vistoriado->num_rows === 0) {
                $sql_delete_doca = "DELETE FROM docas WHERE id_doca = ? AND id_turma = ?";
                $stmt_delete_doca = $conn->prepare($sql_delete_doca);
                $stmt_delete_doca->bind_param("ii", $id_doca, $turma);
                $stmt_delete_doca->execute();
            }

            // Seleciona todos os produtos relacionados ao mesmo id_carga do produto processado
            $id_carga = $produto['id_carga'];
            $sql_check_carga = "SELECT * FROM pegado WHERE id_carga = ? AND id_turma = ?";
            $stmt_check_carga = $conn->prepare($sql_check_carga);
            $stmt_check_carga->bind_param("ii", $id_carga, $turma);
            $stmt_check_carga->execute();
            $result_check_carga = $stmt_check_carga->get_result();

            // Se não houver mais produtos relacionados ao id_carga, atualiza a situação da carga para 'Finalizada'
            if ($result_check_carga->num_rows === 0) {
                $sql_update_carga = "UPDATE carga SET situacao = 'Finalizada' WHERE id = ? AND turma_id = ?";
                $stmt_update_carga = $conn->prepare($sql_update_carga);
                $stmt_update_carga->bind_param("ii", $id_carga, $turma);
                $stmt_update_carga->execute();
            }
        }
    }
}

header('Location: ../movimentarD4.php', true, 301);
exit;

