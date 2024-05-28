<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_carga = $_POST['id_carga'];
    $id_doca = $_POST['id_doca'];
}

if (!isset($_SESSION['turma'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
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

    $sql = "SELECT `id`, `produto1`, `produto2`, `produto3`, `produto4`, `unidade1`, `unidade2`, `unidade3`, `unidade4`, `quantidade1`, `quantidade2`, `quantidade3`, `quantidade4`, `turma_id` FROM vistoriado WHERE turma_id = '" . $_SESSION['turma'] . "' AND `id`='" . $id_carga . "'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id_carga_select = $row['id'];
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
    <?php include 'include/header.php' ?>
    <main>
        <?php include 'include/menuLateral.php'; ?>
        <div class="DivDireita">
            <div class="table-inputs">
                <div class="nomet">
                    <h1>Doca</h1>
                </div>
                <div class="tabela-scroll">
                <?php
                // Check if all quantities are zero
                if ($quantidade1 != 0 || $quantidade2 != 0 || $quantidade3 != 0 || $quantidade4 != 0) {
                ?>
                <form method="post" action="processamento/movimentacao.php">
                    <table class="table">
                        <tr>
                            <th>Produto</th>
                            <th>Unidade</th>
                            <th>Quantidade Em Espera</th>
                            <th>Quantidade Por Posição</th>
                            <th>Posição</th>
                        </tr>
                        <tr>
                            <td><?php echo $produto1; ?></td>
                            <input name="produto1" type="hidden" value="<?php echo $produto1 ?>">
                            <td><?php echo $unidade1; ?></td>
                            <td><?php echo $quantidade1; ?></td>
                            <input name="id_doca" type="hidden" value="<?php echo $id_doca ?>">
                            <input name="id_carga_select" type="hidden" value="<?php echo $id_carga_select ?>">
                            <td><input type="number" name="quantidade_enviada1"></td>
                            <td><select name='posicao1'>
                                    <option value="A1">A1</option>
                                    <option value="A2">A2</option>
                                    <option value="A3">A3</option>
                                    <option value="A4">A4</option>
                                    <option value="B1">B1</option>
                                    <option value="B2">B2</option>
                                    <option value="B3">B3</option>
                                    <option value="B4">B4</option>
                                    <option value="C1">C1</option>
                                    <option value="C2">C2</option>
                                    <option value="C3">C3</option>
                                    <option value="C4">C4</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                </select></td>
                        </tr>
                        <tr>
                            <?php if ($produto2 != '') echo '<td>' . $produto2 . '</td>'; ?>
                            <input name="produto2" type="hidden" value="<?php echo $produto2; ?>">
                            <?php if ($unidade2 != ' ') echo '<td>' . $unidade2 . '</td>'; ?>
                            <?php if ($quantidade2 != '0') echo '<td>' . $quantidade2 . '</td>'; ?>
                            <?php if ($quantidade2 != '0') echo '<td><input type="number" name="quantidade_enviada2"></td>'; ?>
                            <?php if ($quantidade2 != '0') echo '<td><select name="posicao2">
                                    <option value="A1">A1</option>
                                    <option value="A2">A2</option>
                                    <option value="A3">A3</option>
                                    <option value="A4">A4</option>
                                    <option value="B1">B1</option>
                                    <option value="B2">B2</option>
                                    <option value="B3">B3</option>
                                    <option value="B4">B4</option>
                                    <option value="C1">C1</option>
                                    <option value="C2">C2</option>
                                    <option value="C3">C3</option>
                                    <option value="C4">C4</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                </select></td>'; ?>
                        </tr>
                        <tr>
                            <?php if ($produto3 != '') echo '<td>' . $produto3 . '</td>'; ?>
                            <input name="produto3" type="hidden" value="<?php echo $produto3; ?>">
                            <?php if ($unidade3 != ' ') echo '<td>' . $unidade3 . '</td>'; ?>
                            <?php if ($quantidade3 != '0') echo '<td>' . $quantidade3 . '</td>'; ?>
                            <?php if ($quantidade3 != '0') echo '<td><input type="number" name="quantidade_enviada3"></td>'; ?>
                            <?php if ($quantidade3 != '0') echo '<td><select name="posicao3">
                                    <option value="A1">A1</option>
                                    <option value="A2">A2</option>
                                    <option value="A3">A3</option>
                                    <option value="A4">A4</option>
                                    <option value="B1">B1</option>
                                    <option value="B2">B2</option>
                                    <option value="B3">B3</option>
                                    <option value="B4">B4</option>
                                    <option value="C1">C1</option>
                                    <option value="C2">C2</option>
                                    <option value="C3">C3</option>
                                    <option value="C4">C4</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                </select></td>'; ?>
                        </tr>
                        <tr>
                            <?php if ($produto4 != '') echo '<td>' . $produto4 . '</td>'; ?>
                            <input name="produto4" type="hidden" value="<?php echo $produto4; ?>">
                            <?php if ($unidade4 != ' ') echo '<td>' . $unidade4 . '</td>'; ?>
                            <?php if ($quantidade4 != '0') echo '<td>' . $quantidade4 . '</td>'; ?>
                            <?php if ($quantidade4 != '0') echo '<td><input type="number" name="quantidade_enviada4"></td>'; ?>
                            <?php if ($quantidade4 != '0') echo '<td><select name="posicao4">
                                    <option value="A1">A1</option>
                                    <option value="A2">A2</option>
                                    <option value="A3">A3</option>
                                    <option value="A4">A4</option>
                                    <option value="B1">B1</option>
                                    <option value="B2">B2</option>
                                    <option value="B3">B3</option>
                                    <option value="B4">B4</option>
                                    <option value="C1">C1</option>
                                    <option value="C2">C2</option>
                                    <option value="C3">C3</option>
                                    <option value="C4">C4</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                </select></td>'; ?>
                        </tr>
                    </table>
                    <div class="buttonEnviar">
                        <button type="submit">Enviar</button>
                    </div>
                </form>
                <?php
                } else {
                    echo "<p>Nenhum produto em espera para ser enviado.</p>";
                }
                ?>
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
