<!DOCTYPE html>
<html lang="pt-BR">

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
    session_start();
    if (!isset($_SESSION['id']) || !isset($_SESSION['turma'])) {
        header("Location: index.php");
        exit;
    }

    $servername = "localhost";
    $username = "root.Att";
    $password = "root";
    $dbname = "logistica";
    $npedido_selecionado = 0;

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['pedido_selecionado'])) {
        $npedido_selecionado = $_GET['pedido_selecionado'];
    }

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM carga WHERE npedido = '" . $npedido_selecionado . "' AND turma_id = '" . $_SESSION['turma'] . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
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
        }
    }
    $conn->close();
    ?>

    <?php include 'include/header.php'; ?>

    <main>
        <?php 
        include 'include/menuLateral.php'; 
        ?>

        <div class="DivDireita">
            <div class="table-inputs">
                <div class="txtCont">
                    <h1>Carga</h1>
                </div>
                <div class="inputPedido">
                    <div class="label">
                        <label for="pedido">Selecione o Pedido:</label>
                    </div>
                    <div class="select">
                        <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <select name="pedido_selecionado" id="pedido">
                                <option value="0">0</option>
                                <?php
                                $conn = new mysqli($servername, $username, $password, $dbname);
                                if ($conn->connect_error) {
                                    die("Erro de conexão: " . $conn->connect_error);
                                }

                                $sql = "SELECT * FROM carga WHERE situacao='enviado' and turma_id = '" . $_SESSION['turma'] . "'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value=\"{$row['npedido']}\">{$row['npedido']}</option>";
                                    }
                                }
                                $conn->close();
                                ?>
                            </select>
                    </div>
                    <div class="selecionar">
                        <button type="submit">Selecionar</button>
                    </div>
                    </form>
                </div>
              
                <!-- Resultados da seleção do pedido -->
                <?php if (!empty($_GET['pedido_selecionado']) && $_GET['pedido_selecionado'] != '0') { ?>
                    <div class="tabela-scroll">
                        <form method="post" action="processamento/confirmar_carga.php">
                            <div class="centroDiv">
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
                                                if ($npedido_selecionado != 0) {
                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                    if ($conn->connect_error) {
                                                        die("Erro de conexão: " . $conn->connect_error);
                                                    }
                                                    $sql_atividade = "SELECT id FROM carga WHERE npedido='" . $npedido_selecionado . "' AND turma_id = '" . $_SESSION['turma'] . "'";
                                                    $resultado = $conn->query($sql_atividade);

                                                    $row_atividade = $resultado->fetch_assoc();
                                                    $id_atividade = $row_atividade['id'];
                                                    $sql = "SELECT id_notafiscal FROM nota_fiscal_criada WHERE id_atividade = $id_atividade and id_turma = '" . $_SESSION['turma'] . "'";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            $notafiscal = $row['id_notafiscal'];
                                                        }
                                                        echo $notafiscal;
                                                    }
                                                    $conn->close();
                                                }
                                                ?>
                                            </h1>
                                        </div>
                                        <div class="doca">
                                            <label for="doca">Doca:</label>
                                            <select name='doca' id="doca">
                                                <option value="1">Doca 1</option>
                                                <option value="2">Doca 2</option>
                                                <option value="3">Doca 3</option>
                                                <option value="4">Doca 4</option>
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
                                            <td><?php echo $produto1 ?? ''; ?></td>
                                            <td><?php echo $unidade1 ?? ''; ?></td>
                                            <td>
                                                <span id="quantidade1"><?php echo $quantidade1 ?? 0; ?></span>
                                                <input name="quantidade1" id="quantidadeInput1" type="text"
                                                    value="<?php echo $quantidade1 ?? 0; ?>" style="display:none;" />
                                                <input name="id" id="id" type="hidden" value="<?php echo $id; ?>"
                                                    style="display:none;" />
                                            </td>
                                            <td><span id="valor1"><?php echo $valor1 ?? 0; ?></span></td>
                                            <td><button type="button" id="editar1"
                                                    onclick="editarQuantidade(1)">editar</button></td>
                                            <td><input type="number" name="avariado1" /></td>
                                            <td id="total1"><?php echo ($quantidade1 * $valor1) ?? 0; ?> Reais</td>
                                        </tr>
                                        <?php if (!empty($produto2)) { ?>
                                            <tr>
                                                <td><?php echo $produto2; ?></td>
                                                <td><?php echo $unidade2; ?></td>
                                                <td>
                                                    <span id="quantidade2"><?php echo $quantidade2; ?></span>
                                                    <input name="quantidade2" id="quantidadeInput2" type="text"
                                                        value="<?php echo $quantidade2; ?>" style="display:none;" />
                                                </td>
                                                <td><span id="valor2"><?php echo $valor2; ?></span></td>
                                                <td><button type="button" id="editar2"
                                                        onclick="editarQuantidade(2)">editar</button></td>
                                                <td><input type="number" name="avariado2" /></td>
                                                <td id="total2"><?php echo $quantidade2 * $valor2; ?> Reais</td>
                                            </tr>
                                        <?php } ?>
                                        <?php if (!empty($produto3)) { ?>
                                            <tr>
                                                <td><?php echo $produto3; ?></td>
                                                <td><?php echo $unidade3; ?></td>
                                                <td>
                                                    <span id="quantidade3"><?php echo $quantidade3; ?></span>
                                                    <input name="quantidade3" id="quantidadeInput3" type="text"
                                                        value="<?php echo $quantidade3; ?>" style="display:none;" />
                                                </td>
                                                <td><span id="valor3"><?php echo $valor3; ?></span></td>
                                                <td><button type="button" id="editar3"
                                                        onclick="editarQuantidade(3)">editar</button></td>
                                                <td><input type="number" name="avariado3" /></td>
                                                <td id="total3"><?php echo $quantidade3 * $valor3; ?> Reais</td>
                                            </tr>
                                        <?php } ?>
                                        <?php if (!empty($produto4)) { ?>
                                            <tr>
                                                <td><?php echo $produto4; ?></td>
                                                <td><?php echo $unidade4; ?></td>
                                                <td>
                                                    <span id="quantidade4"><?php echo $quantidade4; ?></span>
                                                    <input name="quantidade4" id="quantidadeInput4" type="text"
                                                        value="<?php echo $quantidade4; ?>" style="display:none;" />
                                                </td>
                                                <td><span id="valor4"><?php echo $valor4; ?></span></td>
                                                <td><button type="button" id="editar4"
                                                        onclick="editarQuantidade(4)">editar</button></td>
                                                <td><input type="number" name="avariado4" /></td>
                                                <td id="total4"><?php echo $quantidade4 * $valor4; ?> Reais</td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                                <div class="enviar">
                                    <button type="submit">Enviar</button>
                                </div>
                        </form>
                    </div>
                <?php }else{ ?>
                    <DIV class="IMAGEM" id="imagemContainer">
                    <img src="img/este.png" alt="" draggable="false" oncontextmenu="return false">
                </DIV>
                <?php } ?>
            </div>
        </div>
    </main>

    <script>
        function editarQuantidade(row) {
            var quantidadeSpan = document.getElementById('quantidade' + row);
            var quantidadeInput = document.getElementById('quantidadeInput' + row);
            var editButton = document.getElementById('editar' + row);
            var totalCell = document.getElementById('total' + row);
            var valorSpan = document.getElementById('valor' + row);

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
            var totalCell = document.getElementById('total' + row);
            var valorSpan = document.getElementById('valor' + row);

            quantidadeSpan.textContent = novaQuantidade;
            quantidadeSpan.style.display = 'inline';
            quantidadeInput.style.display = 'none';
            document.getElementById('editar' + row).textContent = 'editar';

            // Atualiza o total
            var valor = parseFloat(valorSpan.textContent);
            totalCell.textContent = (novaQuantidade * valor).toFixed(2) + " Reais";

            // Fazendo a requisição AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "processamento/atualizar_quantidade.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    console.log("Quantidade atualizada com sucesso!");
                }
            }
            xhr.send("quantidade=" + novaQuantidade + "&row=" + row);
        }
    </script>
        

    <script src="js/vistoriaCarga.js"></script>
    <script src="js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>