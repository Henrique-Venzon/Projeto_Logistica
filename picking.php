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
              include_once('include/conexao.php');

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                    // Selecionando apenas o ID do picking
                    $sql_after = "SELECT id FROM picking where id_turma='".$_SESSION['turma'] ."'";
                    $res = $conn->query($sql_after);
                
                    $sql_after2 = "SELECT id FROM picking_pegado where id_turma='".$_SESSION['turma'] ."'";
                    $res2 = $conn->query($sql_after2);
                
                    // Buscar todos os resultados como arrays associativos
                    $resultados = array_merge($res->fetch_all(MYSQLI_ASSOC), $res2->fetch_all(MYSQLI_ASSOC));
                
                    if (!empty($resultados)) { // Verificar se o array combinado está vazio
                        echo "<div class=\"tabela-scroll\">";
                        echo "<table class='table'>";
                        echo "<tr>";
                        echo "<th>Nº Solicitação</th>";
                        echo "<th style=\"border-right:none;\">Ver Picking</th>";
                        echo "</tr>";
                
                        // Iterar sobre o array combinado
                        foreach ($resultados as $row) {
                            $id = $row['id'];
                            echo "<tr>";
                            echo "<td>" . $id . "</td>";
                            echo "<td>";
                            echo "<form method='get' action='picking2.php'>";
                            echo "<button class=\"reset\" type=\"submit\"><span>ver</span></button>";
                            echo "<input name='id' type='hidden' value='" . $id . "'>"; 
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
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