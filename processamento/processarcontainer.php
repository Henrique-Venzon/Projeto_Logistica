<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hostname = "127.0.0.1";
    $user = "root.Att";
    $password = "root";
    $database = "logistica";



$conn = new mysqli($hostname, $user, $password, $database);

// Verifique a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


$placa = $_POST["placa"];
$NomeMotorista = $_POST["NomeMotorista"];
$container=$_POST["container"];
$navio= $_POST["navio"];
$cliente=$_POST["cliente"];
$tipo= $_POST["tipo"];
$lacre= $_POST["lacre"];
$LacreSif= $_POST["LacreSif"];
$Temperatura=$_POST["Temperatura"];
$IMD= $_POST["IMD"];
$NOnu= $_POST["NOnu"];




// Insira os dados na tabela 'processo_container'
$sql = "INSERT INTO processo_container (placa, NomeMotorista, container,navio,cliente,tipo,lacre,LacreSif,Temperatura,IMD,NOnu,situacao)
        VALUES ('$placa', '$NomeMotorista', '$container','$navio','$cliente','$tipo','$lacre','$LacreSif','$Temperatura','$IMD','$NOnu','enviado')";
if ($conn->query($sql) === TRUE) {
    echo "Dados inseridos com sucesso!";
    header('location:../containerP.php');
} else {
    echo "Erro ao inserir dados: " . $conn->error;
}

$conn->close();

}

