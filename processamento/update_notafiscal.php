<?php
session_start();
include_once('../include/conexao.php');

// Verificando a conexão
if ($conn->connect_error) {
    die('Conexão falhou: ' . $conn->connect_error);
}

// Obtendo os dados do formulário
$numero = $_POST['numero'];
$serie = $_POST['serie'];
$entrada_saida = $_POST['entrada_saida'];
$chave_acesso = $_POST['chave_acesso'];
$informacao_interna = $_POST['informacao_interna'];
$nome_razao_social = $_POST['nome_razao_social'];
$sede = $_POST['sede'];
$telefone = $_POST['telefone'];
$cep = $_POST['cep'];
$protocolo_autorizacao = $_POST['protocolo_autorizacao'];
$cnpj = $_POST['cnpj'];
$inscricao_estadual_subs_tributaria = $_POST['inscricao_estadual_subs_tributaria'];
$natureza_operacao = $_POST['natureza_operacao'];
$inscricao_estadual = $_POST['inscricao_estadual'];
$nome_razao_social_remetente = $_POST['nome_razao_social_remetente'];
$cnpj_cpf_remetente = $_POST['cnpj_cpf_remetente'];
$cep_remetente = $_POST['cep_remetente'];
$telefone_remetente = $_POST['telefone_remetente'];
$inscricao_estadual_remetente = $_POST['inscricao_estadual_remetente'];
$data_emissao = $_POST['data_emissao'];
$data_entrada_saida = $_POST['data_entrada_saida'];
$hora_saida = $_POST['hora_saida'];
$fatura_duplicata = $_POST['fatura_duplicata'];
$forma_pagamento = $_POST['forma_pagamento'];
$base_calculo_icms = $_POST['base_calculo_icms'];
$valor_icms = $_POST['valor_icms'];
$base_calculo_icms_st = $_POST['base_calculo_icms_st']? $_POST['base_calculo_icms_st'] : 0;
$valor_icms_substituicao = $_POST['valor_icms_substituicao'];
$total_produtos = $_POST['total_produtos'];
$valor_frete = $_POST['valor_frete'];
$valor_seguro = $_POST['valor_seguro'];
$desconto = $_POST['desconto'];
$outras_despesas = $_POST['outras_despesas'];
$valor_ipi = $_POST['valor_ipi'];
$valor_total_nota = $_POST['valor_total_nota'];
$nome_razao_social_transportador = $_POST['nome_razao_social_transportador'];
$frete_por_conta = $_POST['frete_por_conta'];
$codigo_antt = $_POST['codigo_antt'];
$placa_veiculo = $_POST['placa_veiculo'];
$cnpj_cpf_transportador = $_POST['cnpj_cpf_transportador'];
$inscricao_estadual_transportador = $_POST['inscricao_estadual_transportador'];
$quantidade = $_POST['quantidade'];
$especie = $_POST['especie'];
$marca = $_POST['marca'];
$numeracao = $_POST['numeracao'];
$peso_bruto = $_POST['peso_bruto'];
$peso_liquido = $_POST['peso_liquido'];
$nome_produto1 = $_POST['nome_produto1'];
$ncm_sh1 = $_POST['ncm_sh1'];
$cst1 = $_POST['cst1'];
$cfop1 = $_POST['cfop1'];
$unid1 = $_POST['unid1'];
$quantidade_prod1 = $_POST['quantidade_prod1'];
$valor_unitario1 = $_POST['valor_unitario1'];
$valor_total_prod1 = $_POST['valor_total_prod1'];
$id_turma=$_SESSION['turma'];

// Campos opcionais com valores padrão
$nome_produto2 = isset($_POST['nome_produto2']) ? $_POST['nome_produto2'] : '';
$ncm_sh2 = isset($_POST['ncm_sh2']) ? $_POST['ncm_sh2'] : '';
$cst2 = isset($_POST['cst2']) ? $_POST['cst2'] : '';
$cfop2 = isset($_POST['cfop2']) ? $_POST['cfop2'] : '';
$unid2 = isset($_POST['unid2']) ? $_POST['unid2'] : '';
$quantidade_prod2 = isset($_POST['quantidade_prod2']) ? $_POST['quantidade_prod2'] : 0;
$valor_unitario2 = isset($_POST['valor_unitario2']) ? $_POST['valor_unitario2'] : 0;
$valor_total_prod2 = isset($_POST['valor_total_prod2']) ? $_POST['valor_total_prod2'] : 0;
$nome_produto3 = isset($_POST['nome_produto3']) ? $_POST['nome_produto3'] : '';
$ncm_sh3 = isset($_POST['ncm_sh3']) ? $_POST['ncm_sh3'] : '';
$cst3 = isset($_POST['cst3']) ? $_POST['cst3'] : '';
$cfop3 = isset($_POST['cfop3']) ? $_POST['cfop3'] : '';
$unid3 = isset($_POST['unid3']) ? $_POST['unid3'] : '';
$quantidade_prod3 = isset($_POST['quantidade_prod3']) ? $_POST['quantidade_prod3'] : 0;
$valor_unitario3 = isset($_POST['valor_unitario3']) ? $_POST['valor_unitario3'] : 0;
$valor_total_prod3 = isset($_POST['valor_total_prod3']) ? $_POST['valor_total_prod3'] : 0;
$nome_produto4 = isset($_POST['nome_produto4']) ? $_POST['nome_produto4'] : '';
$ncm_sh4 = isset($_POST['ncm_sh4']) ? $_POST['ncm_sh4'] : '';
$cst4 = isset($_POST['cst4']) ? $_POST['cst4'] : '';
$cfop4 = isset($_POST['cfop4']) ? $_POST['cfop4'] : '';
$unid4 = isset($_POST['unid4']) ? $_POST['unid4'] : '';
$quantidade_prod4 = isset($_POST['quantidade_prod4']) ? $_POST['quantidade_prod4'] : 0;
$valor_unitario4 = isset($_POST['valor_unitario4']) ? $_POST['valor_unitario4'] : 0;
$valor_total_prod4 = isset($_POST['valor_total_prod4']) ? $_POST['valor_total_prod4'] : 0;
$inscricao_municipal = isset($_POST['inscricao_municipal']) ? $_POST['inscricao_municipal'] : 0;
$valor_total_servicos = isset($_POST['valor_total_servicos']) ? $_POST['valor_total_servicos'] : 0;
$base_calculo_issqn = isset($_POST['base_calculo_issqn']) ? $_POST['base_calculo_issqn'] : 0;

