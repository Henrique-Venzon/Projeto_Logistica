<?php
$hostname = "127.0.0.1";
$username = "root.Att";
$password = "root";
$dbname = "logistica";

// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  echo "Connection failed: " . $conn->connect_error;
  exit();
}else{
    $nome_produto = $_POST['nome_produto'];
    $preco = $_POST['preco'];
    $UN = $_POST['UN'];
    $sql = "INSERT INTO `produto`(`nome_produto`, `preco`, `UN`) VALUES ('$nome_produto', '$preco', '$UN')";
    $result = $conn->query($sql);
}

