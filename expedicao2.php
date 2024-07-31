<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npedido_ver = $_POST['npedido'];
}
if (!isset($_SESSION['turma'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/amem.svg">

    <meta charset="utf-8">
    <title><?php
    $tituloPag = 'Ver Pedidos';
    echo "$tituloPag";
    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="css/nPedido.css">
    <link rel="stylesheet" href="css/responsividade/nPedidoResponsivo.css">
</head>

<body>
    <?php
  include_once('include/conexao.php');

    $sql = "SELECT * FROM nota_fiscal WHERE id = $notafiscal";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $npedido = $row['npedido'];
            
        }
    } else {
        echo "0 results";
    }
    $conn->close();

    ?>
    <?php
    include 'include/header.php'
        ?>
    <main>
        <?php
        include 'include/menuLateral.php';

        ?>
        <div class="DivDireita">
            <div class="table-inputs">
                <div class="txt">
                    <h1 class="nota">Expedição</h1>
                    <h1 id="v" class="voltar">Voltar</h1>
                </div>
                <div class="tabela-scroll">
                    
                    <table class="table">
                        <tr>
                            <th>Produto</th>
                            <?php
                            if ($produto2 != '')
                                print "
                        <th>Produto 2</th>";
                            if ($produto3 != '')
                                print "
                        <th>Produto 3</th>";
                            if ($produto4 != '')
                                print "
                        <th>Produto 4</th>"; ?>

                        </tr>
                        <tr>
                            <td><?php echo $produto1; ?></td>
                            <?php if ($produto2 != '')
                                echo '<td>' . $produto2 . '</td>'; ?>
                            <?php if ($produto3 != '')
                                echo '<td>' . $produto3 . '</td>'; ?>
                            <?php if ($produto4 != '')
                                echo '<td>' . $produto4 . '</td>'; ?>
                        </tr>
                        <tr>
                            <th>Unidade </th>
                            <?php
                            if ($unidade2 != ' ')
                                print "
                        <th>unidade 2</th>";
                            if ($unidade3 != ' ')
                                print "
                        <th>unidade 3 </th>";
                            if ($unidade4 != ' ')
                                print "
                        <th>unidade 4</th>"; ?>
                        </tr>
                        <tr>
                            <td><?php echo $unidade1; ?></td>
                            <?php if ($unidade2 != ' ')
                                echo '<td>' . $unidade2 . '</td>'; ?>
                            <?php if ($unidade3 != ' ')
                                echo '<td>' . $unidade3 . '</td>'; ?>
                            <?php if ($unidade4 != ' ')
                                echo '<td>' . $unidade4 . '</td>'; ?>
                        </tr>
                        <tr>
                            <th>Quantidade </th>
                            <?php
                            if ($quantidade2 != '0')
                                print "
                        <th>quantidade 2</th>";
                            if ($quantidade3 != '0')
                                print "
                        <th>qantidade 3</th>";
                            if ($quantidade4 != '0')
                                print "
                        <th>quantidade 4</th>"; ?>
                        </tr>
                        <tr>
                            <td><?php echo $quantidade1; ?></td>
                            <?php if ($quantidade2 != '0')
                                echo '<td>' . $quantidade2 . '</td>'; ?>
                            <?php if ($quantidade3 != '0')
                                echo '<td>' . $quantidade3 . '</td>'; ?>
                            <?php if ($quantidade4 != '0')
                                echo '<td>' . $quantidade4 . '</td>'; ?>
                        </tr>
                        
                    </table>
                </div>
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