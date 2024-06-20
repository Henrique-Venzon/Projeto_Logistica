<?php
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

// Capturar os dados do formulário
$id_produto = $_POST['id_produto'];
$quantidadeS = $_POST['quantidadeS'];
$posicao = $_POST['posicao'];
$quantidade = $_POST['quantidade'];

// Inserir os dados na tabela 'solicitacao2'
$sql = "INSERT INTO solicitacao2 (id_produto, quantidadeS, posicao, quantidade)
        VALUES ('$id_produto', $quantidadeS, '$posicao', $quantidade)";

if ($conn->query($sql) === TRUE) {
    echo "Nova solicitação registrada com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

// Fechar a conexão
$conn->close();
?>