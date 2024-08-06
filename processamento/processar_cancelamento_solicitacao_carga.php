<?php
session_start();
include_once('../include/conexao.php');
$turma = $_SESSION['turma'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancelar_pedido'])) {
    $id_carga_real = $_POST['id_pedido'];
    $motivo = $_POST['motivo'];

    try {
        $conn->begin_transaction();

        // Inserir o cancelamento na tabela 'cancelamentos_pedidos'
        $stmt_insert_cancelamento = $conn->prepare("INSERT INTO cancelamentos_pedidos (id_carga, motivo, id_turma) VALUES (?, ?, ?)");
        $stmt_insert_cancelamento->bind_param("isi", $id_carga_real, $motivo, $turma);
        $stmt_insert_cancelamento->execute();

        // Atualizar a situação do pedido para 'cancelado' na tabela 'carga'
        $stmt_update_carga = $conn->prepare("UPDATE carga SET situacao = 'cancelado' WHERE id = ?");
        $stmt_update_carga->bind_param("i", $id_carga_real);
        $stmt_update_carga->execute();
        $stmt_update_nota = $conn->prepare("UPDATE nota_fiscal SET situacao = 'cancelado' WHERE id_atividade = ?");
        $stmt_update_nota->bind_param("i", $id_carga_real);
        $stmt_update_nota->execute();
        $conn->commit();

        header('Location: ../vistoriaCarga.php');
        exit;

    } catch (Exception $e) {
        $conn->rollback();
        echo "Erro ao cancelar o pedido: " . $e->getMessage();
    }
}
