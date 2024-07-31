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
                    <button id="generatePDF" style="position: absolute; top: 10px; right: 10px;">Gerar PDF</button>
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
                                                            echo '<tr>';
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
                                                            echo '<tr>';
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
                                        <div class="cancelar">
                                            <!-- Botão para abrir o Modal -->
                        <h1>Cancelar</h1>
                        <button type="button" class=" btn-primary" data-bs-toggle="modal" data-bs-target="#meuModal">
                            Cancelar
                        </button>

                    
                                        </div>
                                        <!-- Modal -->
                        <div class="modal fade" id="meuModal" tabindex="-1" aria-labelledby="meuModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="meuModalLabel">Conteúdo da Solicitação</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Fechar"></button>
                                    </div>
                                    <div class="modal-body">
                                        543
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                                        
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
                                    <button type="submit">Enviar</button>
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
            var modal = document.getElementById("myModal");

            var btn = document.getElementById("nota-ver");

            var span = document.getElementsByClassName("close")[0];

            btn.onclick = function() {
                modal.style.display = "block";
            }

            span.onclick = function() {
                modal.style.display = "none";
            }

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
