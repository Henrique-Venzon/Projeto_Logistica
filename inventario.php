<!--Corpo -->

<?php
$servername = "localhost";
$username = "root.Att";
$password = "root";
$dbname = "logistica";

$conn = new mysqli($servername, $username, $password, $dbname);
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

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php
    $tituloPag = 'Home';
    echo "$tituloPag";
    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="shortcut icon" href="img/amem.svg">

    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="css/estiloInicio.css">
    <script src="js/reveal.js" defer></script>
    <script src="https://unpkg.com/scrollreveal"></script>
</head>

<body>
    <?php
    include 'include/header.php'
        ?>
    <main>
        <?php
        include 'include/menuLateral.php'
            ?>

       </main<h2>Pesquisa no Estoque</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="search">Pesquisar (ID, ID Doca, Nome, Quantidade Enviada, Posição):</label>
    <input type="text" id="search" name="search">
    <input type="submit" value="Pesquisar">


    </main>



    <script src="js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>