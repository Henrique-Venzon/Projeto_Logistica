<?php
  include_once('../include/conexao.php');
if ($conexao->connect_errno) {
    echo "Failed to connect to MySQL: " . $conexao->connect_error;
    exit();
} else {
    $id_atividade = $_POST['id_atividade_ver_perdido'];

    $sql = "UPDATE carga
            SET situacao = 'fechado'
            WHERE id=" . $id_atividade . ";"; 

    $resultado = $conexao->query($sql);
    $conexao->close();
    header('Location: ../verPedido.php', true, 301);
}

