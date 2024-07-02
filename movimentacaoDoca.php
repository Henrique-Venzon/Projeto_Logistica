<?php
$id_aluno = 1;
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}
if (!isset($_SESSION['turma'])) {
    header("Location: index.php");
    exit;
}
$turma = $_SESSION['turma'];
?>
<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/amem.svg">

    <meta charset="utf-8">
    <title><?php
    $tituloPag = 'Movimentação';
    echo "$tituloPag";
    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="css/movimentacaoDc.css">
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
                <div class="txtCont">
                    <h1>Movimentação</h1>
                </div>
                <div class="container">
                    <div class="espacamento">
                        <div class="cardsDocas" id="doca1">
                            <h1>Doca 1</h1>
                            <?php
                         include_once('include/conexao.php');

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Modificado para incluir junção com a tabela 'carga' e condição na coluna 'situacao'
                            $sql = "
                                    SELECT docas.id_carga 
                                    FROM docas 
                                    JOIN vistoriado ON docas.id_carga = vistoriado.id 
                                    WHERE docas.id_doca = '1' AND vistoriado.situacao = 'Vistoriado' AND vistoriado.turma_id = '$turma'
                                    ";

                            $res = $conn->query($sql);

                            $qtd = $res->num_rows;

                            if ($qtd > 0) {
                                print "<div class=\"tabela-scroll\">";
                                print "<table class='table' >";
                                print "<tr>";
                                print "<th style=\"border-left:none;\">N° Pedido</th>";
                                print "</tr>";

                                while ($row = $res->fetch_object()) {
                                    print "<tr>";
                                    print "<td style=\"border-right:1px solid black;\">" . $row->id_carga . "</td>";
                                    print "</tr>";
                                }
                                print "</table>";
                                print "</div>";
                            } else {
                                print "<p class='alert alert-danger'>Não encontrou nenhum pedido nas docas.</p>";
                            }
                            ?>

                        </div>
                        <div class="cardsDocas" id="doca2">
                            <h1>Doca 2</h1>
                            <?php
                            $servername = "localhost";
                            $username = "root.Att";
                            $password = "root";
                            $dbname = "logistica";

                            // Create connection

                            $sql = "
                                    SELECT docas.id_carga 
                                    FROM docas 
                                    JOIN vistoriado ON docas.id_carga = vistoriado.id 
                                    WHERE docas.id_doca = '2' AND vistoriado.situacao = 'Vistoriado' AND vistoriado.turma_id = '$turma'
                                    ";

                            $res = $conn->query($sql);

                            $qtd = $res->num_rows;

                            if ($qtd > 0) {
                                print "<div class=\"tabela-scroll\">";
                                print "<table class='table' >";
                                print "<tr>";
                                print "<th style=\"border-left:none;\">N° Pedido</th>";
                                print "</tr>";

                                while ($row = $res->fetch_object()) {
                                    print "<tr>";
                                    print "<td style=\"border-right:1px solid black;\">" . $row->id_carga . "</td>";
                                    print "</tr>";
                                }
                                print "</table>";
                                print "</div>";

                            } else {
                                print "<p class='alert alert-danger'>Não encontrou nenhum pedido nas docas.</p>";
                            }
                            ?>
                        </div>
                        <div class="cardsDocas" id="doca3">
                            <h1>Doca 3</h1>
                            <?php
                            $servername = "localhost";
                            $username = "root.Att";
                            $password = "root";
                            $dbname = "logistica";

                            // Create connection

                            $sql = "
                                    SELECT docas.id_carga 
                                    FROM docas 
                                    JOIN vistoriado ON docas.id_carga = vistoriado.id 
                                    WHERE docas.id_doca = '3' AND vistoriado.situacao = 'Vistoriado' AND vistoriado.turma_id = '$turma'
                                    ";

                            $res = $conn->query($sql);

                            $qtd = $res->num_rows;

                            if ($qtd > 0) {
                                print "<div class=\"tabela-scroll\">";
                                print "<table class='table' >";
                                print "<tr>";
                                print "<th style=\"border-left:none;\">N° Pedido</th>";
                                print "</tr>";

                                while ($row = $res->fetch_object()) {
                                    print "<tr>";
                                    print "<td style=\"border-right:1px solid black;\">" . $row->id_carga . "</td>";
                                    print "</tr>";
                                }
                                print "</table>";
                                print "</div>";

                            } else {
                                print "<p class='alert alert-danger'>Não encontrou nenhum pedido nas docas.</p>";
                            }
                            ?>
                        </div>
                        <div class="cardsDocas" id="doca4">
                            <h1>Doca 4</h1>
                            <?php
                            $servername = "localhost";
                            $username = "root.Att";
                            $password = "root";
                            $dbname = "logistica";

                            // Create connection

                            $sql = "
                                    SELECT docas.id_carga 
                                    FROM docas 
                                    JOIN vistoriado ON docas.id_carga = vistoriado.id 
                                    WHERE docas.id_doca = '4' AND vistoriado.situacao = 'Vistoriado' AND vistoriado.turma_id = '$turma'
                                    ";

                            $res = $conn->query($sql);

                            $qtd = $res->num_rows;

                            if ($qtd > 0) {
                                print "<div class=\"tabela-scroll\">";
                                print "<table class='table' >";
                                print "<tr>";
                                print "<th style=\"border-left:none;\">N° Pedido</th>";
                                print "</tr>";

                                while ($row = $res->fetch_object()) {
                                    print "<tr>";
                                    print "<td style=\"border-right:1px solid black;\">" . $row->id_carga . "</td>";
                                    print "</tr>";
                                }
                                print "</table>";
                                print "</div>";

                            } else {
                                print "<p class='alert alert-danger'>Não encontrou nenhum pedido nas docas.</p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <script src="js/movimentar.js"></script>
    <script src="js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>
