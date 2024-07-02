<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}

  include_once('../include/conexao.php');
// Checar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$turma = $_SESSION['turma'];
$produto = $_POST['produto'];
$quantidade = $_POST['quantidade'];

$stmt = $conn->prepare("SELECT * FROM estoque WHERE nome_produto = ? AND id_turma = ? AND quantidade_enviada > 0");
$stmt->bind_param("si", $produto, $turma);
$stmt->execute();
$result = $stmt->get_result();

$posicoes = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $posicoes[] = array(
            'posicao' => $row["posicao"],
            'quantidade_enviada' => $row["quantidade_enviada"]
        );
    }
    echo json_encode($posicoes);
} else {
    echo json_encode([]);
}
$stmt->close();
$conn->close();
