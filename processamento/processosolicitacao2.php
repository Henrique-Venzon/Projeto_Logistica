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

if (isset($_POST['id_produto'], $_POST['quantidadeS'], $_POST['produto'], $_POST['posicao'], $_POST['quantidade'])) {
    $id_produto = $_POST['id_produto'];
    $quantidadeS = $_POST['quantidadeS'];
    $produto = $_POST['produto'];
    $posicao = $_POST['posicao'];
    $quantidade = $_POST['quantidade'];

    $stmt = $conn->prepare("INSERT INTO picking (id_produto, quantidade_solicitada, produto, posicao, quantidade, id_turma) VALUES (?, ?, ?, ?, ?, ?)");
    foreach ($id_produto as $key => $value) {
        $stmt->bind_param("sisssi", $id_produto[$key], $quantidadeS[$key], $produto[$key], $posicao[$key], $quantidade[$key], $turma);
        $stmt->execute();

        
        $produto_field = "";
        $quantidade_field = "";

        for ($i = 1; $i <= 4; $i++) {
            if ($i == 1) {
                $produto_field = "produto";
                $quantidade_field = "quantidade";
            } else {
                $produto_field = "produto" . $i;
                $quantidade_field = "quantidade" . $i;
            }


            $update_stmt = $conn->prepare("UPDATE solicitacao SET $quantidade_field = $quantidade_field - ? WHERE id = ? AND $produto_field = ?");
            $update_stmt->bind_param("iis", $quantidade[$key], $id_produto[$key], $produto[$key]);
            $update_stmt->execute();
            $update_stmt->close();
        }
    }
    $stmt->close();


    $check_stmt = $conn->prepare("SELECT id, quantidade, quantidade2, quantidade3, quantidade4 FROM solicitacao WHERE id = ?");
    $check_stmt->bind_param("i", $id_produto[0]);
    $check_stmt->execute();
    $result = $check_stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (($row['quantidade'] <= 0 || $row['quantidade'] === null) &&
            ($row['quantidade2'] <= 0 || $row['quantidade2'] === null) &&
            ($row['quantidade3'] <= 0 || $row['quantidade3'] === null) &&
            ($row['quantidade4'] <= 0 || $row['quantidade4'] === null)) {
            $delete_stmt = $conn->prepare("DELETE FROM solicitacao WHERE id = ?");
            $delete_stmt->bind_param("i", $id_produto[0]);
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

