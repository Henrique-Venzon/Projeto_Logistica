<?php
$npedido_selecionado = 0;
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}
if (!isset($_SESSION['turma'])) {
    header("Location: index.php");
    exit;
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['pedido_selecionado'])) {
    // pegar o valor do select
    $npedido_selecionado = $_GET['pedido_selecionado'];
}
?>
<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/amem.svg">

    <meta charset="utf-8">
    <title><?php
    $tituloPag = 'Carga';
    echo "$tituloPag";
    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/carga.css">
</head>

<body>

    <?php
    $servername = "localhost";
    $username = "root.Att";
    $password = "root";
    $dbname = "logistica";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT * FROM carga WHERE npedido = '" . $npedido_selecionado . "' AND turma_id = '" . $_SESSION['turma'] . "'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $id=$row['id'];
            $npedido = $row['npedido'];
            $Empresa = $row['Empresa'];
            $cliente = $row['cliente'];
            $telefone = $row['Telefone'];
            $CEP = $row['CEP'];
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
            $valor1 = $row['valor1'];
            $valor2 = $row['valor2'];
            $valor3 = $row['valor3'];
            $valor4 = $row['valor4'];
            $ncm1 = $row['ncm1'];
            $ncm2 = $row['ncm2'];
            $ncm3 = $row['ncm3'];
            $ncm4 = $row['ncm4'];
            $cst1 = $row['cst1'];
            $cst2 = $row['cst2'];
            $cst3 = $row['cst3'];
            $cst4 = $row['cst4'];
            $cfop1 = $row['cfop1'];
            $cfop2 = $row['cfop2'];
            $cfop3 = $row['cfop3'];
            $cfop4 = $row['cfop4'];
            $turma_id = $row['turma_id'];
        }
    } else {
    }
    $conn->close();
    ?>

    <?php
    include 'include/header.php';
    ?>

    <main>
        <?php
        include 'include/menuLateral.php';
        ?>

        <div class="DivDireita">
            <div class="table-inputs">
                <div class="txtCont">
                    <h1>Carga</h1>
                </div>
                <div class="tabela-scroll">
                    <div class="inputPedido">
                        <div class="label">
                            <label for="pedido">Selecione o Pedido:</label>
                        </div>
                        <div class="select">
                            <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <select name="pedido_selecionado" id="pedido">
                                    <option value="0">0</option>
                                    <?php
                                    // Conexão com o banco de dados
                                    $servername = "localhost";
                                    $username = "root.Att";
                                    $password = "root";
                                    $dbname = "logistica";

                                    // Create connection
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    if ($conn->connect_error) {
                                        die("Erro de conexão: " . $conn->connect_error);
                                    }

                                    // Consulta para buscar os pedidos
                                    $sql = "SELECT * FROM carga WHERE turma_id = '" . $_SESSION['turma'] . "'";
                                    $result = $conn->query($sql);

                                    // Se houver resultados, criar as opções do select
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value=\"{$row['npedido']}\">{$row['npedido']}</option>";
                                        }
                                    }

                                    // Fechar conexão
                                    $conn->close();
                                    ?>
                                </select>
                        </div>
                        <div class="selecionar">
                            <button type="submit">Selecionar</button>
                        </div>
                        </form>
                    </div>
                    <form method="post" action="processamento/atualizar_quantidade.php">
                    <div>
                        <div class="informacoes">
                            <div class="inf">
                                <div class="npedido">
                                    <h1>N° Pedido</h1>
                                    <h1><?php echo $npedido_selecionado; ?></h1>
                                </div>
                                <div class="nFiscal">
                                    <h1>Nota Fiscal</h1>
                                    <h1>
                                        <?php
                                        // Conexão com o banco de dados
                                        $servername = "localhost";
                                        $username = "root.Att";
                                        $password = "root";
                                        $dbname = "logistica";

                                        // Verifique se $npedido_selecionado é nulo ou zero
                                        if ($npedido_selecionado == null || $npedido_selecionado == 0) {
                                            // Se for, não execute o resto do código
                                            return;
                                        }

                                        // Create connection
                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        if ($conn->connect_error) {
                                            die("Erro de conexão: " . $conn->connect_error);
                                        }
                                        $sql_atividade = "SELECT id FROM carga WHERE npedido='" . $npedido_selecionado . "' AND turma_id = '" . $_SESSION['turma'] . "'";
                                        $resultado = $conn->query($sql_atividade);

                                        // Primeiro, busque uma linha de resultados como uma matriz associativa
                                        $row_atividade = $resultado->fetch_assoc();
                                        $id_atividade = $row_atividade['id'];  // substitua 'id' pelo nome da coluna que você quer acessar
                                        
                                        // Agora, use $id_atividade na sua consulta SQL
                                        $sql = "SELECT id_notafiscal FROM nota_fiscal_criada WHERE id_atividade = $id_atividade and id_turma = '" . $_SESSION['turma'] . "'";
                                        $result = $conn->query($sql);

                                        // Se houver resultados, criar as opções do select
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $notafiscal = $row['id_notafiscal'];
                                            }
                                            echo $notafiscal;
                                        }
                                        ?>
                                    </h1>

                                </div>

                                <div class="doca">
                                    <label for="doca">Doca:</label>
                                    <select id="doca">
                                        <option value=" "></option>
                                        <option value="dc1">Doca 1</option>
                                        <option value="dc2">Doca 2</option>
                                        <option value="dc3">Doca 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="tabelaComVistoria">
                            <table class='table'>
                                <tr>
                                    <th>Produto</th>
                                    <th>Unidade</th>
                                    <th>Quantidade</th>
                                    <th>Valor</th>
                                    <th>Faltando</th>
                                    <th>Avariado</th>
                                    <th>Total</th>
                                </tr>
                                <tr>
                                    <td><?php if (!isset($produto1))
                                        ($produto1 = '');
                                    echo $produto1; ?></td>
                                    <td><?php if (!isset($unidade1))
                                        ($unidade1 = '');
                                    echo $unidade1; ?></td>
                                    <td>
                                        <span id="quantidade1"><?php if (!isset($quantidade1))
                                            ($quantidade1 = 0);
                                        echo $quantidade1; ?></span>
                                        <input id="quantidadeInput1" type="text" value="<?php echo $quantidade1; ?>"
                                            style="display:none;" />
                                    </td>
                                    <td><?php if (!isset($valor1))
                                        ($valor1 = 0);
                                    echo $valor1; ?></td>
                                    <td><button  type="button" id="editar1" onclick="editarQuantidade(1)">editar</button></td>
                                    <td><input type="number"></td>
                                    <?php echo "<td>" . $quantidade1 * $valor1 . " Reais"; ?>
                                </tr>
                                <?php
                                if (!isset($produto2))
                                    ($produto2 = '');
                                if ($produto2 != '') {
                                    echo "<tr>";
                                    if ($produto2 != '') {
                                        echo "<td>" . $produto2 . "</td>";
                                    }
                                    if ($unidade2 != ' ') {
                                        echo "<td>" . $unidade2 . "</td>";
                                    }
                                    if ($quantidade2 != '0') {
                                        echo "<td><span id='quantidade2'>" . $quantidade2 . "</span><input id='quantidadeInput2' type='text' value='" . $quantidade2 . "' style='display:none;' /></td>";
                                    }
                                    if ($valor2 != '0.00') {
                                        echo "<td>" . $valor2 . "</td>";
                                    }
                                    echo "<td><button  type=\"button\" id='editar2' onclick='editarQuantidade(2)'>editar</button></td>";
                                    echo "<td><input type='number'></td>";
                                    echo "<td>" . $quantidade2 * $valor2 . " Reais";
                                    echo "</tr>";
                                }
                                ?>
                                <?php
                                if (!isset($produto3))
                                    ($produto3 = '');
                                if ($produto3 != '') {
                                    echo "<tr>";
                                    if ($produto3 != '') {
                                        echo "<td>" . $produto3 . "</td>";
                                    }
                                    if ($unidade3 != ' ') {
                                        echo "<td>" . $unidade3 . "</td>";
                                    }
                                    if ($quantidade3 != '0') {
                                        echo "<td><span id='quantidade3'>" . $quantidade3 . "</span><input id='quantidadeInput3' type='text' value='" . $quantidade3 . "' style='display:none;' /></td>";
                                    }
                                    if ($valor3 != '0.00') {
                                        echo "<td>" . $valor3 . "</td>";
                                    }
                                    echo "<td><button type=\"button\" id='editar3' onclick='editarQuantidade(3)'>editar</button></td>";
                                    echo "<td><input type='number'></td>";
                                    echo "<td>" . $quantidade3 * $valor3 . " Reais";
                                    echo "</tr>";
                                }
                                ?>
                                <?php
                                if (!isset($produto4))
                                    ($produto4 = '');
                                if ($produto4 != '') {
                                    echo "<tr>";
                                    if ($produto4 != '') {
                                        echo "<td>" . $produto4 . "</td>";
                                    }
                                    if ($unidade4 != ' ') {
                                        echo "<td>" . $unidade4 . "</td>";
                                    }
                                    if ($quantidade4 != '0') {
                                        echo "<td><span id='quantidade4'>" . $quantidade4 . "</span><input id='quantidadeInput4' type='text' value='" . $quantidade4 . "' style='display:none;' /></td>";
                                    }
                                    if ($valor4 != '0.00') {
                                        echo "<td>" . $valor4 . "</td>";
                                    }
                                    echo "<td><button  type=\"button\" id='editar4' onclick='editarQuantidade(4)'>editar</button></td>";
                                    echo "<td><input type='number'></td>";
                                    echo "<td>" . $quantidade4 * $valor4 . " Reais";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </div>
                        <div class="enviar">
                            <button type="submit">Enviar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function editarQuantidade(row) {
            var quantidadeSpan = document.getElementById('quantidade' + row);
            var quantidadeInput = document.getElementById('quantidadeInput' + row);
            var editButton = document.getElementById('editar' + row);

            if (quantidadeSpan.style.display === 'none') {
                salvarQuantidade(row);
            } else {
                quantidadeSpan.style.display = 'none';
                quantidadeInput.style.display = 'inline';
                editButton.textContent = 'salvar';
            }
        }

        function salvarQuantidade(row) {
            var quantidadeSpan = document.getElementById('quantidade' + row);
            var quantidadeInput = document.getElementById('quantidadeInput' + row);
            var novaQuantidade = quantidadeInput.value;
            quantidadeSpan.textContent = novaQuantidade;

            quantidadeSpan.style.display = 'inline';
            quantidadeInput.style.display = 'none';
            document.getElementById('editar' + row).textContent = 'editar';

            // Fazendo a requisição AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "processamento/atualizar_quantidade.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    console.log("Quantidade atualizada com sucesso!");
                }
            }
            xhr.send("quantidade=" + row + "&valor=" + novaQuantidade);
        }
    </script>
    <script src="js/vistoriaCarga.js"></script>
    <script src="js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>