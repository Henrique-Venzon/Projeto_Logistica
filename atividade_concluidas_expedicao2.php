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
    <title><?php $tituloPag = 'Atividades';
        echo "$tituloPag"; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="css/expedicao2.css">
</head>

<body>
<?php include 'include/header.php'; ?>
<main>
    <?php include 'include/menuLateral.php'; ?>
    <div class="DivDireita">
        <div class="table-inputs">
            <div class="txtCont">
                <h1>Atividades</h1>
            </div>
            <div class="flex">
                <div class="divpegar">

                    <h1 class="pegar">Informações</h1>
                    <?php
                    include_once('include/conexao.php');

                    $sql = "SELECT * FROM `atividade_concluida_expedicao` where id_pedido='$id_carga' and id_turma='" . $_SESSION['turma'] . "'";
                    $res = $conn->query($sql);
                    $qtd = $res->num_rows;

                    if ($qtd > 0) {
                        print "<div class=\"tabela-scroll\">";
                        print "<table class='table' >";
                        print "<tr>";
                        print "<th>id_pedido</th>";
                        print "<th>Produto</th>";
                        print "<th>Quantidade</th>";
                        print "<th>Doca</th>";
                        print "<th>Horario de finalização</th>";
                        print "</tr>";

                        while ($row = $res->fetch_object()) {
                            echo "<tr>";
                            echo "<td style=\"border-right:1px solid black;\">" . $row->id . "</td>";
                            echo "<td style=\"border-right:1px solid black;\">" . $row->nome_produto . "</td>";
                            echo "<td style=\"border-right:1px solid black;\">" . $row->quantidade . "</td>";
                            echo "<td style=\"border-right:1px solid black;\">" . $row->doca . "</td>";
                            $data_formatada = date("d/m/Y H:i:s", strtotime($row->data_criacao));
                            echo "<td style=\"border-right:1px solid black;\">" . $data_formatada . "</td>";
                            echo "<input class=\"custom-checkbox\" type=\"hidden\" name=\"id_carga\" value=\"" . $row->id_pedido . "\">";
                            echo "</tr>";
                        }
                        print "</table>";
                        print "</div>";
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