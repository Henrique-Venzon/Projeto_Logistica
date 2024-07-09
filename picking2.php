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
$id=$_GET['id']
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/amem.svg">
    <meta charset="utf-8">
    <title><?php $tituloPag = 'Picking';
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
                    <h1>Finalizar</h1>
                </div>
                <div class="flex">
                    <div class="divpegar">
                    <form method='post' action="processamento/selecionar_carga.php">
                        <h1 class="pegar">Pegar</h1>
                        <?php
                       include_once('include/conexao.php');

                        $sql = "SELECT * FROM `picking` where  id_pedido= " . $id . " and id_turma='".$_SESSION['turma']."' ORDER BY `picking`.`id` ASC";
                        $res = $conn->query($sql);
                        $qtd = $res->num_rows;

                        if ($qtd > 0) {
                            print "<div class=\"tabela-scroll\">";
                            print "<table class='table' >";
                            print "<tr>";
                            print "<th>Produto</th>";
                            print "<th>Quantidade</th>";
                            print "<th>Posição</th>";
                            print "<th>Pegar</th>";
                            print "</tr>";

                            while ($row = $res->fetch_object()) {
                                echo "<tr>";
                                echo "<td style=\"border-right:1px solid black;\">" . $row->produto . "</td>";
                                echo "<td style=\"border-right:1px solid black;\">" . $row->quantidade_solicitada . "</td>";
                                echo "<td style=\"border-right:1px solid black;\">" . $row->posicao . "</td>";
                                echo "<td><input class=\"custom-checkbox\" type=\"checkbox\" name=\"produtos_selecionados[]\" value=\"" . $row->id . "\"></td>";
                            }
                            print "</table>";
                            print "</div>";
                            print '<DIV class="buttonEnviar">
                            <button>Enviar</button>
                        </DIV>';
                        } else {
                            print "<p class='alert alert-danger'>Não encontrou nenhum pedido nas docas.</p>";
                        }
                        ?>
                    </form>
                    </div>
                    <div class="divpegar">
                    <h1 class="pegar">Finalizar</h1>
                    <?php
                    $sql = "SELECT * FROM pegado where id_doca=1 and id_turma='".$_SESSION['turma']."'";
                    $res = $conn->query($sql);
                    $qtd = $res->num_rows;

                    if ($qtd > 0) {
                        print "<div class=\"tabela-scroll\">";
                        print "<table class='table' >";
                        print "<tr>";
                        print "<th>Produto</th>";
                        print "<th>Quantidade</th>";
                        print "<th>Posição</th>";
                        print "<th>Finalizar</th>";
                        print "</tr>";

                        while ($row = $res->fetch_object()) {
                            print "<tr>";
                            print "<td style=\"border-right:1px solid black;\">" . $row->nome_produto . "</td>";
                            print "<td style=\"border-right:1px solid black;\">" . $row->quantidade_enviada . "</td>";
                            print "<td style=\"border-right:1px solid black;\">" . $row->posicao . "</td>";
                            print "<td>
                                    <form method='post' action='processamento/processar_movimentacaoD1.php' style='display:inline-block'>
                                        <input type='hidden' name='produto_id' value='" . $row->id . "'>
                                        <button class=\"finalizar\" type='submit' name='finalizar'>Finalizar</button>
                                    </form>
                                  </td>";
                            print "</tr>";
                        }
                        print "</table>";
                        print "</div>";
                    } else {
                        print"<div class=\"paragrafo\">";
                        print "<p class='alert alert-danger'>Nenhum produto selecionado.</p>";
                        print"</div>";
                    }
                    ?>
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
