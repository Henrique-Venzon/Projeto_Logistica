<?php
// Configurações de conexão
$servername = "localhost";
$username = "root";
$password = "";
$database = "troca";

// Estabelece a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se o formulário foi submetido para retirar produtos do estoque
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["retirar_produto"])) {
    $nome_produto_retirado = $_POST["nome_produto_retirado"];
    $quantidade_retirada = $_POST["quantidade_retirada"];
    $Npedido = $_POST["Npedido"];

    // Atualiza a quantidade do produto no estoque
    $sql_update_estoque = "UPDATE estoque SET quantidade = quantidade - $quantidade_retirada WHERE nome = '$nome_produto_retirado' AND Npedido = '$Npedido'";
    if ($conn->query($sql_update_estoque) === TRUE) {
        // Insere os produtos retirados na tabela de solicitação
        $sql_insert_solicitacao = "INSERT INTO solicitacao (nome_produto, quantidade, Npedido) VALUES ('$nome_produto_retirado', $quantidade_retirada, '$Npedido')";
        if ($conn->query($sql_insert_solicitacao) === TRUE) {
            echo "Produto retirado do estoque e adicionado à solicitação com sucesso!<br>";
        } else {
            echo "Erro ao adicionar produto à solicitação: " . $conn->error;
        }
    } else {
        echo "Erro ao retirar produto do estoque: " . $conn->error;
    }
}

// Verifica se o formulário foi submetido para adicionar produtos ao estoque
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["adicionar_produto"])) {
    $nome_produto_adicionado = $_POST["nome_produto_adicionado"];
    $quantidade_adicionada = $_POST["quantidade_adicionada"];
    $Npedido = $_POST["Npedido"];

    // Insere o produto no estoque
    $sql_insert_estoque = "INSERT INTO estoque (nome, quantidade, Npedido) VALUES ('$nome_produto_adicionado', $quantidade_adicionada, '$Npedido')";
    if ($conn->query($sql_insert_estoque) === TRUE) {
        echo "Produto adicionado ao estoque com sucesso!<br>";
    } else {
        echo "Erro ao adicionar produto ao estoque: " . $conn->error;
    }
}

// Verifica se o formulário foi submetido para atualizar produtos no estoque
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["atualizar_produto"])) {
    $id_produto = $_POST["id_produto"];
    $novo_nome_produto = $_POST["novo_nome_produto"];
    $nova_quantidade_produto = $_POST["nova_quantidade_produto"];
    $Npedido = $_POST["Npedido"];

    // Atualiza o nome e a quantidade do produto no estoque
    $sql_update_produto = "UPDATE estoque SET nome = '$novo_nome_produto', quantidade = $nova_quantidade_produto, Npedido = '$Npedido' WHERE id = $id_produto";
    if ($conn->query($sql_update_produto) === TRUE) {
        echo "Produto atualizado com sucesso!<br>";
    } else {
        echo "Erro ao atualizar produto: " . $conn->error;
    }
}

// Exibe os dados da tabela "estoque" em formato de tabela HTML
$sql_select_estoque = "SELECT * FROM estoque";
$result_estoque = $conn->query($sql_select_estoque);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Estoque</title>
</head>

<body>
    <h2>Estoque</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Número do Pedido</th>
        </tr>
        <?php
        if ($result_estoque->num_rows > 0) {
            while ($row = $result_estoque->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nome"] . "</td><td>" . $row["quantidade"] . "</td><td>" . $row["Npedido"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum produto encontrado</td></tr>";
        }
        ?>
    </table>

    <h2>Retirar Produto do Estoque</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Produto: <input type="text" name="nome_produto_retirado"><br><br>
        Quantidade: <input type="number" name="quantidade_retirada" min="1"><br><br>
        Número do Pedido: <input type="text" name="Npedido" required><br><br>
        <input type="submit" name="retirar_produto" value="Retirar do Estoque">
    </form>

    <h2>Adicionar Produto ao Estoque</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Nome do Produto: <input type="text" name="nome_produto_adicionado"><br><br>
        Quantidade: <input type="number" name="quantidade_adicionada" min="1"><br><br>
        Número do Pedido: <input type="text" name="Npedido" required><br><br>
        <input type="submit" name="adicionar_produto" value="Adicionar ao Estoque">
    </form>

    <h2>Atualizar Produto no Estoque</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        ID do Produto: <input type="number" name="id_produto" min="1"><br><br>
        Novo Nome do Produto: <input type="text" name="novo_nome_produto"><br><br>
        Nova Quantidade: <input type="number" name="nova_quantidade_produto" min="1"><br><br>
        Número do Pedido: <input type="text" name="Npedido" required><br><br>
        <input type="submit" name="atualizar_produto" value="Atualizar Produto">
    </form>
</body>

</html>

<?php
// Fecha a conexão
$conn->close();
?>
