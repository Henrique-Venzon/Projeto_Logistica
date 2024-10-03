F<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}

include_once('include/conexao.php');

// Checar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$turma = $_SESSION['turma'];
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];

    $stmt = $conn->prepare("SELECT * FROM estoque WHERE nome_produto = ? AND id_turma = ? AND quantidade_enviada > 0");
    $stmt->bind_param("si", $produto, $turma);

    $stmt->execute();

    $result = $stmt->get_result();

    $posicoes = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $posicoes[] = array(
                'posicao' => $row["posicao"],
                'quantidade_enviada' => $row["quantidade_enviada"]
            );
        }
    }
    echo "<script>var posicoes = " . json_encode($posicoes) . ";</script>";
    echo "<script>var quantidade_pesquisada = $quantidade;</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/amem.svg">
    <meta charset="utf-8">
    <title><?php $tituloPag = 'Solicitações';
    echo "$tituloPag"; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/solicitacaoestoque.css">

</head>

<body>
    <?php include 'include/header.php'; ?>
    <main>
        <?php include 'include/menuLateral.php'; ?>
        <div class="DivDireita">
            <div class="table-inputs">
                <div class="txtCont">
                    <h1>Solicitação</h1>
                </div>
                <div class="flex">
                    <div class="divpegar esquerda">
                        <form method='post' action="processamento/processosolicitacao2.php">
                            <h1 class="pegar">DEFINIR</h1>
                            <?php

                            $sql = "SELECT * FROM `solicitacao` WHERE id_turma='$turma' AND `id`=" . $_GET['id_pedido'] . " ORDER BY `solicitacao`.`id` ASC";
                            $res = $conn->query($sql);
                            $qtd = $res->num_rows;

                            if ($qtd > 0) {
                                echo "<div id=\"tabelaScroll\" class=\"tabela-scroll\">";
                                echo "<table id='table' class='table'>";
                                echo "<tr>";
                                echo "<th>Produto</th>";
                                echo "<th class=\"quantidade-pc\">Quantidade Solicitada</th>";
                                echo "<th class=\"quantidade-cell\">Quantidade</th>";
                                echo "<th>Posição</th>";
                                echo "<th>Quantidade</th>";
                                echo "</tr>";

                                while ($row = $res->fetch_object()) {
                                    for ($i = 1; $i <= 4; $i++) {
                                        $produto = "produto" . ($i == 1 ? "" : $i);
                                        $quantidade = "quantidade" . ($i == 1 ? "" : $i);

                                        if (!empty($row->$produto) && !empty($row->$quantidade)) {
                                            echo "<tr>";
                                            echo "<td style=\"border-right:1px solid black;\">" . $row->$produto . "</td>";
                                            echo "<td style=\"border-right:1px solid black;\">" . $row->$quantidade . "</td>";
                                            echo "<input type='hidden' value='" . $row->$produto . "' name='produto[]'>";
                                            echo "<input type='hidden' value='" . $row->$quantidade . "' name='quantidadeS[]'>";
                                            echo "<input type='hidden' value='" . $_GET['id_pedido'] . "' name='id_pedido[]'>";

                                            echo "<td style=\"border-right:1px solid black;\">
                                                    <select  name='posicao[]'>
                                                        <option>A1</option>
                                                        <option>A2</option>
                                                        <option>A3</option>
                                                        <option>A4</option>
                                                        <option>B1</option>
                                                        <option>B2</option>
                                                        <option>B3</option>
                                                        <option>B4</option>
                                                        <option>C1</option>
                                                        <option>C2</option>
                                                        <option>C3</option>
                                                        <option>C4</option>
                                                        <option>D1</option>
                                                        <option>D2</option>
                                                        <option>D3</option>
                                                        <option>D4</option>
                                                    </select></td>";
                                            echo "<td style=\"border-right:1px solid black;\"><input type='number' name='quantidade[]' value='0' min='1' max='" . $row->$quantidade . "'></td>";
                                            echo "</tr>";
                                        }
                                    }
                                }

                                echo "</table>";
                                echo "</div>";
                                echo '<div class="buttonEnviar"><button type="submit">Enviar</button></div>';
                            } else {
                                echo "<p class='alert alert-danger'>Não encontrou nenhum pedido nas docas.</p>";
                            }
                            ?>
                        </form>

                        <div class="container-cancelar">
                            <button type="button" class="cancelar" data-bs-toggle="modal" data-bs-target="#meuModal">
                                Cancelar Pedido
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="meuModal" tabindex="-1" aria-labelledby="meuModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="meuModalLabel">Conteúdo da Solicitação</h1>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="processamento/processar_cancelamento_solicitacao.php" id="formCancelamento">
                                            <form method="POST" action="processamento/processar_cancelamento_solicitacao_carga.php" id="formCancelamento">
                                                <input type="hidden" name="id_pedido" value="<?php echo $_GET['id_pedido']; ?>">
                                                <div class="mb-3">
                                                    <label for="motivo" class="form-label">Motivo do Cancelamento:</label>
                                                    <textarea class="form-control" id="motivo" name="motivo" rows="3" required></textarea>
                                                </div>
                                                <button type="submit" name="cancelar_pedido"
                                                    class="btn btn-danger">Cancelar Pedido</button>
                                            </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="divpegar div-estoque">
                        <h1 class="pegar div-estoque">Estoque</h1>
                        <div class="stock div-estoque">
                            <div class="tabelaPesquisa">
                                <div class="pesquisa">
                                    <form id="formPesquisa" method="POST" action="">
                                        <h1>Pesquisa</h1>
                                        <input class="input1" type="text" name="produto" required placeholder="Produto">
                                        <input class="input2" type="text" name="quantidade" required
                                            placeholder="Quantidade">
                                        <button class="buttonPesquisa" type="submit">Pesquisar</button>
                                    </form>
                                </div>
                            </div>
                            <div class="tabelaPosicoes">
                                <div class="posicoes">
                                    <div class="card a1" id="a4">
                                        <h1>A4</h1>
                                    </div>
                                    <div class="card a2" id="b4">
                                        <h1>B4</h1>
                                    </div>
                                    <div class="card a3" id="c4">
                                        <h1>C4</h1>
                                    </div>
                                    <div class="card a4" id="d4">
                                        <h1>D4</h1>
                                    </div>
                                    <div class="card b1" id="a3">
                                        <h1>A3</h1>
                                    </div>
                                    <div class="card b2" id="b3">
                                        <h1>B3</h1>
                                    </div>
                                    <div class="card b3" id="c3">
                                        <h1>C3</h1>
                                    </div>
                                    <div class="card b4" id="d3">
                                        <h1>D3</h1>
                                    </div>
                                    <div class="card c1" id="a2">
                                        <h1>A2</h1>
                                    </div>
                                    <div class="card c2" id="b2">
                                        <h1>B2</h1>
                                    </div>
                                    <div class="card c3" id="c2">
                                        <h1>C2</h1>
                                    </div>
                                    <div class="card c4" id="d2">
                                        <h1>D2</h1>
                                    </div>
                                    <div class="card d1" id="a1">
                                        <h1>A1</h1>
                                    </div>
                                    <div class="card d2" id="b1">
                                        <h1>B1</h1>
                                    </div>
                                    <div class="card d3" id="c1">
                                        <h1>C1</h1>
                                    </div>
                                    <div class="card d4" id="d4">
                                        <h1>D1</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/stock_solicitacao.js"></script>
    <script src="js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>
    <script>
        const checkboxes = document.querySelectorAll('input[name="cancelar_produto[]"]');
        const motivoCancelamento = document.getElementById('motivoCancelamento');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                const peloMenosUmaMarcada = Array.from(checkboxes).some(cb => cb.checked);

                motivoCancelamento.style.display = peloMenosUmaMarcada ? 'block' : 'none';
            });
        });
    </script>
</body>

</html>