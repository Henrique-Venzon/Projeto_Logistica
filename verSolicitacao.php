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
        $tituloPag = 'Ver Solicitação';
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
                $servername = "localhost";
                $username = "root.Att";
                $password = "root";
                $dbname = "logistica";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                $sql_after = "SELECT * FROM nota_fiscal_criada where id_turma = '".$_SESSION['turma']."'";
                $res = $conn->query($sql_after);
                $qtd = $res->num_rows;

                if ($qtd > 0) {
                    print "<div class=\"tabela-scroll\">";
                    print "<table class='table' >";

                    print "<tr>";
                    print "<th>N° Nota Fiscal</th>";
                    print "<th style=\"border-right:none;\">Ver Nota Fiscal</th>";
                    print "</tr>";

                    while ($row = $res->fetch_object()) {
                        $id_atividade = $row->id_atividade;
                        $sql_npedido = "SELECT npedido FROM carga where id='" . $id_atividade . "'";
                        $resultado = $conn->query($sql_npedido);
                        if ($resultado->num_rows > 0) {
                            while($row_npedido = $resultado->fetch_assoc()) {
                                $npedido = $row_npedido["npedido"];
                            }
                        }
                        $data_formatada = date("d/m/Y H:i:s", strtotime($row->data_hora_envio));
                        print "<form method='post' action='nPedido.php'";
                        print "<tr>";
                        print "<td>" . $row->id_notafiscal . "</td>";
                        print "<td>
                            <button class=\"reset\" data-id=\"" . $npedido . "\"><span>ver</span></button>
                            <input name='npedido' type='hidden' value='" . $npedido . "'>
                            </td>";
                        print "</tr>";
                        print "</form>";
                    }
                    print "</table>";
                    print "</div>";

                } else {
                    print "<p class='alert alert-danger'>Não encontrou nenhuma nota fiscal criada</p>";
                }

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