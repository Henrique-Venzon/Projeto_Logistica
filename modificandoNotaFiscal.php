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

$npedido = $_GET['npedido'];
// *** ATENÇÃO: Ajustado para buscar na tabela 'nota_fiscal' ***
$sql = 'SELECT * FROM nota_fiscal where id_atividade='. $npedido . ' and id_turma =' . $turma;

// Executando a consulta
$result = $conn->query($sql);

// Verificando se há resultados
if ($result->num_rows > 0) {
    // Pegando o resultado como um array associativo
    $row = $result->fetch_assoc();

    // Atribuindo os valores do banco de dados às variáveis
    $numero = $row['numero'];
    $serie = $row['serie'];
    $entrada_saida = $row['entrada_saida'];
    $chave_acesso = $row['chave_acesso'];
    $informacao_interna = $row['informacao_interna'];
    $nome_razao_social = $row['nome_razao_social'];
    $sede = $row['sede'];
    $telefone = $row['telefone'];
    $cep = $row['cep'];
    $protocolo_autorizacao = $row['protocolo_autorizacao'];
    $cnpj = $row['cnpj'];
    $inscricao_estadual_subs_tributaria = $row['inscricao_estadual_subs_tributaria'];
    $natureza_operacao = $row['natureza_operacao'];
    $inscricao_estadual = $row['inscricao_estadual'];
    $nome_razao_social_remetente = $row['nome_razao_social_remetente'];
    $cnpj_cpf_remetente = $row['cnpj_cpf_remetente'];
    $cep_remetente = $row['cep_remetente'];
    $telefone_remetente = $row['telefone_remetente'];
    $inscricao_estadual_remetente = $row['inscricao_estadual_remetente'];
    $data_emissao = $row['data_emissao'];
    $data_entrada_saida = $row['data_entrada_saida'];
    $hora_saida = $row['hora_saida'];
    $fatura_duplicata = $row['fatura_duplicata'];
    $forma_pagamento = $row['forma_pagamento'];
    $base_calculo_icms = $row['base_calculo_icms'];
    $valor_icms = $row['valor_icms'];
    $base_calculo_icms_st = $row['base_calculo_icms_st'];
    $valor_icms_substituicao = $row['valor_icms_substituicao'];
    $total_produtos = $row['total_produtos'];
    $valor_frete = $row['valor_frete'];
    $valor_seguro = $row['valor_seguro'];
    $desconto = $row['desconto'];
    $outras_despesas = $row['outras_despesas'];
    $valor_ipi = $row['valor_ipi'];
    $valor_total_nota = $row['valor_total_nota'];
    $nome_razao_social_transportador = $row['nome_razao_social_transportador'];
    $frete_por_conta = $row['frete_por_conta'];
    $codigo_antt = $row['codigo_antt'];
    $placa_veiculo = $row['placa_veiculo'];
    $cnpj_cpf_transportador = $row['cnpj_cpf_transportador'];
    $inscricao_estadual_transportador = $row['inscricao_estadual_transportador'];
    $quantidade = $row['quantidade'];
    $especie = $row['especie'];
    $marca = $row['marca'];
    $numeracao = $row['numeracao'];
    $peso_bruto = $row['peso_bruto'];
    $peso_liquido = $row['peso_liquido'];
    $nome_produto1 = $row['nome_produto1'];
    $ncm_sh1 = $row['ncm_sh1'];
    $cst1 = $row['cst1'];
    $cfop1 = $row['cfop1'];
    $unid1 = $row['unid1'];
    $quantidade_prod1 = $row['quantidade_prod1'];
    $valor_unitario1 = $row['valor_unitario1'];
    $valor_total_prod1 = $row['valor_total_prod1'];
    $nome_produto2 = $row['nome_produto2'];
    $ncm_sh2 = $row['ncm_sh2'];
    $cst2 = $row['cst2'];
    $cfop2 = $row['cfop2'];
    $unid2 = $row['unid2'];
    $quantidade_prod2 = $row['quantidade_prod2'];
    $valor_unitario2 = $row['valor_unitario2'];
    $valor_total_prod2 = $row['valor_total_prod2'];
    $nome_produto3 = $row['nome_produto3'];
    $ncm_sh3 = $row['ncm_sh3'];
    $cst3 = $row['cst3'];
    $cfop3 = $row['cfop3'];
    $unid3 = $row['unid3'];
    $quantidade_prod3 = $row['quantidade_prod3'];
    $valor_unitario3 = $row['valor_unitario3'];
    $valor_total_prod3 = $row['valor_total_prod3'];
    $nome_produto4 = $row['nome_produto4'];
    $ncm_sh4 = $row['ncm_sh4'];
    $cst4 = $row['cst4'];
    $cfop4 = $row['cfop4'];
    $unid4 = $row['unid4'];
    $quantidade_prod4 = $row['quantidade_prod4'];
    $valor_unitario4 = $row['valor_unitario4'];
    $valor_total_prod4 = $row['valor_total_prod4'];
    $inscricao_municipal = $row['inscricao_municipal'];
    $valor_total_servicos = $row['valor_total_servicos'];
    $base_calculo_issqn = $row['base_calculo_issqn']; 
    $empresa = $row['Empresa']; 
    $id = $row['id']; 
} else {
    echo 'Nenhum resultado encontrado';
}

