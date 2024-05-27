<?php
session_start();
$conexao = new mysqli('localhost', 'root.Att', 'root', 'logistica');

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

$id_aluno = $_SESSION['id'];
$id = $_POST['id'];
$quantidade1 = $_POST['quantidade1'] ?? 0;
$quantidade2 = $_POST['quantidade2'] ?? 0;
$quantidade3 = $_POST['quantidade3'] ?? 0;
$quantidade4 = $_POST['quantidade4'] ?? 0;
$doca = $_POST['doca'] ?? 1;
$turma_id = $_SESSION['turma'];

$sql = "UPDATE carga SET quantidade1 = $quantidade1, situacao='Vistoriado', quantidade2 = $quantidade2, quantidade3 = $quantidade3, quantidade4 = $quantidade4 WHERE id = $id and turma_id = '$turma_id';";

if ($conexao->query($sql) === TRUE) {
    $sql = "INSERT INTO `docas`(`id_doca`, `id_carga`, `id_aluno`, `id_turma`) VALUES ('$doca', '$id', '$id_aluno', '$turma_id');";
    if ($conexao->query($sql) === TRUE) {
        $sql = "INSERT INTO vistoriado SELECT * FROM carga WHERE id = '$id'";
        if ($conexao->query($sql) === TRUE) {
            header('location:../vistoriaCarga.php', true, 301);
        } else {
            echo "Erro ao inserir dados: " . $conexao->error;
        }
    } else {
        echo "Erro ao inserir dados na tabela docas: " . $conexao->error;
    }
} else {
    echo "Erro ao atualizar registro: " . $conexao->error;
}

$conexao->close();

