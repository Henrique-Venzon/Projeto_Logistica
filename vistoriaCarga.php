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
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800&display=swap"
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

    include_once('include/conexao.php');
    $pedido_id_selecionado = 0;

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['pedido_selecionado']) && $_GET['pedido_selecionado'] != '0') {
        $pedido_id_selecionado = $_GET['pedido_selecionado'];

        $sql = "SELECT * FROM carga WHERE id = '" . $pedido_id_selecionado . "' AND turma_id = '" . $_SESSION['turma'] . "'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $pedido = $result->fetch_assoc();
        }
    }
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
                                $sql = "SELECT id, npedido FROM carga WHERE situacao='enviado' and turma_id = '" . $_SESSION['turma'] . "'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value=\"{$row['id']}\">{$row['npedido']}</option>";
                                    }
                                }
                                ?>
                            </select>
                    </div>
                    <div class="selecionar">
                        <button type="submit">Selecionar</button>
                    </div>
                    </form>
                </div>
              
                <!-- Resultados da seleção do pedido -->
                <?php if (!empty($pedido)) { ?>
                    <div class="tabela-scroll">
                        <form method="post" action="processamento/confirmar_carga.php">
                            <div class="centroDiv">
                                <div class="informacoes">
                                    <div class="inf">
                                        <div class="npedido">
                                            <h1>N° Pedido</h1>
                                            <h1><?php echo $pedido['npedido']; ?></h1>
                                        </div>
                                        <div class="nFiscal">
                                            <h1>Nota Fiscal</h1>
                                            <button type="button" id="nota-ver">
                                                <?php
                                                if ($pedido_id_selecionado != 0) {
                                                    $sql_atividade = "SELECT id FROM carga WHERE id='" . $pedido_id_selecionado . "' AND turma_id = '" . $_SESSION['turma'] . "'";
                                                    $resultado = $conn->query($sql_atividade);

                                                    if ($resultado->num_rows > 0) {
                                                        $row_atividade = $resultado->fetch_assoc();
                                                        $id_atividade = $row_atividade['id'];
                                                        $sql = "SELECT id FROM nota_fiscal WHERE id_atividade = $id_atividade and id_turma = '" . $_SESSION['turma'] . "'";
                                                        $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                $notafiscal = $row['id'];
                                                            }
                                                            echo 'VER';
                                                        }
                                                    }
                                                }
                                                ?>
                                            </button>
                                        </div>
                                        <div id="myModal" class="modal">
                                            <div class="modal-content">
                                                <?php
                                                include_once('include/conexao.php');

                                                if ($conexao->connect_error) {
                                                    die("Conexão falhou: " . $conexao->connect_error);
                                                }

                                                if (isset($notafiscal)) {
                                                    $sql = "SELECT *  FROM nota_fiscal WHERE id = $notafiscal";
                                                    $resultado = $conexao->query($sql);

                                                    echo '<span class="close">&times;</span>';
                                                    echo '<div class="scrollSku">';
                                                    echo '<table>';
                                                    echo '<thead>';
                                                    echo '<tr>';
                                                    echo '<th>ID</th>';
                                                    echo '<th>NUMERO</th>';
                                                    echo '<th>SERIE</th>';
                                                    echo '<th>ENTRADA/SAÍDA</th>';
                                                    echo '<th>CHAVE DE ACESSO</th>';
                                                    echo '<th>INFROMAÇÃO INTERNA</th>';
                                                    echo '<th>NOME RAZÃO SOCIAL</th>';
                                                    echo '<th>sede</th>';
                                                    echo '</tr>';
                                                    echo '</thead>';
                                                    echo '<tbody>';

                                                    if ($resultado->num_rows > 0) {
                                                        while ($row = $resultado->fetch_assoc()) {
                                                            $id = $row["id"];
                                                            $numero = $row["numero"];
                                                            $serie = $row["serie"];
                                                            $entrada_saida = $row["entrada_saida"];
                                                            $chave_acesso = $row["chave_acesso"];
                                                            $informacao_interna = $row["informacao_interna"];
                                                            $nome_razao_social = $row["nome_razao_social"];
                                                            $sede = $row["sede"];
                                                            $telefone = $row["telefone"];
                                                            $cep = $row["cep"];
                                                            $protocolo_autorizacao = $row["protocolo_autorizacao"];
                                                            $cnpj = $row["cnpj"];
                                                            $inscricao_estadual = $row["inscricao_estadual"];
                                                            $inscricao_estadual_subs_tributaria = $row["inscricao_estadual_subs_tributaria"];
                                                            $natureza_operacao = $row["natureza_operacao"];
                                                            $nome_razao_social_remetente = $row["nome_razao_social_remetente"];
                                                            echo '<tr>';
                                                            echo '<td>' . $id . '</td>';
                                                            echo '<td>' . $numero . '</td>';
                                                            echo '<td>' . $serie . '</td>';
                                                            echo '<td>' . $entrada_saida . '</td>';
                                                            echo '<td>' . $chave_acesso . '</td>';
                                                            echo '<td>' . $informacao_interna . '</td>';
                                                            echo '<td>' . $nome_razao_social . '</td>';
                                                            echo '<td>' . $sede . '</td>';
                                                            echo '</tr>';
                                                            echo '<tr>';
                                                            echo '<th>telefone</th>';
                                                            echo '<th>cep</th>';
                                                            echo '<th>protocolo autorização</th>';
                                                            echo '<th>Cnpj</th>';
                                                            echo '<th>inscricao estadual</th>';
                                                            echo '<th>inscricao estadual subs tributaria</th>';
                                                            echo '<th>natureza operacao</th>';
                                                            echo '<th>nome razao social remetente</th>';
                                                            echo '</tr>';
                                                            echo '<tr>';
                                                            echo '<td>' . $telefone . '</td>';
                                                            echo '<td>' . $cep . '</td>';
                                                            echo '<td>' . $protocolo_autorizacao . '</td>';
                                                            echo '<td>' . $cnpj . '</td>';
                                                            echo '<td>' . $inscricao_estadual . '</td>';
                                                            echo '<td>' . $inscricao_estadual_subs_tributaria . '</td>';
                                                            echo '<td>' . $natureza_operacao . '</td>';
                                                            echo '<td>' . $nome_razao_social_remetente . '</td>';
                                                            echo '</tr>';
                                                        }
                                                    }

                                                    echo '</tbody>';
                                                    echo '</table>';
                                                    echo '</div>';
                                                }

                                                // Fecha a conexão
                                                $conexao->close();
                                                ?>
                                            </div>
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
                                            <td><?php echo $pedido['produto1']; ?></td>
                                            <td><?php echo $pedido['unidade1']; ?></td>
                                            <td>
                                                <span id="quantidade1"><?php echo $pedido['quantidade1']; ?></span>
                                                <input name="quantidade1" id="quantidadeInput1" type="text"
                                                    value="<?php echo $pedido['quantidade1']; ?>" style="display:none;" />
                                                <input name="id" id="id" type="hidden" value="<?php echo $pedido['id']; ?>"
                                                    style="display:none;" />
                                            </td>
                                            <td><span id="valor1"><?php echo $pedido['valor1']; ?></span></td>
                                            <td><button type="button" id="editar1"
                                                    onclick="editarQuantidade(1)">editar</button></td>
                                            <td><input type="number" name="avariado1" id="avariado1" min="0" max="<?php echo $pedido['quantidade1']; ?>"></td>
                                            <td id="total1"><?php echo $pedido['quantidade1'] * $pedido['valor1']; ?> Reais</td>
                                        </tr>
                                        <?php if (!empty($pedido['produto2'])) { ?>
                                            <tr>
                                                <td><?php echo $pedido['produto2']; ?></td>
                                                <td><?php echo $pedido['unidade2']; ?></td>
                                                <td>
                                                    <span id="quantidade2"><?php echo $pedido['quantidade2']; ?></span>
                                                    <input name="quantidade2" id="quantidadeInput2" type="text"
                                                        value="<?php echo $pedido['quantidade2']; ?>"
                                                        style="display:none;" />
                                                    <input name="id" id="id" type="hidden"
                                                        value="<?php echo $pedido['id']; ?>" style="display:none;" />
                                                </td>
                                                <td><span id="valor2"><?php echo $pedido['valor2']; ?></span></td>
                                                <td><button type="button" id="editar2"
                                                        onclick="editarQuantidade(2)">editar</button></td>
                                                <td><input type="number" name="avariado2" id="avariado2" min="0" max="<?php echo $pedido['quantidade2']; ?>"></td>
                                                <td id="total2"><?php echo $pedido['quantidade2'] * $pedido['valor2']; ?> Reais</td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                                <div class="enviar">
                                    <button type="submit">Envivar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("nota-ver");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        });

        function editarQuantidade(id) {
            var quantidadeSpan = document.getElementById("quantidade" + id);
            var quantidadeInput = document.getElementById("quantidadeInput" + id);
            var editarButton = document.getElementById("editar" + id);

            if (quantidadeInput.style.display === "none") {
                quantidadeSpan.style.display = "none";
                quantidadeInput.style.display = "block";
                editarButton.innerText = "Salvar";
            } else {
                quantidadeSpan.innerText = quantidadeInput.value;
                quantidadeSpan.style.display = "block";
                quantidadeInput.style.display = "none";
                editarButton.innerText = "editar";
            }
        }
    </script>
</body>

</html>
