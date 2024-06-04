<?php
// Conectar ao banco de dados
// Substitua 'host', 'usuario', 'senha' e 'banco' pelos seus valores reais
$conn = new mysqli('localhost', 'root.Att', 'root', 'logistica');

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Receber o identificador da posição do estoque via POST
$posicao = $_POST['posicao'];

// Consulta SQL para obter o conteúdo da posição do estoque
$sql = "SELECT * FROM estoque WHERE posicao = '$posicao'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Exibir os resultados como uma tabela HTML
    echo "<table><tr><th>Produto</th><th>Quantidade</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["nome_produto"] . "</td><td>" . $row["quantidade_enviada"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum resultado encontrado.";
}

$conn->close();

