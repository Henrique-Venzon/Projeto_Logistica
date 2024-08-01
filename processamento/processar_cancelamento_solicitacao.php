<?php 
session_start();
include_once('../include/conexao.php');
$turma=$_SESSION['turma'];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancelar_item'])) {
    $ids_solicitacao = $_POST['cancelar_produto']; 
    $produtos = $_POST['produto'];
    $quantidades_cancelada = $_POST['quantidade_cancelada'];
    $motivo = $_POST['motivo'];
    $id_solicitacao_real = $_POST['id_pedido'];

    try {
        $conn->begin_transaction();

        // Obter os dados da solicitação (apenas uma vez)
        $stmt_select_solicitacao = $conn->prepare("SELECT * FROM solicitacao WHERE id = ?");
        $stmt_select_solicitacao->bind_param("i", $id_solicitacao_real);
        $stmt_select_solicitacao->execute();
        $result_solicitacao = $stmt_select_solicitacao->get_result();
        $row_solicitacao = $result_solicitacao->fetch_assoc();

        $todos_produtos_cancelados = true; // Variável para verificar se todos os produtos foram cancelados

        if ($row_solicitacao) {
            for ($i = 0; $i < count($ids_solicitacao); $i++) {
                $indice_produto = $ids_solicitacao[$i];
                $produto = $produtos[$i];
                $quantidade_cancelada = $quantidades_cancelada[$i];
                $coluna_quantidade = "quantidade" . ($indice_produto == 1 ? "" : $indice_produto);

                if ($quantidade_cancelada > 0 && $quantidade_cancelada <= $row_solicitacao[$coluna_quantidade]) {
                    $nova_quantidade = $row_solicitacao[$coluna_quantidade] - $quantidade_cancelada;

                    // Atualizar a quantidade na tabela 'solicitacao'
                    $stmt_update_solicitacao = $conn->prepare("UPDATE solicitacao SET {$coluna_quantidade} = ? WHERE id = ?");
                    $stmt_update_solicitacao->bind_param("ii", $nova_quantidade, $id_solicitacao_real);
                    $stmt_update_solicitacao->execute();

                    // Inserir o cancelamento na tabela 'cancelamentos_solicitacao'
                    $stmt_insert_cancelamento = $conn->prepare("INSERT INTO cancelamentos_solicitacao (id_solicitacao, produto, quantidade_cancelada, motivo,id_turma) VALUES (?, ?, ?, ?, ?)");
                    $stmt_insert_cancelamento->bind_param("isisi", $id_solicitacao_real, $produto, $quantidade_cancelada, $motivo, $turma);
                    $stmt_insert_cancelamento->execute();

                    // Verificar se a quantidade ficou maior que zero (ou seja, o produto não foi totalmente cancelado)
                    if ($nova_quantidade > 0) {
                        $todos_produtos_cancelados = false; 
                    }
                } else {
                    echo "Erro: Quantidade inválida para cancelar o item '{$produto}'.<br>";
                    $todos_produtos_cancelados = false; // Se houver erro, também define como false
                }
            }

            $conn->commit();

            // Redirecionar após o loop e verificação
            if ($todos_produtos_cancelados) {
                $stmt_delete_solicitacao = $conn->prepare("DELETE FROM solicitacao WHERE id = ?");
                $stmt_delete_solicitacao->bind_param("i", $id_solicitacao_real);
                $stmt_delete_solicitacao->execute();
                header('Location: ../verSolicitacao.php');
            } else {
                header('Location: ../verSolicitacao2.php?' . urlencode($id_pedido)); 
            }
            exit; 
        } else {
            echo "Erro: Solicitação {$id_solicitacao_real} não encontrada.<br>";
        }
    } catch (Exception $e) {
        $conn->rollback();
        echo "Erro ao cancelar o item: " . $e->getMessage();
    }
}
