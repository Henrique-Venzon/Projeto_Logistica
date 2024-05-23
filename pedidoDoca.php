<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npedido_ver = $_POST['idCarga'];
}
if (!isset($_SESSION['turma'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>

<head>
    <meta name="vierport" content="width=device-width, initial-scale=1.0">
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

    <link rel="stylesheet" href="css/pedidoDoca.css">
</head>

<body>
<?php
    $servername = "localhost";
    $username = "root.Att";
    $password = "root";
    $dbname = "logistica";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT`npedido`,  `produto1`, `produto2`, `produto3`, `produto4`, `unidade1`, `unidade2`, `unidade3`, `unidade4`, `quantidade1`, `quantidade2`, `quantidade3`, `quantidade4`,`turma_id` FROM carga where turma_id = '" . $_SESSION['turma'] . "' and `npedido`='" . $npedido_ver . "'  ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $produto1 = $row['produto1'];
            $produto2 = $row['produto2'];
            $produto3 = $row['produto3'];
            $produto4 = $row['produto4'];
            $unidade1 = $row['unidade1'];
            $unidade2 = $row['unidade2'];
            $unidade3 = $row['unidade3'];
            $unidade4 = $row['unidade4'];
            $quantidade1 = $row['quantidade1'];
            $quantidade2 = $row['quantidade2'];
            $quantidade3 = $row['quantidade3'];
            $quantidade4 = $row['quantidade4'];
            $turma_id = $row['turma_id'];
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
                    <Div class="nomet">
                        <h1>Doca</h1>
                    </Div>
                    <div class="tabela-scroll">
                    <table class="table">
                        <tr>
                            <th>Produto</th>
                            <th>Unidade</th>
                            <th>Quantidade</th>
                            <th>Quantidade</th>
                            <th>Posição</th>
                            <th>Enviar</th>
                        </tr>
                        <td><?php echo $produto1; ?></td>
                        <td><?php echo $unidade1; ?></td>
                        <td><?php echo $quantidade1; ?></td>
                        <td><input type="text"></td>
                        <td><select name='posicao'>
                                        <option value="a1">A1</option>
                                        <option value="a2">A2</option>
                                        <option value="a3">A3</option>
                                        <option value="a4">A4</option>
                                        <option value="b1">B1</option>
                                        <option value="b2">B2</option>
                                        <option value="b3">B3</option>
                                        <option value="b4">B4</option>
                                        <option value="c1">C1</option>
                                        <option value="c2">C2</option>
                                        <option value="c3">C3</option>
                                        <option value="c4">C4</option>
                                        <option value="d1">D1</option>
                                        <option value="d2">D2</option>
                                        <option value="d3">D3</option>
                                        <option value="d4">D4</option>
                                    </select></td>
                        <td><button>Enviar</button></td>
                        </tr>
                        <tr>
                        <?php if ($produto2 != '')
                                echo '<td>' . $produto2 . '</td>'; ?>
                            <?php if ($unidade2 != ' ')
                                echo '<td>' . $unidade2 . '</td>'; ?>
                            <?php if ($quantidade2 != '0')
                                echo '<td>' . $quantidade2 . '</td>'; ?>
                            <?php if ($quantidade2 != '0')
                                echo '<td><input type="text"></td>'; ?>
                            <?php if ($quantidade2 != '0')
                                echo '<td> <select name="posicao">;
                                <option value="a1">A1</option>
                                <option value="a2">A2</option>
                                <option value="a3">A3</option>
                                <option value="a4">A4</option>
                                <option value="b1">B1</option>
                                <option value="b2">B2</option>
                                <option value="b3">B3</option>
                                <option value="b4">B4</option>
                                <option value="c1">C1</option>
                                <option value="c2">C2</option>
                                <option value="c3">C3</option>
                                <option value="c4">C4</option>
                                <option value="d1">D1</option>
                                <option value="d2">D2</option>
                                <option value="d3">D3</option>
                                <option value="d4">D4</option>
                            </select> </td>'; ?>
                             <?php if ($quantidade2 != '0')
                                echo '<td><button>Enviar</button></td>'; ?>
                        </tr>
                        <tr>
                            
                        <?php if ($produto3 != '')
                                echo '<td>' . $produto3 . '</td>'; ?>
                            <?php if ($unidade3 != ' ')
                                echo '<td>' . $unidade3 . '</td>'; ?>
                            <?php if ($quantidade3 != '0')
                                echo '<td>' . $quantidade3 . '</td>'; ?>
                                <?php if ($quantidade3 != '0')
                                echo '<td><input type="text"></td>'; ?>
                            <?php if ($quantidade3 != '0')
                                echo '<td> <select name="posicao">;
                                <option value="a1">A1</option>
                                <option value="a2">A2</option>
                                <option value="a3">A3</option>
                                <option value="a4">A4</option>
                                <option value="b1">B1</option>
                                <option value="b2">B2</option>
                                <option value="b3">B3</option>
                                <option value="b4">B4</option>
                                <option value="c1">C1</option>
                                <option value="c2">C2</option>
                                <option value="c3">C3</option>
                                <option value="c4">C4</option>
                                <option value="d1">D1</option>
                                <option value="d2">D2</option>
                                <option value="d3">D3</option>
                                <option value="d4">D4</option>
                            </select> </td>'; ?>
                             <?php if ($quantidade3 != '0')
                                echo '<td><button>Enviar</button></td>'; ?>

                        </tr>
                        <tr>
                        <?php if ($produto4 != '')
                                echo '<td>' . $produto4 . '</td>'; ?>
                        <?php if ($unidade4 != ' ')
                                echo '<td>' . $unidade4 . '</td>'; ?>
                            <?php if ($quantidade4 != '0')
                                echo '<td>' . $quantidade4 . '</td>'; ?>
                                <?php if ($quantidade4 != '0')
                                echo '<td><input type="text"></td>'; ?>
                            <?php if ($quantidade4 != '0')
                                echo '<td> <select name="posicao">;
                                <option value="a1">A1</option>
                                <option value="a2">A2</option>
                                <option value="a3">A3</option>
                                <option value="a4">A4</option>
                                <option value="b1">B1</option>
                                <option value="b2">B2</option>
                                <option value="b3">B3</option>
                                <option value="b4">B4</option>
                                <option value="c1">C1</option>
                                <option value="c2">C2</option>
                                <option value="c3">C3</option>
                                <option value="c4">C4</option>
                                <option value="d1">D1</option>
                                <option value="d2">D2</option>
                                <option value="d3">D3</option>
                                <option value="d4">D4</option>
                            </select> </td>'; ?>
                             <?php if ($quantidade4 != '0')
                                echo '<td><button>Enviar</button></td>'; ?>
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