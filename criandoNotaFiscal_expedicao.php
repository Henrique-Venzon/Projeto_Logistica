<?php
session_start();
$turma = $_SESSION['turma'];
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}
include_once ('include/conexao.php');

// Checando a conexão
if ($conn->connect_error) {
    die('Conexão falhou: ' . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT produto, produto2, produto3, produto4, 
               quantidade, quantidade2, quantidade3, quantidade4 
        FROM solicitacao 
        WHERE id = ".$id."";

// Executando a consulta
$result = $conn->query($sql);

// Inicializando as variáveis com valores padrão
$produto1 = $produto2 = $produto3 = $produto4 = '';
$unidade1 = $unidade2 = $unidade3 = $unidade4 = '0';
$quantidade1 = $quantidade2 = $quantidade3 = $quantidade4 = 0;
$valor1 = $valor2 = $valor3 = $valor4 = '0.00';
$ncm1 = $ncm2 = $ncm3 = $ncm4 = 0;
$cst1 = $cst2 = $cst3 = $cst4 = 0;
$cfop1 = $cfop2 = $cfop3 = $cfop4 = 0;

// Verificando se há resultados
if ($result->num_rows > 0) {
    // Pegando o resultado como um array associativo
    $row = $result->fetch_assoc();

    $produto1 = $row['produto'];
    $produto2 = $row['produto2'];
    $produto3 = $row['produto3'];
    $produto4 = $row['produto4'];

    $quantidade1 = $row['quantidade'];
    $quantidade2 = $row['quantidade2'];
    $quantidade3 = $row['quantidade3'];
    $quantidade4 = $row['quantidade4'];


} else {
    echo 'Nenhum resultado encontrado';
}

// Fechando a conexão

?>

<!DOCTYPE html>
<html lang='pt-BR'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<head>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='shortcut icon' href='img/amem.svg'>
    <meta charset='utf-8'>
    <title>
        <?php
        $tituloPag = 'Nota Fiscal';
        echo 'Criando ' . $tituloPag;
        ?>
    </title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ' crossorigin='anonymous'>
    <link href='https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap'
        rel='stylesheet'>
    <link rel='stylesheet' href='css/criarNota.css'>
</head>

<body>
    <?php include 'include/header.php'; ?>
    <main>
        <?php include 'include/menuLateral.php'; ?>
        <div class='DivDireita'>
            <div class='table-inputs'>
                <div class='text'>
                    <h1>Nota Fiscal</h1>
                </div>
                <div class='tabelaScroll'>
                    <div class='presets'>
                        <button id='autoDanfe'>Preset 1</button>
                        <button id='autoDanfe1'>Preset 2</button>
                        <button id='autoDanfe2'>Preset 3</button>
                        <button id='autoDanfe3'>Preset 4</button>
                        <button id='autoDanfe4'>Preset 5</button>
                        <button id='autoDanfe5'>Preset 6</button>
                        <button id='preset3'>Desconto Certo</button> <!-- sempre confundia essa merda -->
                    </div>
                    <div class='inputDanfe'>
                        <form action='processamento/ProcessoDanfeExpedicao.php' method='post' id='danfeForm'>
                            <div class='section'>
                                <label for='numero'>Número</label>
                                <input type='text' id='numerodef' name='numero' value='<?php echo $id ?>' required>

                                <label for='serie'>Série</label>
                                <input type='text' id='serie' name='serie' required>

                                <label for='entrada_saida'>Entrada/Saída</label>
                                <input type='date' id='entrada_saida' name='entrada_saida' required>

                                <label for='chave_acesso'>Chave de Acesso</label>
                                <input type='text' id='chave_acesso' name='chave_acesso' required>

                                <label for='informacao_interna'>Fornecedor</label>
                                <input type='text' id='informacao_interna' name='informacao_interna'>

                                <label for='nome_razao_social'>Nome/Razão Social</label>
                                <input type='text' id='nome_razao_social' name='nome_razao_social' required>

                                <label for='sede'>Sede</label>
                                <input type='text' id='sede' name='sede' required>

                                <label for='telefone'>Telefone</label>
                                <input type='text' id='telefone' name='telefone' required>

                                <label for='cep'>CEP</label>
                                <input type='text' id='cep' name='cep' required>

                                <label for='protocolo_autorizacao'>Protocolo de Autorização de Uso</label>
                                <input type='text' id='protocolo_autorizacao' name='protocolo_autorizacao' required>

                                <label for='cnpj'>CNPJ</label>
                                <input type='text' id='cnpj' name='cnpj' required>

                                <label for='inscricao_estadual_subs_tributaria'>Inscrição Estadual Sub.Tributária</label>
                                <input type='text' id='inscricao_estadual_subs_tributaria'
                                    name='inscricao_estadual_subs_tributaria'>

                                <label for='natureza_operacao'>Natureza da Operação</label>
                                <input type='text' id='natureza_operacao' name='natureza_operacao' required>

                                <label for='inscricao_estadual'>Inscrição Estadual</label>
                                <input type='text' id='inscricao_estadual' name='inscricao_estadual'>
                            </div>

                            <!-- Identificação do Remetente/Destinatário Section -->
                            <div class='section'>
                                <h2>Identificação do Remetente/Destinatário</h2>
                                <label for='nome_razao_social_remetente'>Nome/Razão Social</label>
                                <input type='text' id='nome_razao_social_remetente' name='nome_razao_social_remetente'
                                    required>

                                <label for='cnpj_cpf_remetente'>CNPJ/CPF</label>
                                <input type='text' id='cnpj_cpf_remetente' name='cnpj_cpf_remetente' required>

                                <label for='cep_remetente'>CEP</label>
                                <input type='text' id='cep_remetente' name='cep_remetente' required>

                                <label for='telefone_remetente'>Telefone</label>
                                <input type='text' id='telefone_remetente' name='telefone_remetente' required>

                                <label for='inscricao_estadual_remetente'>Inscrição Estadual</label>
                                <input type='text' id='inscricao_estadual_remetente'
                                    name='inscricao_estadual_remetente'>

                                <label for='data_emissao'>Data de Emissão</label>
                                <input type='date' id='data_emissao' name='data_emissao' required>

                                <label for='data_entrada_saida'>Data de Entrada/Saída</label>
                                <input type='date' id='data_entrada_saida' name='data_entrada_saida' required>

                                <label for='hora_saida'>Hora de Saída</label>
                                <input type='time' id='hora_saida' name='hora_saida' required>

                                <label for='fatura_duplicata'>Fatura/Duplicata</label>
                                <input type='text' id='fatura_duplicata' name='fatura_duplicata' required>

                                <label for='forma_pagamento'>Forma de Pagamento</label>
                                <input type='text' id='forma_pagamento' name='forma_pagamento' required>
                            </div>

                            <!-- Cálculo do Imposto Section -->
                            <div class='section'>
                                <h2>Cálculo do Imposto</h2>
                                <label for='base_calculo_icms'>Base de Cálculo de ICMS</label>
                                <input type='number' step='0.01' id='base_calculo_icms' name='base_calculo_icms'
                                    required>

                                <label for='valor_icms'>Valor do ICMS</label>
                                <input type='number' step='0.01' id='valor_icms' name='valor_icms' required>

                                <label for='base_calculo_icms_st'>Base de Cálculo de ICMS ST</label>
                                <input type='number' step='0.01' id='base_calculo_icms_st' name='base_calculo_icms_st'>

                                <label for='valor_icms_substituicao'>Valor do ICMS Substituição</label>
                                <input type='number' step='0.01' id='valor_icms_substituicao'
                                    name='valor_icms_substituicao'>

                                <label for='valor_frete'>Valor do Frete</label>
                                <input type='number' step='0.01' id='valor_frete' name='valor_frete'>

                                <label for='valor_seguro'>Valor do Seguro</label>
                                <input type='number' step='0.01' id='valor_seguro' name='valor_seguro'>

                                <label for='desconto'>Desconto</label>
                                <input type='number' step='0.01' id='desconto' name='desconto'>

                                <label for='outras_despesas'>Outras Despesas Acessórias</label>
                                <input type='number' step='0.01' id='outras_despesas' name='outras_despesas'>

                                <label for='valor_ipi'>Valor do IPI</label>
                                <input type='number' step='0.01' id='valor_ipi' name='valor_ipi'>

                            </div>

                            <!-- Transportador/Volumes Transportados Section -->
                            <div class='section'>
                                <h2>Transportador/Volumes Transportados</h2>
                                <label for='nome_razao_social_transportador'>Nome/Razão Social</label>
                                <input type='text' id='nome_razao_social_transportador'
                                    name='nome_razao_social_transportador'>

                                <label for='frete_por_conta'>Frete por Conta</label>
                                <input type='text' id='frete_por_conta' name='frete_por_conta'>

                                <label for='codigo_antt'>Código ANTT</label>
                                <input type='text' id='codigo_antt' name='codigo_antt'>

                                <label for='placa_veiculo'>Placa do Veículo</label>
                                <input type='text' id='placa_veiculo' name='placa_veiculo'>

                                <label for='cnpj_cpf_transportador'>CNPJ/CPF</label>
                                <input type='text' id='cnpj_cpf_transportador' name='cnpj_cpf_transportador'>

                                <label for='inscricao_estadual_transportador'>Inscrição Estadual</label>
                                <input type='text' id='inscricao_estadual_transportador' name='inscricao_estadual_transportador'>

                                <label for='quantidade'>Quantidade</label>
                                <input type='number' id='quantidade' name='quantidade'>

                                <label for='especie'>Espécie</label>
                                <input type='text' id='especie' name='especie'>

                                <label for='marca'>Marca</label>
                                <input type='text' id='marca' name='marca'>

                                <label for='numeracao'>Numeração</label>
                                <input type='text' id='numeracao' name='numeracao'>

                                <label for='peso_bruto'>Peso Bruto</label>
                                <input type='number' step='0.01' id='peso_bruto' name='peso_bruto'>

                                <label for='peso_liquido'>Peso Líquido</label>
                                <input type='number' step='0.01' id='peso_liquido' name='peso_liquido'>
                            </div>
                            <?php

                            // Inicializa variáveis dos produtos
                            for ($i = 1; $i <= 4; $i++) {
                                ${"produto" . $i} = "";
                                ${"ncm" . $i} = "";
                                ${"cst" . $i} = "";
                                ${"cfop" . $i} = "";
                                ${"unidade" . $i} = "";
                                ${"quantidade" . $i} = "";
                                ${"valor" . $i} = ""; // Valor (preço) do produto
                                ${"total" . $i} = "";
                            }

                            // Obtém o ID da solicitação via GET
                            $id_solicitacao = isset($_GET['id']) ? $_GET['id'] : null;

                            if ($id_solicitacao) {
                                // Consulta SQL para buscar os produtos da solicitação
                                $sql = "SELECT * FROM solicitacao WHERE id = ?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("i", $id_solicitacao);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();

                                    // Preenche as variáveis com os dados da solicitação
                                    for ($i = 1; $i <= 4; $i++) {
                                        // Verifica se o produto existe na solicitação
                                        if (!empty($row['produto' . $i])) {
                                            $nomeProduto = $row['produto' . $i];

                                            // Consulta SQL para buscar informações do produto na tabela 'produtos'
                                            $sqlProduto = "SELECT * FROM produtos WHERE nome_produto = ?";
                                            $stmtProduto = $conn->prepare($sqlProduto);
                                            $stmtProduto->bind_param("s", $nomeProduto);
                                            $stmtProduto->execute();
                                            $resultProduto = $stmtProduto->get_result();

                                            if ($resultProduto->num_rows > 0) {
                                                $rowProduto = $resultProduto->fetch_assoc();

                                                // Preenche TODAS as variáveis com os dados do produto
                                                ${"produto" . $i} = $rowProduto['nome_produto'];
                                                ${"ncm" . $i} = $rowProduto['ncm_sh'];
                                                ${"cst" . $i} = $rowProduto['cst'];
                                                ${"cfop" . $i} = $rowProduto['cfop'];
                                                ${"unidade" . $i} = $rowProduto['unidade'];
                                                ${"valor" . $i} = $rowProduto['preco'];

                                                // Quantidade vem da solicitação, não do produto
                                                ${"quantidade" . $i} = $row['quantidade' . $i];

                                                // Calcula o total 
                                                ${"total" . $i} = ${"quantidade" . $i} * ${"valor" . $i};
                                            }

                                            $stmtProduto->close();
                                        }
                                    }
                                } else {
                                    echo "Solicitação não encontrada.";
                                }

                                $stmt->close();
                            } else {
                                echo "ID da solicitação não fornecido.";
                            }
                            $conn->close();
                            ?>
                            <!-- Dados do Produto/Serviço Section -->
                            <div class='section'>
                                <h2>Dados do Produto/Serviço</h2>
                                <h2> Produto 1 </h2>
                                <label for='nome_produto1'>Nome do Produto</label>
                                <input type='text' id='nome_produto1' name='nome_produto1'
                                    value='<?php echo $produto1; ?>' required>

                                <label for='ncm_sh1'>NCM/SH</label>
                                <input type='text' id='ncm_sh1' name='ncm_sh1' value='<?php echo $ncm1; ?>' required>

                                <label for='cst1'>CST</label>
                                <input type='text' id='cst1' name='cst1' value='<?php echo $cst1; ?>' required>

                                <label for='cfop1'>CFOP</label>
                                <input type='text' id='cfop1' name='cfop1' value='<?php echo $cfop1; ?>' required>

                                <label for='unid1'>Unidade</label>
                                <input type='text' id='unid1' name='unid1' value=' <?php echo $unidade1; ?>' required>

                                <label for='quantidade_prod1'>Quantidade</label>
                                <input type='number' step='0.01' id='quantidade_prod1' name='quantidade_prod1' value='<?php echo $quantidade1; ?>' required>

                                <label for='valor_unitario1'>Valor Unitário</label>
                                <input type='number' step='0.01' id='valor_unitario1' name='valor_unitario1' value='<?php echo $valor1; ?>' required>

                                <label for='valor_total_prod1'>Valor Total</label>
                                <input type='number' step='0.01' id='valor_total_prod1' name='valor_total_prod1' value='<?php echo $total1; ?>' required>

                                <h2> Produto 2 </h2>
                                <label for='nome_produto2'>Nome do Produto</label>
                                <input type='text' id='nome_produto2' name='nome_produto2' value='<?php echo $produto2; ?>'>

                                <label for='ncm_sh2'>NCM/SH</label>
                                <input type='text' id='ncm_sh2' name='ncm_sh2' value='<?php echo $ncm2; ?>'>

                                <label for='cst2'>CST</label>
                                <input type='text' id='cst2' name='cst2' value='<?php echo $cst2; ?>'>

                                <label for='cfop2'>CFOP</label>
                                <input type='text' id='cfop2' name='cfop2' value='<?php echo $cfop2; ?>'>

                                <label for='unid2'>Unidade</label>
                                <input type='text' id='unid2' name='unid2' value='<?php echo $unidade2; ?>'>

                                <label for='quantidade_prod2'>Quantidade</label>
                                <input type='number' step='0.01' id='quantidade_prod2' name='quantidade_prod2' value='<?php echo $quantidade2; ?>'>

                                <label for='valor_unitario2'>Valor Unitário</label>
                                <input type='number' step='0.01' id='valor_unitario2' name='valor_unitario2' value='<?php echo $valor2; ?>'>

                                <label for='valor_total_prod2'>Valor Total</label>
                                <input type='number' step='0.01' id='valor_total_prod2' name='valor_total_prod2' value='<?php echo $total2; ?>'>


                                <h2> Produto 3 </h2>
                                <label for='nome_produto3'>Nome do Produto</label>
                                <input type='text' id='nome_produto3' name='nome_produto3' value='<?php echo $produto3; ?>'>

                                <label for='ncm_sh3'>NCM/SH</label>
                                <input type='text' id='ncm_sh3' name='ncm_sh3' value='<?php echo $ncm3; ?>'>

                                <label for='cst3'>CST</label>
                                <input type='text' id='cst3' name='cst3' value='<?php echo $cst3; ?>'>

                                <label for='cfop3'>CFOP</label>
                                <input type='text' id='cfop3' name='cfop3' value='<?php echo $cfop3; ?>'>

                                <label for='unid3'>Unidade</label>
                                <input type='text' id='unid3' name='unid3' value='<?php echo $unidade3; ?>'>

                                <label for='quantidade_prod3'>Quantidade</label>
                                <input type='number' step='0.01' id='quantidade_prod3' name='quantidade_prod3' value='<?php echo $quantidade3; ?>'>

                                <label for='valor_unitario3'>Valor Unitário</label>
                                <input type='number' step='0.01' id='valor_unitario3' name='valor_unitario3' value='<?php echo $valor3; ?>'>

                                <label for='valor_total_prod3'>Valor Total</label>
                                <input type='number' step='0.01' id='valor_total_prod3' name='valor_total_prod3' value='<?php echo $total3; ?>'>


                                <h2> Produto 4 </h2>
                                <label for='nome_produto4'>Nome do Produto</label>
                                <input type='text' id='nome_produto4' name='nome_produto4' value='<?php echo $produto4; ?>'>

                                <label for='ncm_sh4'>NCM/SH</label>
                                <input type='text' id='ncm_sh4' name='ncm_sh4' value='<?php echo $ncm4; ?>'>

                                <label for='cst4'>CST</label>
                                <input type='text' id='cst4' name='cst4' value='<?php echo $cst4; ?>'>

                                <label for='cfop4'>CFOP</label>
                                <input type='text' id='cfop4' name='cfop4' value='<?php echo $cfop4; ?>'>

                                <label for='unid4'>Unidade</label>
                                <input type='text' id='unid4' name='unid4' value='<?php echo $unidade4; ?>'>

                                <label for='quantidade_prod4'>Quantidade</label>
                                <input type='number' step='0.01' id='quantidade_prod4' name='quantidade_prod4' value='<?php echo $quantidade4; ?>'>

                                <label for='valor_unitario4'>Valor Unitário</label>
                                <input type='number' step='0.01' id='valor_unitario4' name='valor_unitario4' value='<?php echo $valor4; ?>'>

                                <label for='valor_total_prod4'>Valor Total</label>
                                <input type='number' step='0.01' id='valor_total_prod4' name='valor_total_prod4' value='<?php echo $total4; ?>'>
                            </div>

                            <!-- Cálculo do ISSQN Section -->
                            <div class='section'>
                                <h2>Cálculo do ISSQN</h2>
                                <label for='inscricao_municipal'>Inscrição Municipal</label>
                                <input type='text' id='inscricao_municipal' name='inscricao_municipal'>

                                <label for='valor_total_servicos'>Valor Total dos Serviços</label>
                                <input type='number' step='0.01' id='valor_total_servicos' name='valor_total_servicos'>

                                <label for='base_calculo_issqn'>Base de Cálculo do ISSQN (%)</label>
                                <input type='number' step='0.01' id='base_calculo_issqn' name='base_calculo_issqn'>
                            </div>


                            <div class='button-group'>
                                <button type='button' id='clearForm'>Apagar tudo</button>
                                <button type='submit' id='enviar'>Enviar</button>
                            </div>


                            <input type="hidden" id='total_produtos2' name='total_produtos'>
                            <input type="hidden" id='valor_total_nota2' name='valor_total_nota'>

                        </form>

                        <div class="container-amostra-wrapper">
                            <div class="container-amostra">
                                <label for='valor_total_nota'>Valor Total da Nota sem desconto</label>
                                <input type="text" id="valor_total_nota" name="valor_total_nota" readonly>

                                <label>O valor total com desconto é</label>
                                <input type="text" id="deconto" name="deconto" readonly>

                                <label for='total_produtos'>Total dos Produtos</label>
                                <input type="text" id='total_produtos' name='total_produtos' readonly>
                                <label>O valor do ISSQN</label>
                                <input type="text" id="issqnto" name="issqnto" readonly>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </main>

    <script src='danfe/autodanfe.js'></script>
    <script src='js/sidebar.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe'
        crossorigin='anonymous'></script>
</body>

</html>