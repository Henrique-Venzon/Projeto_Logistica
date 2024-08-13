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
$id_carga = $_POST['id_carga'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/amem.svg">
    <meta charset="utf-8">
    <title><?php $tituloPag = 'Movimentação';
    echo "$tituloPag"; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/movDocas.css">
</head>

<body>
    <?php include 'include/header.php'; ?>
    <main>
        <?php include 'include/menuLateral.php'; ?>
        <div class="DivDireita">
            <div class="table-inputs">
                <div class="txtCont">
                    <h1>Doca 1</h1>
                </div>
                <div class="flex">
                    <div class="divpegar">
                        <form method='post' action="processamento/concluir_processamento.php">
                            <h1 class="pegar">Pegar</h1>
                            <?php
                            include_once ('include/conexao.php');

                            $sql = "SELECT * FROM `expedicao` where id_pedido='$id_carga' and id_turma='" . $_SESSION['turma'] . "'";
                            $res = $conn->query($sql);
                            $qtd = $res->num_rows;

                            if ($qtd > 0) {
                                print "<div class=\"tabela-scroll\">";
                                print "<table class='table' >";
                                print "<tr>";
                                print "<th>Produto</th>";
                                print "<th>Quantidade</th>";
                                print "<th>Doca</th>";
                                print "</tr>";

                                while ($row = $res->fetch_object()) {
                                    echo "<tr>";
                                    echo "<td style=\"border-right:1px solid black;\">" . $row->nome_produto . "</td>";
                                    echo "<td style=\"border-right:1px solid black;\">" . $row->quantidade_enviada . "</td>";
                                    echo "<td style=\"border-right:1px solid black;\">" . $row->id_doca . "</td>";
                                    echo "<input class=\"custom-checkbox\" type=\"hidden\" name=\"id_carga\" value=\"" . $row->id_pedido . "\">";
                                    echo "</tr>";
                                }
                                print "</table>";
                                print "</div>";

                                $sql_picking = "SELECT COUNT(*) as total_picking FROM picking WHERE id_pedido = '$id_carga'";
                                $res_picking = $conn->query($sql_picking);
                                $row_picking = $res_picking->fetch_object();
                                $total_picking = $row_picking->total_picking;

                                $sql_picking_pegado = "SELECT COUNT(*) as total_picking_pegado FROM picking_pegado WHERE id_pedido = '$id_carga'";
                                $res_picking_pegado = $conn->query($sql_picking_pegado);
                                $row_picking_pegado = $res_picking_pegado->fetch_object();
                                $total_picking_pegado = $row_picking_pegado->total_picking_pegado;

                                if ($total_picking == $total_picking_pegado) {
                                    print '                        <DIV class="buttonEnviar">
                                        <button>Enviar</button>
                                    </DIV>';
                                } else {
                                    print '<div class="alert alert-warning" role="alert">
                                        O pedido não está totalmente pronto!
                                    </div>';
                                    print '                        <DIV class="buttonEnviar">
                                        <button type="submit" onclick="return confirm(\'Tem certeza de que deseja enviar o pedido mesmo que não esteja totalmente pronto?\')">Enviar</button>
                                    </DIV>';
                                }
                            } else {
                                print "<p class='alert alert-danger'>Não encontrou nenhum pedido nas docas.</p>";
                            }
                            ?>
                        </form>
                    </div>
                </div>

            </div>
    </div>
    </main>

    <script src="js/movimentar.js"></script>
    <script src="js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>