<?php
session_start();
$conexao = new mysqli('localhost', 'root.Att', 'root', 'logistica');

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}
$id_aluno=$_SESSION['id'];
$id_doca = $_POST['id_doca'];
$quantidade = isset($_POST['quantidade1']) ? $_POST['quantidade'] : 0;
$doca=isset($_POST['doca']) ? $_POST['doca'] : 1;
$sql ="INSERT INTO `movimentacao`(`id_doca`, `nome_produto`, `id_aluno`, `id_turma`) VALUES ('" . $doca . "','" . $id . "','" . $id_aluno . "','" . $_SESSION['turma'] . "');";
if ($conexao->query($sql) === TRUE) {
        header('location:pedidoDoca.php');
    } else {
        echo "Erro ao atualizar registro: " . $conexao->error;
    }
    $conexao->close();


