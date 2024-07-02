<?php
session_start();
$servername = "localhost";
$username = "root.Att";
$password = "root";
$dbname = "logistica";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$turma = $_SESSION['turma'];

if (isset($_POST['id_pedido'], $_POST['quantidadeS'], $_POST['produto'], $_POST['posicao'], $_POST['quantidade'])) {
    $id_pedido = $_POST['id_pedido'];
    $quantidadeS = $_POST['quantidadeS'];
    $produto = $_POST['produto'];
    $posicao = $_POST['posicao'];
    $quantidade = $_POST['quantidade'];

    for ($i = 0; $i < count($produto); $i++) {
        $current_id_pedido = $id_pedido[$i];
        $current_quantidadeS = $quantidadeS[$i];
        $current_produto = $produto[$i];
        $current_posicao = $posicao[$i];
        $current_quantidade = $quantidade[$i];

        // Verifica se já existe uma linha com o mesmo id_pedido, produto e posicao
        $check_stmt = $conn->prepare("SELECT id, quantidade FROM picking WHERE id_pedido = ? AND produto = ? AND posicao = ?");
        $check_stmt->bind_param("iss", $current_id_pedido, $current_produto, $current_posicao);
        $check_stmt->execute();
        $result = $check_stmt->get_result();

        if ($result->num_rows > 0) {
            // Se existir, atualiza a linha existente
            $row = $result->fetch_assoc();
            $new_quantidade = $row['quantidade'] + $current_quantidade;

            $update_stmt = $conn->prepare("UPDATE picking SET quantidade_solicitada = ?, quantidade = ?, id_turma = ? WHERE id_pedido = ? AND produto = ? AND posicao = ?");
            $update_stmt->bind_param("iiisis", $current_quantidadeS, $new_quantidade, $turma, $current_id_pedido, $current_produto, $current_posicao);
            $update_stmt->execute();
            $update_stmt->close();
        } else {
            // Se não existir, insere uma nova linha
            $stmt = $conn->prepare("INSERT INTO picking (id_pedido, quantidade_solicitada, produto, posicao, quantidade, id_turma) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("iissii", $current_id_pedido, $current_quantidadeS, $current_produto, $current_posicao, $current_quantidade, $turma);
            $stmt->execute();
            $stmt->close();
        }

        // Atualiza a tabela solicitacao
        for ($j = 1; $j <= 4; $j++) {
            $produto_field = ($j == 1) ? "produto" : "produto" . $j;
            $quantidade_field = ($j == 1) ? "quantidade" : "quantidade" . $j;

            $update_solicitacao_stmt = $conn->prepare("UPDATE solicitacao SET $quantidade_field = $quantidade_field - ? WHERE id = ? AND $produto_field = ?");
            $update_solicitacao_stmt->bind_param("iis", $current_quantidade, $current_id_pedido, $current_produto);
            $update_solicitacao_stmt->execute();
            $update_solicitacao_stmt->close();
        }
    }

    // Verifica se todos os produtos na solicitação foram processados
    $check_stmt = $conn->prepare("SELECT id, quantidade, quantidade2, quantidade3, quantidade4 FROM solicitacao WHERE id = ?");
    $check_stmt->bind_param("i", $id_pedido[0]);
    $check_stmt->execute();
    $result = $check_stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (($row['quantidade'] <= 0 || $row['quantidade'] === null) &&
            ($row['quantidade2'] <= 0 || $row['quantidade2'] === null) &&
            ($row['quantidade3'] <= 0 || $row['quantidade3'] === null) &&
            ($row['quantidade4'] <= 0 || $row['quantidade4'] === null)) {
            $delete_stmt = $conn->prepare("DELETE FROM solicitacao WHERE id = ?");
            $delete_stmt->bind_param("i", $id_pedido[0]);
            $delete_stmt->execute();
            $delete_stmt->close();
        }
    }
    $check_stmt->close();

    header('Location: ../verSolicitacao.php', true, 301);
} else {
    echo "Erro: Dados não recebidos corretamente.";
}

$conn->close();
?>
