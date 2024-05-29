<?php
session_start();
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

        $sql = "SELECT * FROM pegado WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $produto = $result->fetch_assoc();

        if ($produto) {
            // Verifica se o produto já existe na posição e possui o mesmo nome
            $sql_check = "SELECT * FROM estoque WHERE posicao = ? AND nome_produto = ?";
            $stmt_check = $conn->prepare($sql_check);
            $stmt_check->bind_param("ss", $produto['posicao'], $produto['nome_produto']);
            $stmt_check->execute();
            $result_check = $stmt_check->get_result();
            $existing_product = $result_check->fetch_assoc();

            if ($existing_product) {
                // Se o produto já existe na mesma posição e possui o mesmo nome, atualiza a quantidade
                $nova_quantidade = $existing_product['quantidade_enviada'] + $produto['quantidade_enviada'];
                $sql_update = "UPDATE estoque SET quantidade_enviada = ? WHERE posicao = ? AND nome_produto = ?";
                $stmt_update = $conn->prepare($sql_update);
                $stmt_update->bind_param("iss", $nova_quantidade, $produto['posicao'], $produto['nome_produto']);
                $stmt_update->execute();
            } else {
                // Caso contrário, insere um novo registro no estoque
                $sql_insert = "INSERT INTO estoque (id_doca, nome_produto, quantidade_enviada, posicao) VALUES (?, ?, ?, ?)";
                $stmt_insert = $conn->prepare($sql_insert);
                $stmt_insert->bind_param("isss", $produto['id_doca'], $produto['nome_produto'], $produto['quantidade_enviada'], $produto['posicao']);
                $stmt_insert->execute();
            }

            // Remove o registro da tabela "pegado"
            $sql_delete = "DELETE FROM pegado WHERE id = ?";
            $stmt_delete = $conn->prepare($sql_delete);
            $stmt_delete->bind_param("i", $id);
            $stmt_delete->execute();
        }
    }
}

header('Location: ../movimentarD1.php');
exit;
?>
