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
    $placa = $_POST['placa'];
    $NomeMotorista = $_POST['NomeMotorista'];
    $container = $_POST['container'];
    $navio = $_POST['navio'];
    $tipo = $_POST['tipo'];
    $lacre = $_POST['lacre'];
    $LacreSif = $_POST['LacreSif'];
    $IMD = $_POST['IMD'];
    $NOnu = $_POST['NOnu'];
    $npedido = $_POST['npedido'];
    $Empresa = $_POST['Empresa'];
    $cliente = $_POST['Cliente'];
    $telefone = $_POST['Telefone'];
    $CEP = $_POST['CEP'];
    $produto1 = $_POST['produto1'];
    $produto2 = $_POST['produto2'];
    $produto3 = $_POST['produto3'];
    $produto4 = $_POST['produto4'];
    $unidade1 = $_POST['unidade1'];
    $unidade2 = $_POST['unidade2'];
    $unidade3 = $_POST['unidade3'];
    $unidade4 = $_POST['unidade4'];
    $quantidade1 = $_POST['quantidade1'];
    $quantidade2 = $_POST['quantidade2'];
    $quantidade3 = $_POST['quantidade3'];
    $quantidade4 = $_POST['quantidade4'];
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $valor3 = $_POST['valor3'];
    $valor4 = $_POST['valor4'];
    $ncm1 = $_POST['ncm1'];
    $ncm2 = $_POST['ncm2'];
    $ncm3 = $_POST['ncm3'];
    $ncm4 = $_POST['ncm4'];
    $cst1 = $_POST['cst1'];
    $cst2 = $_POST['cst2'];
    $cst3 = $_POST['cst3'];
    $cst4 = $_POST['cst4'];
    $cfop1 = $_POST['cfop1'];
    $cfop2 = $_POST['cfop2'];
    $cfop3 = $_POST['cfop3'];
    $cfop4 = $_POST['cfop4'];
    $Temperatura = $_POST['temperatura'];
    $sql = " INSERT INTO transporte
    (`placa`,`NomeMotorista`,`container`,`navio`,`tipo`,`lacre`,`LacreSif`,`IMD`,`NOnu`,`situacao`,`npedido`,`Empresa`,`cliente`,`Telefone`,`CEP`,`produto1`,`produto2`,`produto3`,`produto4`,`unidade1`,`unidade2`,`unidade3`,`unidade4`,`quantidade1`,`quantidade2`,`quantidade3`,`quantidade4`,`valor1`,`valor2`,`valor3`,`valor4`,`ncm1`,`ncm2`,`ncm3`,`ncm4`,`cst1`,`cst2`,`cst3`,`cst4`,`cfop1`,`cfop2`,`cfop3`,`cfop4`,`temperatura`
    )
    VALUES ('".$placa."', '".$NomeMotorista."', '".$container."', '".$navio."', '".$tipo."', '".$lacre."', '".$LacreSif."', '".$IMD."', '".$NOnu."', 'enviado', '".$npedido."', '".$Empresa."', '".$cliente."', '".$Telefone."', '".$CEP."', '".$produto1."', '".$produto2."', '".$produto3."', '".$produto4."', '".$unidade1."', '".$unidade2."', '".$unidade3."', '".$unidade4."', '".$quantidade1."', '".$quantidade2."', '".$quantidade3."', '".$quantidade4."', '".$valor1."', '".$valor2."', '".$valor3."', '".$valor4."', '".$ncm1."', '".$ncm2."', '".$ncm3."', '".$ncm4."', '".$cst1."', '".$cst2."', '".$cst3."','".$cst4."','".$cfop1."','".$cfop2."','".$cfop3."','".$cfop4."','".$Temperatura."');";
    ;

    if ($conn->query($sql) === TRUE) {
        echo 'Dados inseridos com sucesso!';
        header('location:../containerP.php');
    } else {
        echo 'Erro ao inserir dados: ' . $conn->error;
    }

    $conn->close();

}

