<?php
// Configurações de conexão ao banco de dados
include_once('include/conexao.php');

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchTerm = $_POST['search'];

    // Preparar e executar a consulta SQL
    $sql = "SELECT id, id_doca, nome_produto, quantidade_enviada, posicao 
            FROM estoque 
            WHERE id LIKE ? OR id_doca LIKE ? OR nome_produto LIKE ? OR quantidade_enviada LIKE ? OR posicao LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchTermWildcard = "%" . $searchTerm . "%";
    $stmt->bind_param("sisss", $searchTermWildcard, $searchTermWildcard, $searchTermWildcard, $searchTermWildcard, $searchTermWildcard);
    $stmt->execute();
    $result = $stmt->get_result();

    // Exibir resultados
    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>ID Doca</th>
                    <th>Nome do Produto</th>
                    <th>Quantidade Enviada</th>
                    <th>Posição</th>
                </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["id_doca"] . "</td>
                    <td>" . $row["nome_produto"] . "</td>
                    <td>" . $row["quantidade_enviada"] . "</td>
                    <td>" . $row["posicao"] . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum resultado encontrado.";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pesquisa no Estoque</title>
</head>
<body>
    <h2>Pesquisa no Estoque</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="search">Pesquisar (ID, ID Doca, Nome, Quantidade Enviada, Posição):</label>
        <input type="text" id="search" name="search">
        <input type="submit" value="Pesquisar">
    </form>
</body>
</html>