// Fechando a conexão
$conn->close();
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
                    <div class='inputDanfe'>
                        <form action='processamento/update_notafiscal.php' method='post' id='danfeForm'>
                            <div class='section'>
                                <label for='numero'>Número</label>
                                <input type='text' id='numerodef' name='numero' value='<?php echo $numero; ?>' required>

                                <label for='serie'>Série</label>
                                <input type='text' id='serie' name='serie' value='<?php echo $serie; ?>' required>

                                <label for='entrada_saida'>Entrada/Saída</label>
                                <input type='date' id='entrada_saida' name='entrada_saida' value='<?php echo $entrada_saida; ?>' required>

                                <label for='chave_acesso'>Chave de Acesso</label>
                                <input type='text' id='chave_acesso' name='chave_acesso' value='<?php echo $chave_acesso; ?>' required>

                                <label for='informacao_interna'>Fornecedor</label>
                                <input type='text' id='informacao_interna' name='informacao_interna' value='<?php echo $informacao_interna; ?>' required>

                                <label for='nome_razao_social'>Nome/Razão Social</label>
                                <input type='text' id='nome_razao_social' name='nome_razao_social' value='<?php echo $nome_razao_social; ?>' required>

                                <label for='sede'>Sede</label>
                                <input type='text' id='sede' name='sede' value='<?php echo $sede; ?>' required>

                                <label for='telefone'>Telefone</label>
                                <input type='text' id='telefone' name='telefone' value='<?php echo $telefone; ?>' required>

                                <label for='cep'>CEP</label>
                                <input type='text' id='cep' name='cep' value='<?php echo $cep; ?>' required>

                                <label for='protocolo_autorizacao'>Protocolo de Autorização de Uso</label>
                                <input type='text' id='protocolo_autorizacao' name='protocolo_autorizacao' value='<?php echo $protocolo_autorizacao; ?>' required>

                                <label for='cnpj'>CNPJ</label>
                                <input type='text' id='cnpj' name='cnpj' value='<?php echo $cnpj; ?>' required>

                                <label for='inscricao_estadual_subs_tributaria'>Inscrição Estadual Sub.
                                    Tributária</label>
                                <input type='text' id='inscricao_estadual_subs_tributaria'
                                    name='inscricao_estadual_subs_tributaria' value='<?php echo $inscricao_estadual_subs_tributaria; ?>' required>

                                <label for='natureza_operacao'>Natureza da Operação</label>
                                <input type='text' id='natureza_operacao' name='natureza_operacao' value='<?php echo $natureza_operacao; ?>' required>

                                <label for='inscricao_estadual'>Inscrição Estadual</label>
                                <input type='text' id='inscricao_estadual' name='inscricao_estadual' value='<?php echo $inscricao_estadual; ?>' required>
                            </div>

                            <!-- Identificação do Remetente/Destinatário Section -->
                            <div class='section'>
                                <h2>Identificação do Remetente</h2>
                                <label for='nome_razao_social_remetente'>Nome/Razão Social</label>
                                <input type='text' id='nome_razao_social_remetente' name='nome_razao_social_remetente'
                                    value="<?php echo $nome_razao_social_remetente; ?>" required>

                                <label for='cnpj_cpf_remetente'>CNPJ/CPF</label>
                                <input type='text' id='cnpj_cpf_remetente' name='cnpj_cpf_remetente' value='<?php echo $cnpj_cpf_remetente; ?>' required>

                                <label for='cep_remetente'>CEP</label>
                                <input type='text' id='cep_remetente' name='cep_remetente'
                                    value="<?php echo $cep_remetente; ?>" required>

                                <label for='telefone_remetente'>Telefone</label>
                                <input type='text' id='telefone_remetente' name='telefone_remetente'
                                    value="<?php echo $telefone_remetente; ?>" required>

                                <label for='Empresa_remetente'>Empresa</label>
                                <input type='text' id='Empresa_remetente' name='Empresa_remetente' value='<?php echo $empresa ?>' required> 
                                 <!-- Verifique se este campo existe na sua tabela -->

                                <label for='inscricao_estadual_remetente'>Inscrição Estadual</label>
                                <input type='text' id='inscricao_estadual_remetente' name='inscricao_estadual_remetente'
                                    value='<?php echo $inscricao_estadual_remetente; ?>' required>

                                <label for='data_emissao'>Data de Emissão</label>
                                <input type='date' id='data_emissao' name='data_emissao' value='<?php echo $data_emissao; ?>' required>

                                <label for='data_entrada_saida'>Data de Entrada/Saída</label>
                                <input type='date' id='data_entrada_saida' name='data_entrada_saida' value='<?php echo $data_entrada_saida; ?>' required>

                                <label for='hora_saida'>Hora de Saída</label>
                                <input type='time' id='hora_saida' name='hora_saida' value='<?php echo $hora_saida; ?>' required>

                                <label for='fatura_duplicata'>Fatura/Duplicata</label>
                                <input type='text' id='fatura_duplicata' name='fatura_duplicata' value='<?php echo $fatura_duplicata; ?>' required>

                                <label for='forma_pagamento'>Forma de Pagamento</label>
                                <input type='text' id='forma_pagamento' name='forma_pagamento' value='<?php echo $forma_pagamento; ?>' required>
                            </div>

                            <!-- Cálculo do Imposto Section -->
                            <div class='section'>
                                <h2>Cálculo do Imposto</h2>
                                <label for='base_calculo_icms'>Base de Cálculo de ICMS</label>
                                <input type='number' step='0.01' id='base_calculo_icms' name='base_calculo_icms'
                                    value='<?php echo $base_calculo_icms; ?>' required>

                                <label for='valor_icms'>Valor do ICMS</label>
                                <input type='number' step='0.01' id='valor_icms' name='valor_icms' value='<?php echo $valor_icms; ?>' required>

                                <label for='base_calculo_icms_st'>Base de Cálculo de ICMS ST</label>
                                <input type='number' step='0.01' id='base_calculo_icms_st' name='base_calculo_icms_st'
                                    value='<?php echo $base_calculo_icms_st; ?>' required>

                                <label for='valor_icms_substituicao'>Valor do ICMS Substituição</label>
                                <input type='number' step='0.01' id='valor_icms_substituicao'
                                    name='valor_icms_substituicao' value='<?php echo $valor_icms_substituicao; ?>' required>

                                <label for='valor_frete'>Valor do Frete</label>
                                <input type='number' step='0.01' id='valor_frete' name='valor_frete' value='<?php echo $valor_frete; ?>' required>

                                <label for='valor_seguro'>Valor do Seguro</label>
                                <input type='number' step='0.01' id='valor_seguro' name='valor_seguro' value='<?php echo $valor_seguro; ?>' required>

                                <label for='desconto'>Desconto</label>
                                <input type='number' step='0.01' id='desconto' name='desconto' value='<?php echo $desconto; ?>' required>

                                <label for='outras_despesas'>Outras Despesas Acessórias</label>
                                <input type='number' step='0.01' id='outras_despesas' name='outras_despesas' value='<?php echo $outras_despesas; ?>' required>

                                <label for='valor_ipi'>Valor do IPI</label>
                                <input type='number' step='0.01' id='valor_ipi' name='valor_ipi' value='<?php echo $valor_ipi; ?>' required>

                            </div>

                            <!-- Transportador/Volumes Transportados Section -->
                            <div class='section'>
                                <h2>Transportador/Volumes Transportados</h2>
                                <label for='nome_razao_social_transportador'>Nome/Razão Social</label>
                                <input type='text' id='nome_razao_social_transportador'
                                    name='nome_razao_social_transportador' value='<?php echo $nome_razao_social_transportador; ?>' required>

                                <label for='frete_por_conta'>Frete por Conta</label>
                                <input type='text' id='frete_por_conta' name='frete_por_conta' value='<?php echo $frete_por_conta; ?>' required>

                                <label for='codigo_antt'>Código ANTT</label>
                                <input type='text' id='codigo_antt' name='codigo_antt' value='<?php echo $codigo_antt; ?>' required>

                                <label for='placa_veiculo'>Placa do Veículo</label>
                                <input type='text' id='placa_veiculo' name='placa_veiculo' value='<?php echo $placa_veiculo; ?>' required>

                                <label for='cnpj_cpf_transportador'>CNPJ/CPF</label>
                                <input type='text' id='cnpj_cpf_transportador' name='cnpj_cpf_transportador' value='<?php echo $cnpj_cpf_transportador; ?>' required>

                                <label for='inscricao_estadual_transportador'>Inscrição Estadual</label>
                                <input type='text' id='inscricao_estadual_transportador'
                                    name='inscricao_estadual_transportador' value='<?php echo $inscricao_estadual_transportador; ?>' required>

                                <label for='quantidade'>Quantidade de produtos carregados</label>
                                <input type='number' id='quantidade' name='quantidade'
                                    value="<?php echo $quantidade; ?>"
                                    required>

                                <label for='especie'>Espécie</label>
                                <input type='text' id='especie' name='especie' value='<?php echo $especie; ?>' required>

                                <label for='marca'>Marca</label>
                                <input type='text' id='marca' name='marca' value='<?php echo $marca; ?>' required>

                                <label for='numeracao'>Numeração</label>
                                <input type='text' id='numeracao' name='numeracao' value='<?php echo $numeracao; ?>' required>

                                <label for='peso_bruto'>Peso Bruto</label>
                                <input type='number' step='0.01' id='peso_bruto' name='peso_bruto' value='<?php echo $peso_bruto; ?>' required>

                                <label for='peso_liquido'>Peso Líquido</label>
                                <input type='number' step='0.01' id='peso_liquido' name='peso_liquido' value='<?php echo $peso_liquido; ?>' required>
                            </div>

                            <!-- Dados do Produto/Serviço Section -->
                            <div class='section'>
                                <h2>Dados do Produto/Serviço</h2>
                                <h2> Produto 1 </h2>
                                <label for='nome_produto1'>Nome do Produto</label>
                                <input type='text' id='nome_produto1' name='nome_produto1'
                                    value='<?php echo $nome_produto1; ?>' required>

                                <label for='ncm_sh1'>NCM/SH</label>
                                <input type='text' id='ncm_sh1' name='ncm_sh1' value='<?php echo $ncm_sh1; ?>' required>

                                <label for='cst1'>CST</label>
                                <input type='text' id='cst1' name='cst1' value='<?php echo $cst1; ?>' required>

                                <label for='cfop1'>CFOP</label>
                                <input type='text' id='cfop1' name='cfop1' value='<?php echo $cfop1; ?>' required>

                                <label for='unid1'>Unidade</label>
                                <input type='text' id='unid1' name='unid1' value='<?php echo $unid1; ?>' required>

                                <label for='quantidade_prod1'>Quantidade</label>
                                <input type='number' step='0.01' id='quantidade_prod1' name='quantidade_prod1'
                                    value='<?php echo $quantidade_prod1; ?>' required>

                                <label for='valor_unitario1'>Valor Unitário</label>
                                <input type='number' step='0.01' id='valor_unitario1' name='valor_unitario1'
                                    value='<?php echo $valor_unitario1; ?>' required>

                                <label for='valor_total_prod1'>Valor Total</label>
                                <input type='number' step='0.01' id='valor_total_prod1' name='valor_total_prod1'
                                    value='<?php echo $valor_total_prod1; ?>' required>

                                <h2> Produto 2 </h2>
                                <label for='nome_produto2'>Nome do Produto</label>
                                <input type='text' id='nome_produto2' name='nome_produto2'
                                    value='<?php echo $nome_produto2; ?>'>

                                <label for='ncm_sh2'>NCM/SH</label>
                                <input type='text' id='ncm_sh2' name='ncm_sh2' value='<?php echo $ncm_sh2; ?>'>

                                <label for='cst2'>CST</label>
                                <input type='text' id='cst2' name='cst2' value='<?php echo $cst2; ?>'>

                                <label for='cfop2'>CFOP</label>
                                <input type='text' id='cfop2' name='cfop2' value='<?php echo $cfop2; ?>'>

                                <label for='unid2'>Unidade</label>
                                <input type='text' id='unid2' name='unid2' value='<?php echo $unid2; ?>'>

                                <label for='quantidade_prod2'>Quantidade</label>
                                <input type='number' step='0.01' id='quantidade_prod2' name='quantidade_prod2'
                                    value='<?php echo $quantidade_prod2; ?>'>

                                <label for='valor_unitario2'>Valor Unitário</label>
                                <input type='number' step='0.01' id='valor_unitario2' name='valor_unitario2'
                                    value='<?php echo $valor_unitario2; ?>'>

                                <label for='valor_total_prod2'>Valor Total</label>
                                <input type='number' step='0.01' id='valor_total_prod2' name='valor_total_prod2'
                                    value='<?php echo $valor_total_prod2; ?>'>


                                <h2> Produto 3 </h2>
                                <label for='nome_produto3'>Nome do Produto</label>
                                <input type='text' id='nome_produto3' name='nome_produto3'
                                    value='<?php echo $nome_produto3; ?>'>

                                <label for='ncm_sh3'>NCM/SH</label>
                                <input type='text' id='ncm_sh3' name='ncm_sh3' value='<?php echo $ncm_sh3; ?>'>

                                <label for='cst3'>CST</label>
                                <input type='text' id='cst3' name='cst3' value='<?php echo $cst3; ?>'>

                                <label for='cfop3'>CFOP</label>
                                <input type='text' id='cfop3' name='cfop3' value='<?php echo $cfop3; ?>'>

                                <label for='unid3'>Unidade</label>
                                <input type='text' id='unid3' name='unid3' value='<?php echo $unid3; ?>'>

                                <label for='quantidade_prod3'>Quantidade</label>
                                <input type='number' step='0.01' id='quantidade_prod3' name='quantidade_prod3'
                                    value='<?php echo $quantidade_prod3; ?>'>

                                <label for='valor_unitario3'>Valor Unitário</label>
                                <input type='number' step='0.01' id='valor_unitario3' name='valor_unitario3'
                                    value='<?php echo $valor_unitario3; ?>'>

                                <label for='valor_total_prod3'>Valor Total</label>
                                <input type='number' step='0.01' id='valor_total_prod3' name='valor_total_prod3'
                                    value='<?php echo $valor_total_prod3; ?>'>


                                <h2> Produto 4 </h2>
                                <label for='nome_produto4'>Nome do Produto</label>
                                <input type='text' id='nome_produto4' name='nome_produto4'
                                    value='<?php echo $nome_produto4; ?>'>

                                <label for='ncm_sh4'>NCM/SH</label>
                                <input type='text' id='ncm_sh4' name='ncm_sh4' value='<?php echo $ncm_sh4; ?>'>

                                <label for='cst4'>CST</label>
                                <input type='text' id='cst4' name='cst4' value='<?php echo $cst4; ?>'>

                                <label for='cfop4'>CFOP</label>
                                <input type='text' id='cfop4' name='cfop4' value='<?php echo $cfop4; ?>'>

                                <label for='unid4'>Unidade</label>
                                <input type='text' id='unid4' name='unid4' value='<?php echo $unid4; ?>'>

                                <label for='quantidade_prod4'>Quantidade</label>
                                <input type='number' step='0.01' id='quantidade_prod4' name='quantidade_prod4' value='<?php echo $quantidade_prod4; ?>'>

                                <label for='valor_unitario4'>Valor Unitário</label>
                                <input type='number' step='0.01' id='valor_unitario4' name='valor_unitario4' value='<?php echo $valor_unitario4; ?>'>

                                <label for='valor_total_prod4'>Valor Total</label>
                                <input type='number' step='0.01' id='valor_total_prod4' name='valor_total_prod4' value='<?php echo $valor_total_prod4; ?>'>
                            </div>

                            <!-- Cálculo do ISSQN Section -->
                            <div class='section'>
                                <h2>Cálculo do ISSQN</h2>
                                <label for='inscricao_municipal'>Inscrição Municipal</label>
                                <input type='text' id='inscricao_municipal' name='inscricao_municipal' value='<?php echo $inscricao_municipal; ?>' required>

                                <label for='valor_total_servicos'>Valor Total dos Serviços</label>
                                <input type='number' step='0.01' id='valor_total_servicos' name='valor_total_servicos' value='<?php echo $valor_total_servicos; ?>' required>

                                <label for='base_calculo_issqn'>Base de Cálculo do ISSQN (%)</label>
                                <input type='number' step='0.01' id='base_calculo_issqn' name='base_calculo_issqn' value='<?php echo $base_calculo_issqn; ?>' required>
                            </div>
                            <div class='section'>
                                <h2>Total</h2>
                                <label for='inscricao_municipal'>Valor Total dos Produtos</label>
                                <input type="number" id='total_produtos2' name='total_produtos' value='<?php echo $total_produtos; ?>'>

                                <label for='valor_total_servicos'>Valor Total da Nota</label>
                                <input type="number" id='valor_total_nota2' name='valor_total_nota' value='<?php echo $valor_total_nota; ?>'>
                                <input type="hidden"  name='id' value='<?php echo $id; ?>'>

                            </div>


                            <div class='button-group'>
                                <button type='submit' id='enviar'>Enviar</button>
                            </div>


                        </form>

                    </div>
                </div>

            </div>

        </div>
        </div>
    </main>

    <script src='js/sidebar.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe'
        crossorigin='anonymous'></script>
</body>

</html>