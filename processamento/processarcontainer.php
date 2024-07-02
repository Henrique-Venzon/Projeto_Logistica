<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once('../include/conexao.php');

    // Verifique a conexão
    if ($conn->connect_error) {
        die('Falha na conexão: ' . $conn->connect_error);
    }

    // Verifica se os valores POST existem e são numéricos
    $placa = $_POST['placa'];
    $NomeMotorista = $_POST['NomeMotorista'];
    $cliente = $_POST['cliente'];
    $container = $_POST['container'];
    $navio = $_POST['navio'];
    $tipo = $_POST['tipo'];
    $lacre = $_POST['lacre'];
    $LacreSif = is_numeric($_POST['LacreSif']) ? $_POST['LacreSif'] : '0';
    $IMO = is_numeric($_POST['IMD']) ? $_POST['IMD'] : '0';
    $NOnu = is_numeric($_POST['NOnu']) ? $_POST['NOnu'] : '0';
    $Temperatura = is_numeric($_POST['temperatura']) ? $_POST['temperatura'] : '26';
    $turma_id=$_SESSION['turma'];

    $sql = "INSERT INTO container (`placa`,`cliente`,`nome_motorista`,`container`,`navio`,`tipo`,`lacre`,`Lacre Sif`,`IMO`,`NOnu`,`situacao`,`temperatura`,`turma_id`) VALUES ('".$placa."','".$cliente."', '".$NomeMotorista."', '".$container."', '".$navio."', '".$tipo."', '".$lacre."', '".$LacreSif."', '".$IMO."', '".$NOnu."', 'enviado','".$Temperatura."','".$turma_id."');";

    if ($conn->query($sql) === TRUE) {
        echo 'Dados inseridos com sucesso!';
        header('location:../containerP.php');
    } else {
        echo 'Erro ao inserir dados: ' . $conn->error;
    }

    $conn->close();

}


