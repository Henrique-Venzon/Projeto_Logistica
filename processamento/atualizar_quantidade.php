<?php

$conexao = new mysqli('localhost', 'root.Att', 'root', 'logistica');

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}
$id = $_POST['id']; // Adicione esta linha
$row = $_POST['row'];
$quantidade = $_POST['quantidade'];
$valor = $_POST['valor'];
$sql = "UPDATE `carga` SET `quantidade" . $quantidade . "` = '" . $valor . "' WHERE `carga`.`id` = " . $id . ";";
if ($conexao->query($sql) === TRUE) {
    header('Location: ../carga.php', true, 301);
} else {
    echo "Erro: " . $sql . "<br>" . $conexao->error;
}

$conexao->close();
