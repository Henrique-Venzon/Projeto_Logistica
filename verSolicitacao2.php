<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pedido = $_POST['id_pedido'];
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
    $tituloPag = 'Ver Solicitação';
    echo "$tituloPag";
    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="css/nPedido.css">
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root.Att";
    $password = "root";
    $dbname = "logistica";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT `id_pedido`, `produto`, `produto2`, `produto3`, `produto4`,`quantidade`, `quantidade2`, `quantidade3`, `quantidade4`,`id_turma` FROM solicitacao where id_turma = '" . $_SESSION['turma'] . "' and `id_pedido`='" . $id_pedido . "'  ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id_pedido = $row['id_pedido'];
            $produto1 = $row['produto'];
            $produto2 = $row['produto2'];
            $produto3 = $row['produto3'];
            $produto4 = $row['produto4'];
            $quantidade1 = $row['quantidade'];
            $quantidade2 = $row['quantidade2'];
            $quantidade3 = $row['quantidade3'];
            $quantidade4 = $row['quantidade4'];
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
                    <h1>Pedido</h1>
                </div>
                <div class="tabela-scroll">
                    <Div class="nomet">
                        <h1>Produtos Solicitados:</h1>
                    </Div>
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