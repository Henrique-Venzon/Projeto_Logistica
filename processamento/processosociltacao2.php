<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Credenciais do banco de dados
$servername = "localhost";
$username = "root.Att";
$password = "root";
$dbname = "logistica";
// Conectar ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capturar os dados do formulário usando os nomes dos inputs
$id_produto = $_POST['id_produto'];
$quantidadeS = $_POST['quantidadeS'];
$posicao = $_POST['posicao'];
$quantidade = $_POST['quantidade'];

// Verificar se os dados foram recebidos corretamente
if (isset($id_produto, $quantidadeS, $posicao, $quantidade)) {
    // Preparar e executar a inserção dos dados na tabela 'solicitacao2'
    $sql = "INSERT INTO solicitacao2  (id_produto, quantidadeS, posicao, quantidade)
            VALUES ('$id_produto', $quantidadeS, '$posicao', $quantidade)";

    if ($conn->query($sql) === TRUE) {
        echo "Nova solicitação registrada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Erro: Dados não recebidos corretamente.";
}

// Fechar a conexão
$conn->close();
?>