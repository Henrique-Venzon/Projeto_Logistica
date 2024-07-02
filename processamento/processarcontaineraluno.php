<?php
session_start();
// Create connection
include_once('../include/conexao.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO atividade_concluida (id_transporte, id_turma, id_aluno, sem_lona, avariana_lateral_direita, sem_cabo_de_energia, avaria_no_teto, avaria_na_frente, sem_lacre, adesivos_avariados, excesso_de_altura, excesso_na_direita, excesso_na_esquerda, excesso_na_frente, painel_avariado, avariana_na_lateral_esquerda, container_bem_desgastado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("iiiiiiiiiiiiiiiii", $id_transporte, $id_turma, $id_aluno, $sem_lona, $avariana_lateral_direita, $sem_cabo_de_energia, $avaria_no_teto, $avaria_na_frente, $sem_lacre, $adesivos_avariados, $excesso_de_altura, $excesso_na_direita, $excesso_na_esquerda, $excesso_na_frente, $painel_avariado, $avariana_na_lateral_esquerda, $container_bem_desgastado);

// Set parameters and execute
$id_transporte = $_POST['id_atividade'];
$id_aluno = $_SESSION['id'];
$id_turma = $_SESSION['turma'];
$sem_lona = isset($_POST['sem_lona']) ? 1 : 0;
$avariana_lateral_direita = isset($_POST['avariana_lateral_direita']) ? 1 : 0;
$sem_cabo_de_energia = isset($_POST['sem_cabo_de_energia']) ? 1 : 0;
$avaria_no_teto = isset($_POST['avaria_no_teto']) ? 1 : 0;
$avaria_na_frente = isset($_POST['avaria_na_frente']) ? 1 : 0;
$sem_lacre = isset($_POST['sem_lacre']) ? 1 : 0;
$adesivos_avariados = isset($_POST['adesivos_avariados']) ? 1 : 0;
$excesso_de_altura = isset($_POST['excesso_de_altura']) ? 1 : 0;
$excesso_na_direita = isset($_POST['excesso_na_direita']) ? 1 : 0;
$excesso_na_esquerda = isset($_POST['excesso_na_esquerda']) ? 1 : 0;
$excesso_na_frente = isset($_POST['excesso_na_frente']) ? 1 : 0;
$painel_avariado = isset($_POST['painel_avariado']) ? 1 : 0;
$avariana_na_lateral_esquerda = isset($_POST['avariana_na_lateral_esquerda']) ? 1 : 0;
$container_bem_desgastado = isset($_POST['container_bem_desgastado']) ? 1 : 0;

if ($stmt->execute() === TRUE) {
    echo "Atividade Enviada com sucesso";
    header('location:../containerA.php');
} else {
    echo 'Erro ao inserir dados: ' . $stmt->error;
}

$conn->close();