$id_da_nota = $_POST['npedido']; 

$sql = "UPDATE nota_fiscal SET 
    numero = '$numero', 
    serie = '$serie', 
    entrada_saida = '$entrada_saida', 
    chave_acesso = '$chave_acesso', 
    informacao_interna = '$informacao_interna', 
    nome_razao_social = '$nome_razao_social', 
    sede = '$sede', 
    telefone = '$telefone', 
    cep = '$cep', 
    protocolo_autorizacao = '$protocolo_autorizacao', 
    cnpj = '$cnpj', 
    inscricao_estadual_subs_tributaria = '$inscricao_estadual_subs_tributaria', 
    natureza_operacao = '$natureza_operacao', 
    inscricao_estadual = '$inscricao_estadual', 
    nome_razao_social_remetente = '$nome_razao_social_remetente', 
    cnpj_cpf_remetente = '$cnpj_cpf_remetente', 
    cep_remetente = '$cep_remetente', 
    telefone_remetente = '$telefone_remetente', 
    inscricao_estadual_remetente = '$inscricao_estadual_remetente', 
    data_emissao = '$data_emissao', 
    data_entrada_saida = '$data_entrada_saida', 
    hora_saida = '$hora_saida', 
    fatura_duplicata = '$fatura_duplicata', 
    forma_pagamento = '$forma_pagamento', 
    base_calculo_icms = '$base_calculo_icms', 
    valor_icms = '$valor_icms', 
    base_calculo_icms_st = '$base_calculo_icms_st', 
    valor_icms_substituicao = '$valor_icms_substituicao', 
    total_produtos = '$total_produtos', 
    valor_frete = '$valor_frete', 
    valor_seguro = '$valor_seguro', 
    desconto = '$desconto', 
    outras_despesas = '$outras_despesas', 
    valor_ipi = '$valor_ipi', 
    valor_total_nota = '$valor_total_nota', 
    nome_razao_social_transportador = '$nome_razao_social_transportador', 
    frete_por_conta = '$frete_por_conta', 
    codigo_antt = '$codigo_antt', 
    placa_veiculo = '$placa_veiculo', 
    cnpj_cpf_transportador = '$cnpj_cpf_transportador', 
    inscricao_estadual_transportador = '$inscricao_estadual_transportador', 
    quantidade = '$quantidade', 
    especie = '$especie', 
    marca = '$marca', 
    numeracao = '$numeracao', 
    peso_bruto = '$peso_bruto', 
    peso_liquido = '$peso_liquido', 
    nome_produto1 = '$nome_produto1', 
    ncm_sh1 = '$ncm_sh1', 
    cst1 = '$cst1', 
    cfop1 = '$cfop1', 
    unid1 = '$unid1', 
    quantidade_prod1 = '$quantidade_prod1', 
    valor_unitario1 = '$valor_unitario1', 
    valor_total_prod1 = '$valor_total_prod1', 
    nome_produto2 = '$nome_produto2', 
    ncm_sh2 = '$ncm_sh2', 
    cst2 = '$cst2', 
    cfop2 = '$cfop2', 
    unid2 = '$unid2', 
    quantidade_prod2 = '$quantidade_prod2', 
    valor_unitario2 = '$valor_unitario2', 
    valor_total_prod2 = '$valor_total_prod2', 
    nome_produto3 = '$nome_produto3', 
    ncm_sh3 = '$ncm_sh3', 
    cst3 = '$cst3', 
    cfop3 = '$cfop3', 
    unid3 = '$unid3', 
    quantidade_prod3 = '$quantidade_prod3', 
    valor_unitario3 = '$valor_unitario3', 
    valor_total_prod3 = '$valor_total_prod3', 
    nome_produto4 = '$nome_produto4', 
    ncm_sh4 = '$ncm_sh4', 
    cst4 = '$cst4', 
    cfop4 = '$cfop4', 
    unid4 = '$unid4', 
    quantidade_prod4 = '$quantidade_prod4', 
    valor_unitario4 = '$valor_unitario4', 
    valor_total_prod4 = '$valor_total_prod4',
    inscricao_municipal = '$inscricao_municipal',
    valor_total_servicos = '$valor_total_servicos',
    base_calculo_issqn = '$base_calculo_issqn',
    situacao = 'Enviado'
WHERE id = $id_da_nota";

if ($conn->query($sql) === TRUE) {
    header('location:../verPedido.php',true,301);
    exit;
}else{
    echo 'teste';
}