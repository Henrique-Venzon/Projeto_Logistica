<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/amem.svg">
    <meta charset="utf-8">
    <title>
        <?php
        $tituloPag = 'Picking';
        echo "$tituloPag";
        ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/verPedidos.css">
</head>

<body>
    <?php
    include 'include/header.php';
    ?>
    <main>
        <?php
        include 'include/menuLateral.php';
        ?>
        <div class="DivDireita">
            <div class="table-inputs">
                <div class="text">
                    <h1>Picking</h1>
                </div>
                <?php
                include_once ('include/conexao.php');

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Usando UNION para combinar as consultas e DISTINCT para remover duplicatas
                $sql_after = "SELECT id_pedido, id FROM picking WHERE id_turma='" . $_SESSION['turma'] . "' 
                              UNION 
                              SELECT id_pedido, id FROM picking_pegado WHERE id_turma='" . $_SESSION['turma'] . "'
                              ORDER BY id_pedido";

                $res = $conn->query($sql_after);

                if ($res->num_rows > 0) {
                    echo "<div class=\"tabela-scroll\">";
                    echo "<table class='table'>";
                    echo "<tr>";
                    echo "<th>Nº Solicitação</th>";
                    echo "<th style=\"border-right:none;\">Ver Picking</th>";
                    echo "</tr>";

                    $ids_unicos = array(); // Array para armazenar os IDs únicos

                    while ($row = $res->fetch_assoc()) {
                        $id = $row['id'];
                        $id_pedido = $row['id_pedido'];

                        // Verifica se o ID já foi adicionado
                        if (!in_array($id_pedido, $ids_unicos)) {
                            $ids_unicos[] = $id_pedido; // Adiciona o ID ao array de IDs únicos

                            echo "<tr>";
                            echo "<td>" . $id_pedido . "</td>";
                            echo "<td>";
                            echo "<form method='get' action='picking2.php'>";
                            echo "<button class=\"reset\" type=\"submit\"><span>ver</span></button>";
                            echo "<input name='id' type='hidden' value='" . $id_pedido . "'>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    }

                    echo "</table>";
                    echo "</div>";
                } else {
                    echo "<p class='alert alert-danger'>Não encontrou nenhuma solicitação feita.</p>";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </main>

    <script src="js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>