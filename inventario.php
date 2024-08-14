<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php
            $tituloPag = 'inventario';
            echo "$tituloPag";
            ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/amem.svg">
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/inventario.css">
    <script src="js/reveal.js" defer></script>
</head>

<body>
    <?php
    include 'include/header.php'
    ?>
    <main>
        <?php
        include 'include/menuLateral.php'
        ?>
        <div class="DivDireita">
            <div class="table-inputs">
                <div class="txt">
                    <h1>Inventário</h1>
                </div>
                <form method="post" action="">
                    <label for="search">Pesquisar:</label>
                    <input type="text" id="search" name="search">
                    <select name="search_type">
                        <option value="id">ID</option>
                        <option value="nome_produto">Nome do Produto</option>
                        <option value="quantidade_enviada">Quantidade</option>
                        <option value="posicao">Posição</option>
                    </select>
                    <input class="enviar" type="submit" value="Pesquisar">
                </form>

                <?php
                include_once('include/conexao.php');

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $searchTerm = $_POST['search'];
                    $searchType = $_POST['search_type'];

                    // Prepara a query SQL com base no tipo de pesquisa
                    $sql = "SELECT id, nome_produto, quantidade_enviada, posicao FROM estoque WHERE ";
                    if ($searchType === 'nome_produto') {
                        $sql .= "nome_produto LIKE ?"; 
                    } else {
                        $sql .= "$searchType = ?";
                    }

                    $stmt = $conn->prepare($sql);
                    
                    if ($searchType === 'nome_produto') {
                        $searchTerm = "%" . $searchTerm . "%";
                        $stmt->bind_param("s", $searchTerm); 
                    } else {
                        $stmt->bind_param("s", $searchTerm); 
                    }
                    

                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        echo "<div class=\"centro-table\">
                        <table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Nome do Produto</th>
                            <th>Quantidade</th>
                            <th>Posição</th>
                        </tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["nome_produto"] . "</td>
                            <td>" . $row["quantidade_enviada"] . "</td>
                            <td>" . $row["posicao"] . "</td>
                        </tr>";
                        }
                        echo "</table>";
                        echo "</div>";
                    } else {
                        echo "<p>Nenhum resultado encontrado.</p>";
                    }
                    $stmt->close();
                }
                $conn->close();
                ?>
            </div>
        </div>
    </main>

    <script src="js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>