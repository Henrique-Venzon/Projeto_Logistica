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
include_once ('include/conexao.php');
$turma = $_SESSION['turma'];
$id = $_GET['id']
    ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/amem.svg">
    <meta charset="utf-8">
    <title><?php $tituloPag = 'Picking';
    echo "$tituloPag"; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/picking2.css">
</head>

<body>
    <?php include 'include/header.php'; ?>
    <main>
        <?php include 'include/menuLateral.php'; ?>
        <div class="DivDireita">
            <div class="table-inputs">
                <div class="txtCont">
                    <h1>Finalizar</h1>
                </div>
                <div class="flex">
                    <div class="divpegar">
                        <h1 class="pegar">Pegar</h1>

                        <?php
                        // Consulta para obter os produtos
                        $sql = "SELECT * FROM picking WHERE id_pedido=$id AND id_turma='" . $_SESSION['turma'] . "'";
                        $res = $conn->query($sql);

                        // Verifique se há resultados
                        if ($res->num_rows > 0) {
                            ?>

                            <form method='post' action="processamento/selecionar_carga_picking.php">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Produto</th>
                                            <th>Quantidade Solicitada</th>
                                            <th>Posição</th>
                                            <th>Selecionar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = $res->fetch_object()): ?>
                                            <tr>
                                                <td><?php echo $row->produto; ?></td>
                                                <td><?php echo $row->quantidade; ?></td>
                                                <td><?php echo $row->posicao; ?></td>
                                                <!-- Campos ocultos com os dados dos produtos -->
                                                <input type="hidden" name="nome_produto[<?php echo $row->id; ?>]"
                                                    value="<?php echo $row->produto; ?>">
                                                <input type="hidden" name="quantidade_solicitada[<?php echo $row->id; ?>]"
                                                    value="<?php echo $row->quantidade; ?>">
                                                <input type="hidden" name="posicao[<?php echo $row->id; ?>]"
                                                    value="<?php echo $row->posicao; ?>">
                                                <input type="hidden" name="id_carga[<?php echo $row->id; ?>]"
                                                    value="<?php echo $id; ?>">
                                                <td><input class="custom-checkbox" type="checkbox"
                                                        name="produtos_selecionados[]" value="<?php echo $row->id; ?>"></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                                <div class="buttonEnviar" id="botao-enviar" style="display: none;">
                                    <button type="submit">Enviar</button>
                                </div>
                            </form>

                            <?php
                        } else {
                            print "<p class='alert alert-danger'>Nenhum produto para pegar.</p>";
                        }
                        ?>
                    </div>
                    <div class="divpegar">
                        <h1 class="pegar">Finalizar</h1>
                        <form method='post' action='processamento/processamento_expedicao.php'>
                            <div class="doca">
                                <select class="doca_id" name="id_doca">
                                    <option value="1">Doca 1</option>
                                    <option value="2">Doca 2</option>
                                    <option value="3">Doca 3</option>
                                    <option value="4">Doca 4</option>
                                </select>
                            </div>
                            <?php
                            $sql_a = "SELECT * FROM picking_pegado where id_carga=$id and id_turma='" . $_SESSION['turma'] . "'";
                            $res = $conn->query($sql_a);
                            $qtd = $res->num_rows;

                            if ($qtd > 0) {
                                print "<div class='tabela-scroll'>";
                                print "<table class='table' >";
                                print "<tr>";
                                print "<th>Produto</th>";
                                print "<th>Quantidade</th>";
                                print "<th>Posição</th>";
                                print "<th>Finalizar</th>";
                                print "<th class=\"cancelar\">Cancelar</th>";
                                print "</tr>";

                                while ($row = $res->fetch_object()) {
                                    print "<tr>";
                                    print "<td style='border-right:1px solid black;'>" . $row->nome_produto . "</td>";
                                    print "<td style='border-right:1px solid black;'>" . $row->quantidade_enviada . "</td>";
                                    print "<td style='border-right:1px solid black;'>" . $row->posicao . "</td>";
                                    print "<td>";

                                    // Formulário para finalizar o item
                                    print "<form method='post' action='processamento/processamento_expedicao.php' style='display:inline-block'>";
                                    print "<input type='hidden' name='id_pedido' value='" . $id . "'>";
                                    print "<input type='hidden' name='produto_id' value='" . $row->id . "'>";
                                    print "<button class='finalizar' type='submit' name='finalizar'>Finalizar</button>";
                                    print "</form>";

                                    // Formulário para cancelar o item
                                    print "<form class='cancelar' method='post' action='processamento/cancelar_finalizar_expedicao.php' style='display:inline-block'>";
                                    print "<input name='produto_id' value='" . $row->id . "' hidden>";
                                    print "<input name='id_pedido' value='" . $id . "' hidden>";
                                    print "<td class='cancelar'><button class='finalizar'  type='submit' name='cancelar'>Cancelar</button></td>";
                                    print "</form>";

                                    print "</td>";
                                    print "</tr>";
                                }
                                print "</table>";
                                print "</div>";
                            } else {
                                print "<div class='paragrafo'>";
                                print "<p class='alert alert-danger'>Nenhum produto selecionado.</p>";
                                print "</div>";
                            }
                            ?>
                            <?php
                            if (isset($_SESSION['error_message'])) {
                                // Apenas mostra as divs se a variável $_SESSION['error_message'] estiver definida
                                echo '<div class="paragrafo2">';
                                echo '<p class="alert alert-danger">' . $_SESSION['error_message'] . '</p>';
                                echo '</div>';
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
    <script>
        // Seleciona todas as caixas de seleção
        const checkboxes = document.querySelectorAll('.custom-checkbox');
        const botaoEnviar = document.getElementById('botao-enviar');

        // Adiciona um evento de mudança para cada caixa de seleção
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                // Verifica se pelo menos uma caixa de seleção está marcada
                const algumaCheckboxMarcada = Array.from(checkboxes).some(checkbox => checkbox.checked);

                // Mostra ou oculta o botão de envio com base no estado das caixas de seleção
                botaoEnviar.style.display = algumaCheckboxMarcada ? 'block' : 'none';
            });
        });
    </script>
    <script>
        document.addEventListener('click', function () {
            fetch('processamento/limpar_mensagem_erro.php')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro ao limpar mensagem de erro.');
                    }
                    const divErro = document.querySelector('.paragrafo2');
                    if (divErro) {
                        divErro.remove();
                    }
                })
                .catch(error => {
                    console.error('Erro:', error);
                }
                );
        });
    </script>
</body>

</html>
</body>

</html>