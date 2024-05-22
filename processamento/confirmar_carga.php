<?php

$conexao = new mysqli('localhost', 'root.Att', 'root', 'logistica');

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}
$id = $_POST['id'];
$quantidade1 = isset($_POST['quantidade1']) ? $_POST['quantidade1'] : 0;
$quantidade2 = isset($_POST['quantidade2']) ? $_POST['quantidade2'] : 0;
$quantidade3 = isset($_POST['quantidade3']) ? $_POST['quantidade3'] : 0;
$quantidade4 = isset($_POST['quantidade4']) ? $_POST['quantidade4'] : 0;


echo '<br> ID ';
echo $id;
echo '<br> 1 ';
echo $quantidade1;
echo '<br> 2 ';
echo $quantidade2;
echo '<br> 3 ';
echo $quantidade3;
echo '<br> 4 ';
echo $quantidade4;

$conexao->close();
