<?php
session_start();
$turma = $_SESSION['turma']; // Variável nova adicionada
if (!isset($_SESSION['id']) || !isset($_SESSION['turma'])) {
    header("Location: ../index.php");
    exit;
}

$servername = "localhost";
$username = "root.Att";
$password = "root";
$dbname = "logistica";

$conn = new mysqli($servername, $username, $password, $dbname);
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
            $sql_check = "SELECT * FROM estoque WHERE posicao = ? AND nome_produto = ? AND id_turma = ?";
            $stmt_check = $conn->prepare($sql_check);
            $stmt_check->bind_param("ssi", $produto['posicao'], $produto['nome_produto'], $turma);
            $stmt_check->execute();
            $result_check = $stmt_check->get_result();
            $existing_product = $result_check->fetch_assoc();

            if ($existing_product) {
                // Atualiza a quantidade se o produto já existir na mesma turma
                $nova_quantidade = $existing_product['quantidade_enviada'] + $produto['quantidade_enviada'];
                $sql_update = "UPDATE estoque SET quantidade_enviada = ? WHERE posicao = ? AND nome_produto = ? AND id_turma = ?";
                $stmt_update = $conn->prepare($sql_update);
                $stmt_update->bind_param("issi", $nova_quantidade, $produto['posicao'], $produto['nome_produto'], $turma);
                $stmt_update->execute();
            } else {
                // Insere um novo registro no estoque com a turma
                $sql_insert = "INSERT INTO estoque (id_doca, nome_produto, quantidade_enviada, posicao, id_turma) VALUES (?, ?, ?, ?, ?)";
                $stmt_insert = $conn->prepare($sql_insert);
                $stmt_insert->bind_param("isssi", $produto['id_doca'], $produto['nome_produto'], $produto['quantidade_enviada'], $produto['posicao'], $turma);
                $stmt_insert->execute();
            }

            // Remove o registro da tabela 'pegado'
            $sql_delete = "DELETE FROM pegado WHERE id = ? AND id_turma = ?";
            $stmt_delete = $conn->prepare($sql_delete);
            $stmt_delete->bind_param("ii", $id, $turma);
            $stmt_delete->execute();

            // Seleciona todos os produtos relacionados ao mesmo id_doca do produto processado
            $id_doca = $produto['id_doca'];
            $sql_check_movimentacao = "SELECT * FROM movimentacao WHERE id_doca = ? AND id_turma = ?";
            $stmt_check_movimentacao = $conn->prepare($sql_check_movimentacao);
            $stmt_check_movimentacao->bind_param("ii", $id_doca, $turma);
            $stmt_check_movimentacao->execute();
            $result_check_movimentacao = $stmt_check_movimentacao->get_result();

            // Se não houver mais produtos relacionados ao id_doca na tabela 'movimentacao', remove a entrada da tabela 'docas'
            if ($result_check_movimentacao->num_rows === 0) {
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

header('Location: ../movimentarD1.php', true, 301);
exit;