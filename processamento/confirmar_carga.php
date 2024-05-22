<?php
session_start();
$conexao = new mysqli('localhost', 'root.Att', 'root', 'logistica');

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}
$id_aluno=$_SESSION['id'];
$id = $_POST['id'];
$quantidade1 = isset($_POST['quantidade1']) ? $_POST['quantidade1'] : 0;
$quantidade2 = isset($_POST['quantidade2']) ? $_POST['quantidade2'] : 0;
$quantidade3 = isset($_POST['quantidade3']) ? $_POST['quantidade3'] : 0;
$quantidade4 = isset($_POST['quantidade4']) ? $_POST['quantidade4'] : 0;
$doca=isset($_POST['doca']) ? $_POST['doca'] : 1;
$sql = "UPDATE carga SET quantidade1 = $quantidade1, situacao='Vistoriado', quantidade2 = $quantidade2, quantidade3 = $quantidade3, quantidade4 = $quantidade4 WHERE id = $id and turma_id = '" . $_SESSION['turma'] . "';";
if ($conexao->query($sql) === TRUE) {
    $sql = "INSERT INTO `docas`(`id_doca`, `id_carga`, `id_aluno`, `id_turma`) VALUES ('" . $doca . "','" . $id . "','" . $id_aluno . "','" . $_SESSION['turma'] . "');";
    if ($conexao->query($sql) === TRUE) {
        header('location:../vistoriaCarga.php');
    } else {
        echo "Erro ao atualizar registro: " . $conexao->error;
    }
    $conexao->close();
}

