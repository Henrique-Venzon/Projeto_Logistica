<?php
  include_once('../include/conexao.php');
if ($conexao->connect_errno) {
    echo "Failed to connect to MySQL: " . $conexao->connect_error;
    exit();
} else {
    $id_atividade = $_POST['id_atividade_ver_perdido'];
    $antes="DELETE FROM nota_fiscal_criada WHERE id_atividade=". $id_atividade."";
    $resultado = $conexao->query($antes);
    $antes="DELETE FROM docas WHERE id_carga=". $id_atividade."";
    $resultado = $conexao->query($antes);
    $antes="DELETE FROM vistoriado WHERE id=". $id_atividade."";
    $resultado = $conexao->query($antes);
    $sql = "DELETE FROM carga WHERE id=". $id_atividade."";

    $resultado = $conexao->query($sql);
    $conexao->close();
    header('Location: ../verPedido.php', true, 301);
    exit();
}

