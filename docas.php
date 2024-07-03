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
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/amem.svg">
    <meta charset="utf-8">
    <title>
        <?php
        $tituloPag = 'Docas';
        echo "$tituloPag";
        ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/doca.css">
    <link rel="stylesheet" href="css/responsividade/docasResponsivo.css">
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
                    <h1>Docas</h1>
                </div>
                <?php
         include_once('include/conexao.php');

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // SQL para selecionar docas e juntar com a tabela de vistoriados para obter as quantidades
                $sql = "SELECT d.id_carga, d.id_doca, v.quantidade1, v.quantidade2, v.quantidade3, v.quantidade4 
                        FROM docas d
                        JOIN vistoriado v ON d.id_carga = v.id
                        WHERE v.turma_id = '$turma_id'"; 

                $res = $conn->query($sql);

                if ($res->num_rows > 0) {
                    print "<div class=\"tabela-scroll\">";
                    print "<table class='table'>";

                    print "<tr>";
                    print "<th>ID do Pedido</th>";
                    print "<th style=\"border-right:none;\">Confirmar Pedido</th>";
                    print "</tr>";

                    while ($row = $res->fetch_object()) {

                        if (
                            (isset($row->quantidade1) && $row->quantidade1 > 0) ||
                            (isset($row->quantidade2) && $row->quantidade2 > 0) ||
                            (isset($row->quantidade3) && $row->quantidade3 > 0) ||
                            (isset($row->quantidade4) && $row->quantidade4 > 0)
                        ) {
                            print "<tr>";
                            print "<td>" . $row->id_carga . "</td>";
                            print "<td>";
                            print "<form action='pedidoDoca.php' method='post'>";
                            print "<input type='hidden' name='id_carga' value='" . $row->id_carga . "'>";
                            print "<input type='hidden' name='id_doca' value='" . $row->id_doca . "'>";
                            print "<button type='submit'><span>Ver</span></button>";
                            print "</form>";
                            print "</td>";
                            print "</tr>";
                        }
                    }
                    print "</table>";
                    print "</div>";
                } else {
                    print "<p class='alert alert-danger'>Não encontrou nenhum pedido nas docas.</p>";
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
