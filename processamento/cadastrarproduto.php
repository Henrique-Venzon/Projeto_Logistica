<?php
$hostname = "127.0.0.1";
$username = "root.Att";
$password = "root";
$dbname = "logistica";

$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
  echo "Connection failed: " . $conn->connect_error;
  exit();
}else{
    $nome_produto = $_POST['nome_produto'];
    $preco = $_POST['preco'];
    $UN = $_POST['UN'];
    $quantidade = $_POST['quantidade'];
    $sql = "INSERT INTO `produto`(`nome_produto`, `preco`, `UN`, `quantidade` VALUES ('$nome_produto', '$preco', '$UN', '$quantidade')";
    $result = $conn->query($sql);
    header('location:../table_armazem.php');

}

