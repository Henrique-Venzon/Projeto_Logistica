
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hostname = "127.0.0.1";
    $user = "root.Att";
    $password = "root";
    $database = "logistica";

    $conn = new mysqli($hostname, $user, $password, $database);



    $sCepOrigem = $_POST['sCepOrigem'];
    $sCepDestino = $_POST['sCepDestino'];
    $nVlPeso = $_POST['nVlPeso'];
    $nVlComprimento = $_POST['nVlComprimento'];
    $nVlAltura = $_POST['nVlAltura'];
    $nVlLargura = $_POST['nVlLargura'];
    $nCdServico = $_POST['nCdServico'];

    $sql = "INSERT INTO calculofrete (sCepOrigem, sCepDestino, nVlPeso, nVlComprimento, nVlAltura, nVlLargura, nCdServico, valorFrete, prazoEntrega)
    VALUES ('$sCepOrigem', '$sCepDestino', '$nVlPeso', '$nVlComprimento', '$nVlAltura', '$nVlLargura', '$nCdServico', '$valorFrete', '$prazoEntrega')";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}
?>
