<?php

include_once('../include/conexao.php');

// Verificar conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

// Buscar o último ID inserido
$sql_busca = "SELECT `id` FROM `carga` ORDER BY `carga`.`id` DESC LIMIT 1;";
$resultado = $conexao->query($sql_busca);

if ($resultado->num_rows > 0) {
    // Obter o último ID inserido
    $ultimo_id_inserido = $resultado->fetch_assoc()['id'];
} else {
    echo "Nenhum resultado encontrado";
}
$npedido = $_GET['npedido'];
$turma_id = $_GET['turma_id'];

$sql = "INSERT INTO `nota_fiscal_criada`(`id_atividade`, `id_turma`) VALUES ('" . $ultimo_id_inserido . "','" . $turma_id . "');";
if ($conexao->query($sql) === TRUE) {
    header('Location: ../containerP.php', true, 301);
} else {
    echo "Erro: " . $sql . "<br>" . $conexao->error;
}

$conexao->close();



