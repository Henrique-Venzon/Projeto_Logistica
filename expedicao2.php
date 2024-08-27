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
$turma = $_SESSION['turma'];
$id_carga = $_POST['id_carga'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/amem.svg">
    <meta charset="utf-8">
    <title><?php $tituloPag = 'Movimentação';
    echo "$tituloPag"; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/expedicao2.css">
</head>

<body>
    <?php include 'include/header.php'; ?>
    <main>
        <?php include 'include/menuLateral.php'; ?>
        <div class="DivDireita">
            <div class="table-inputs">
                <div class="txtCont">
                    <h1>Vistoria e Confirmação</h1>
                </div>
                <div class="button-meio">
                    <button type="button" id="nota-ver">
                        <?php
                        echo 'VER NOTA FISCAL';
                        ?>
                    </button>
                </div>
                <div class="flex">
                    <div class="divpegar">
                        <form method='post' action="processamento/concluir_processamento.php">
                            <h1 class="pegar">CONFIRMAR</h1>
                            <?php
                            include_once('include/conexao.php');

                            $sql = "SELECT * FROM `expedicao` where id_pedido='$id_carga' and id_turma='" . $_SESSION['turma'] . "'";
                            $res = $conn->query($sql);
                            $qtd = $res->num_rows;

                            if ($qtd > 0) {
                                print "<div class=\"tabela-scroll\">";
                                print "<table class='table' >";
                                print "<tr>";
                                print "<th>Produto</th>";
                                print "<th>Quantidade</th>";
                                print "<th>Doca</th>";
                                print "</tr>";

                                while ($row = $res->fetch_object()) {
                                    echo "<tr>";
                                    echo "<td style=\"border-right:1px solid black;\">" . $row->nome_produto . "</td>";
                                    echo "<td style=\"border-right:1px solid black;\">" . $row->quantidade_enviada . "</td>";
                                    echo "<td style=\"border-right:1px solid black;\">" . $row->id_doca . "</td>";
                                    echo "<input class=\"custom-checkbox\" type=\"hidden\" name=\"id_carga\" value=\"" . $row->id_pedido . "\">";
                                    echo "</tr>";
                                }
                                print "</table>";
                                print "</div>";

                                $sql_picking = "SELECT COUNT(*) as total_picking FROM picking WHERE id_pedido = '$id_carga'";
                                $res_picking = $conn->query($sql_picking);
                                $row_picking = $res_picking->fetch_object();
                                $total_picking = $row_picking->total_picking;

                                $sql_picking_pegado = "SELECT COUNT(*) as total_picking_pegado FROM picking_pegado WHERE id_pedido = '$id_carga'";
                                $res_picking_pegado = $conn->query($sql_picking_pegado);
                                $row_picking_pegado = $res_picking_pegado->fetch_object();
                                $total_picking_pegado = $row_picking_pegado->total_picking_pegado;

                                if ($total_picking == $total_picking_pegado) {
                                    print '<DIV class="buttonEnviar">
                                        <button>Enviar</button>
                                    </DIV>';
                                } else {
                                    print '<div class="alert alert-warning" role="alert">
                                        O pedido não está totalmente pronto!
                                    </div>';
                                    print '<DIV class="buttonEnviar">
                                        <button type="submit" onclick="return confirm(\'Tem certeza de que deseja enviar o pedido mesmo que não esteja totalmente pronto?\')">Enviar</button>
                                    </DIV>';
                                }
                            } else {
                                print "<p class='alert alert-danger'>Não encontrou nenhum pedido nas docas.</p>";
                            }
                            ?>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </main>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <?php

                $sql = "SELECT *  FROM nota_fiscal_expedicao WHERE numero =  $id_carga";
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
                echo '<th>sede</th>';
                echo '<th>NOME RAZÃO SOCIAL</th>';
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
                        $cnpj_cpf_remetente = $row["cnpj_cpf_remetente"];
                        $cep_remetente = $row["cep_remetente"];
                        $telefone_remetente = $row["telefone_remetente"];
                        $inscricao_estadual_remetente = $row["inscricao_estadual_remetente"];
                        $data_emissao = $row["data_emissao"];
                        $data_entrada_saida = $row["data_entrada_saida"];
                        $hora_saida = $row["hora_saida"];
                        $fatura_duplicata = $row["fatura_duplicata"];
                        $forma_pagamento = $row["forma_pagamento"];
                        $base_calculo_icms = $row["base_calculo_icms"];
                        $valor_icms = $row["valor_icms"];
                        $base_calculo_icms_st = $row["base_calculo_icms_st"];
                        $valor_icms_substituicao = $row["valor_icms_substituicao"];
                        $total_produtos = $row["total_produtos"];
                        $valor_frete = $row["valor_frete"];
                        $valor_seguro = $row["valor_seguro"];
                        $desconto = $row["desconto"];
                        $outras_despesas = $row["outras_despesas"];
                        $valor_ipi = $row["valor_ipi"];
                        $valor_total_nota = $row["valor_total_nota"];
                        $nome_razao_social_transportador = $row["nome_razao_social_transportador"];
                        $frete_por_conta = $row["frete_por_conta"];
                        $codigo_antt = $row["codigo_antt"];
                        $placa_veiculo = $row["placa_veiculo"];
                        $cnpj_cpf_transportador = $row["cnpj_cpf_transportador"];
                        $inscricao_estadual_transportador = $row["inscricao_estadual_transportador"];
                        $quantidade = $row["quantidade"];
                        $especie = $row["especie"];
                        $marca = $row["marca"];
                        $numeracao = $row["numeracao"];
                        $peso_bruto = $row["peso_bruto"];
                        $peso_liquido = $row["peso_liquido"];
                        $nome_produto1 = $row["nome_produto1"];
                        $ncm_sh1 = $row["ncm_sh1"];
                        $cst1 = $row["cst1"];
                        $cfop1 = $row["cfop1"];
                        $quantidade_prod1 = $row["quantidade_prod1"];
                        $unid1 = $row["unid1"];
                        $valor_unitario1 = $row["valor_unitario1"];
                        $valor_total_prod1 = $row["valor_total_prod1"];
                        $nome_produto2 = $row["nome_produto2"];
                        $ncm_sh2 = $row["ncm_sh2"];
                        $cst2 = $row["cst2"];
                        $cfop2 = $row["cfop2"];
                        $quantidade_prod2 = $row["quantidade_prod2"];
                        $unid2 = $row["unid2"];
                        $valor_unitario2 = $row["valor_unitario2"];
                        $valor_total_prod2 = $row["valor_total_prod2"];
                        $nome_produto3 = $row["nome_produto3"];
                        $ncm_sh3 = $row["ncm_sh3"];
                        $cst3 = $row["cst3"];
                        $cfop3 = $row["cfop3"];
                        $quantidade_prod3 = $row["quantidade_prod3"];
                        $unid3 = $row["unid3"];
                        $valor_unitario3 = $row["valor_unitario3"];
                        $valor_total_prod3 = $row["valor_total_prod3"];
                        $nome_produto4 = $row["nome_produto4"];
                        $ncm_sh4 = $row["ncm_sh4"];
                        $cst4 = $row["cst4"];
                        $cfop4 = $row["cfop4"];
                        $quantidade_prod4 = $row["quantidade_prod4"];
                        $unid4 = $row["unid4"];
                        $valor_unitario4 = $row["valor_unitario4"];
                        $valor_total_prod4 = $row["valor_total_prod4"];
                        $inscricao_municipal = $row["inscricao_municipal"];
                        $valor_total_servicos = $row["valor_total_servicos"];
                        $base_calculo_issqn = $row["base_calculo_issqn"];
                        echo '<tr>';
                        echo '<td>' . $id . '</td>';
                        echo '<td>' . $numero . '</td>';
                        echo '<td>' . $serie . '</td>';
                        echo '<td>' . $entrada_saida . '</td>';
                        echo '<td>' . $chave_acesso . '</td>';
                        echo '<td>' . $informacao_interna . '</td>';
                        echo '<td>' . $sede . '</td>';
                        echo '<td>' . $nome_razao_social . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<th>telefone</th>';
                        echo '<th>cep</th>';
                        echo '<th>protocolo autorização</th>';
                        echo '<th>Cnpj</th>';
                        echo '<th>inscrição estadual subs tributaria</th>';
                        echo '<th>inscrição estadual</th>';
                        echo '<th>natureza operação</th>';
                        echo '<th>nome razão social remetente</th>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>' . $telefone . '</td>';
                        echo '<td>' . $cep . '</td>';
                        echo '<td>' . $protocolo_autorizacao . '</td>';
                        echo '<td>' . $cnpj . '</td>';
                        echo '<td>' . $inscricao_estadual_subs_tributaria . '</td>';
                        echo '<td>' . $inscricao_estadual . '</td>';
                        echo '<td>' . $natureza_operacao . '</td>';
                        echo '<td>' . $nome_razao_social_remetente . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<th>cnpj/cpf remetente</th>';
                        echo '<th>cep remetente</th>';
                        echo '<th>telefone remetente</th>';
                        echo '<th>inscrição estadual remetente</th>';
                        echo '<th>data emissão</th>';
                        echo '<th>data entrada saída</th>';
                        echo '<th>hora saída</th>';
                        echo '<th>fatura/duplicata</th>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>' . $cnpj_cpf_remetente . '</td>';
                        echo '<td>' . $cep_remetente . '</td>';
                        echo '<td>' . $telefone_remetente . '</td>';
                        echo '<td>' . $inscricao_estadual_remetente . '</td>';
                        echo '<td>' . $data_emissao . '</td>';
                        echo '<td>' . $data_entrada_saida . '</td>';
                        echo '<td>' . $hora_saida . '</td>';
                        echo '<td>' . $fatura_duplicata . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<th>forma pagamento</th>';
                        echo '<th>base calculo icms</th>';
                        echo '<th>valor icms</th>';
                        echo '<th>valor base icms st</th>';
                        echo '<th>valor icms substituição</th>';
                        echo '<th>Total de Produtos</th>';
                        echo '<th>Valor Frete</th>';
                        echo '<th>Valor Seguro</th>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>' . $forma_pagamento . '</td>';
                        echo '<td>' . $base_calculo_icms . '</td>';
                        echo '<td>' . $valor_icms . '</td>';
                        echo '<td>' . $base_calculo_icms_st . '</td>';
                        echo '<td>' . $valor_icms_substituicao . '</td>';
                        echo '<td>' . $total_produtos . '</td>';
                        echo '<td>' . $valor_frete . '</td>';
                        echo '<td>' . $valor_seguro . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<th>Desconto</th>';
                        echo '<th>Outras Despesas</th>';
                        echo '<th>Valor Ipi</th>';
                        echo '<th>Valor Total Nota</th>';
                        echo '<th>Nome Razao Social Transportador</th>';
                        echo '<th>Frete Por Conta</th>';
                        echo '<th>Código ANTT</th>';
                        echo '<th>Placa Veículo</th>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>' . $desconto . '</td>';
                        echo '<td>' . $outras_despesas . '</td>';
                        echo '<td>' . $valor_ipi . '</td>';
                        echo '<td>' . $valor_total_nota . '</td>';
                        echo '<td>' . $nome_razao_social_transportador . '</td>';
                        echo '<td>' . $frete_por_conta . '</td>';
                        echo '<td>' . $codigo_antt . '</td>';
                        echo '<td>' . $placa_veiculo . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<th>Cnpj/Cpf Transportador</th>';
                        echo '<th>Inscrição Estadual Transportador</th>';
                        echo '<th>Quantidadde</th>';
                        echo '<th>Especie</th>';
                        echo '<th>Marca</th>';
                        echo '<th>Numeração</th>';
                        echo '<th>Peso Bruto</th>';
                        echo '<th>Peso Líquido</th>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>' . $cnpj_cpf_transportador . '</td>';
                        echo '<td>' . $inscricao_estadual_transportador . '</td>';
                        echo '<td>' . $quantidade . '</td>';
                        echo '<td>' . $especie . '</td>';
                        echo '<td>' . $marca . '</td>';
                        echo '<td>' . $numeracao . '</td>';
                        echo '<td>' . $peso_bruto . '</td>';
                        echo '<td>' . $peso_liquido . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<th>Inscrição Municipal</th>';
                        echo '<th>Valor Total Serviços</th>';
                        echo '<th>Base Cálculo ISSQN</th>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>' . $inscricao_municipal . '</td>';
                        echo '<td>' . $valor_total_servicos . '</td>';
                        echo '<td>' . $base_calculo_issqn . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<th>Produto 1</th>';
                        echo '<th>QUANTIDADE 1</th>';
                        echo '<th>UNIDADE 1</th>';
                        echo '<th>VALOR UN 1</th>';
                        echo '<th>CFOP 1</th>';
                        echo '<th>CST 1</th>';
                        echo '<th>NCM 1</th>';
                        echo '<th>VALOR TOTAL 1</th>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>' . $nome_produto1 . '</td>';
                        echo '<td>' . $quantidade_prod1 . '</td>';
                        echo '<td>' . $unid1 . '</td>';
                        echo '<td>' . $valor_unitario1 . '</td>';
                        echo '<td>' . $cfop1 . '</td>';
                        echo '<td>' . $cst1 . '</td>';
                        echo '<td>' . $ncm_sh1 . '</td>';
                        echo '<td>' . $valor_total_prod1 . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        if($nome_produto2 != ''){
                        echo '<th>Produto 2</th>';
                        echo '<th>QUANTIDADE 2</th>';
                        echo '<th>UNIDADE 2</th>';
                        echo '<th>VALOR UN 2</th>';
                        echo '<th>CFOP 2</th>';
                        echo '<th>CST 2</th>';
                        echo '<th>NCM 2</th>';
                        echo '<th>VALOR TOTAL 2</th>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>' . $nome_produto2 . '</td>';
                        echo '<td>' . $quantidade_prod2 . '</td>';
                        echo '<td>' . $unid2 . '</td>';
                        echo '<td>' . $valor_unitario2 . '</td>';
                        echo '<td>' . $cfop2 . '</td>';
                        echo '<td>' . $cst2 . '</td>';
                        echo '<td>' . $ncm_sh2 . '</td>';
                        echo '<td>' . $valor_total_prod2 . '</td>';
                        echo '</tr>';
                        }
                        echo '<tr>';
                        if($nome_produto3 != ''){
                        echo '<th>Produto 3</th>';
                        echo '<th>QUANTIDADE 3</th>';
                        echo '<th>UNIDADE 3</th>';
                        echo '<th>VALOR UN 3</th>';
                        echo '<th>CFOP 3</th>';
                        echo '<th>CST 3</th>';
                        echo '<th>NCM 3</th>';
                        echo '<th>VALOR TOTAL 3</th>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>' . $nome_produto3 . '</td>';
                        echo '<td>' . $quantidade_prod3 . '</td>';
                        echo '<td>' . $unid3 . '</td>';
                        echo '<td>' . $valor_unitario3 . '</td>';
                        echo '<td>' . $cfop3 . '</td>';
                        echo '<td>' . $cst3 . '</td>';
                        echo '<td>' . $ncm_sh3 . '</td>';
                        echo '<td>' . $valor_total_prod3 . '</td>';
                        echo '</tr>';
                        }
                        echo '<tr>';
                        if($nome_produto4 != ''){
                        echo '<th>Produto 4</th>';
                        echo '<th>QUANTIDADE 4</th>';
                        echo '<th>UNIDADE 4</th>';
                        echo '<th>VALOR UN 4</th>';
                        echo '<th>CFOP 4</th>';
                        echo '<th>CST 4</th>';
                        echo '<th>NCM 4</th>';
                        echo '<th>VALOR TOTAL 4</th>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>' . $nome_produto4 . '</td>';
                        echo '<td>' . $quantidade_prod4 . '</td>';
                        echo '<td>' . $unid4 . '</td>';
                        echo '<td>' . $valor_unitario4 . '</td>';
                        echo '<td>' . $cfop4 . '</td>';
                        echo '<td>' . $cst4 . '</td>';
                        echo '<td>' . $ncm_sh4 . '</td>';
                        echo '<td>' . $valor_total_prod4 . '</td>';
                        echo '</tr>';
                        }
                    }
                }

                echo '</tbody>';
                echo '</table>';
                echo '</div>';

            // Fecha a conexão
            $conexao->close();
            ?>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var modal = document.getElementById("myModal");

            var btn = document.getElementById("nota-ver");

            var span = document.getElementsByClassName("close")[0];

            btn.onclick = function () {
                modal.style.display = "block";
            }

            span.onclick = function () {
                modal.style.display = "none";
            }

            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        });
    </script>
    <script src="js/movimentar.js"></script>
    <script src="js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>
</body>

</html>