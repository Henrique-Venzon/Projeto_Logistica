<?php

$conn = new mysqli('localhost', 'root.Att', 'root', 'logistica');

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$posicao = $_POST['posicao'];

$sql = "SELECT * FROM estoque WHERE posicao = '$posicao'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    echo "<div class=\"tableScroll\">
    <table class=\"table\"><tr>
    <th>Produto</th>
    <th >Quantidade</th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["nome_produto"] . "</td>
        <td >" . $row["quantidade_enviada"] . "</td>
        </tr>";
    }"</table>
    echo </div>";
} else {
    echo "Nenhum resultado encontrado.";
}

$conn->close();
