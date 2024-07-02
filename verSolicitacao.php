<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['turma'] = $_POST['turma'];
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
        $tituloPag = 'Verificar Solicitação';
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
    include 'include/header.php'
    ?>
    <main>
        <?php
        include 'include/menuLateral.php';
        ?>
        <div class="DivDireita">
            <div class="table-inputs">
                <div class="text">
                    <h1>Solicitações</h1>
                </div>
                <?php
                 include_once('../include/conexao.php');

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql_after = "SELECT id FROM solicitacao WHERE id_turma = '" . $_SESSION['turma'] . "' ORDER BY id ASC";
                $res = $conn->query($sql_after);
                $qtd = $res->num_rows;

                if ($qtd > 0) {
                    echo "<div class=\"tabela-scroll\">";
                    echo "<table class='table'>";

                    print "<tr>";
                    print "<th>Nº Solicitação</th>";
                    print "<th style=\"border-right:none;\">Ver Solicitação</th>";
                    print "</tr>";

                    while ($row = $res->fetch_object()) {
                        $id_pedido = $row->id;
                        $id = $row->id;
                        echo "<tr>";
                        echo "<td>" . $id_pedido . "</td>";
                        echo "<td>";
                        echo "<form method='get' action='verSolicitacao2.php'>";
                        echo "<button class=\"reset\" type=\"submit\"><span>ver</span></button>";
                        echo "<input name='id_pedido' type='hidden' value='" . $id . "'>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                    echo "</div>";
                } else {
                    print "<p class='alert alert-danger'>Não encontrou nenhuma solicitação feita.</p>";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </main>

    <script src="js/ver.js"></script>
    <script src="js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>
