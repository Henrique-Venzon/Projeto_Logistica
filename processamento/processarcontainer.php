<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hostname = '127.0.0.1';
    $user = 'root.Att';
    $password = 'root';
    $database = 'logistica';

    $conn = new mysqli($hostname, $user, $password, $database);

    // Verifique a conexão
    if ($conn->connect_error) {
        die('Falha na conexão: ' . $conn->connect_error);
    }

    // Verifica se os valores POST existem e são numéricos
    $placa = $_POST['placa'];
    $NomeMotorista = $_POST['NomeMotorista'];
    $container = $_POST['container'];
    $navio = $_POST['navio'];
    $tipo = $_POST['tipo'];
    $lacre = $_POST['lacre'];
    $LacreSif = is_numeric($_POST['LacreSif']) ? $_POST['LacreSif'] : 0;
    $IMO = isset($_POST['IMD']) ? $_POST['IMD'] : 'NULL';
    $NOnu = is_numeric($_POST['NOnu']) ? $_POST['NOnu'] : 0;
    $Temperatura = is_numeric($_POST['temperatura']) ? $_POST['temperatura'] : NULL;
    $turma_id=$_SESSION['turma'];

    $sql = "INSERT INTO container (`placa`,`NomeMotorista`,`container`,`navio`,`tipo`,`lacre`,`LacreSif`,`IMO`,`NOnu`,`situacao`,`temperatura`,`turma_id`) VALUES ('".$placa."', '".$NomeMotorista."', '".$container."', '".$navio."', '".$tipo."', '".$lacre."', '".$LacreSif."', '".$IMD."', '".$NOnu."', 'enviado','".$Temperatura."','".$turma_id."');";

    if ($conn->query($sql) === TRUE) {
        echo 'Dados inseridos com sucesso!';
        header('location:../containerP.php');
    } else {
        echo 'Erro ao inserir dados: ' . $conn->error;
    }

    $conn->close();

}


