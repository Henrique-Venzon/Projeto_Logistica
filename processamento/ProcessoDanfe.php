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
$base_calculo_icms_st = $_POST['base_calculo_icms_st'];
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
// Consulta para obter o último id_atividade
$sql = "SELECT MAX(id) AS last_id FROM carga WHERE turma_id='$id_turma' AND situacao='NotaFiscal'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_atividade = $row['last_id'];
} else {
    echo "Nenhum registro encontrado na tabela carga.";
    $id_atividade = null; // Definir $id_atividade como null se nenhum registro for encontrado
}

// Inserindo os dados na tabela nota_fiscal
$sql_a = "INSERT INTO nota_fiscal (
    numero, serie, entrada_saida, chave_acesso, informacao_interna, nome_razao_social, sede, telefone, cep, protocolo_autorizacao, cnpj, inscricao_estadual_subs_tributaria, natureza_operacao, inscricao_estadual, nome_razao_social_remetente, cnpj_cpf_remetente, cep_remetente, telefone_remetente, inscricao_estadual_remetente, data_emissao, data_entrada_saida, hora_saida, fatura_duplicata, forma_pagamento, base_calculo_icms, valor_icms, base_calculo_icms_st, valor_icms_substituicao, total_produtos, valor_frete, valor_seguro, desconto, outras_despesas, valor_ipi, valor_total_nota, nome_razao_social_transportador, frete_por_conta, codigo_antt, placa_veiculo, cnpj_cpf_transportador, inscricao_estadual_transportador, quantidade, especie, marca, numeracao, peso_bruto, peso_liquido, nome_produto1, ncm_sh1, cst1, cfop1, unid1, quantidade_prod1, valor_unitario1, valor_total_prod1, nome_produto2, ncm_sh2, cst2, cfop2, unid2, quantidade_prod2, valor_unitario2, valor_total_prod2, nome_produto3, ncm_sh3, cst3, cfop3, unid3, quantidade_prod3, valor_unitario3, valor_total_prod3, nome_produto4, ncm_sh4, cst4, cfop4, unid4, quantidade_prod4, valor_unitario4, valor_total_prod4, id_turma, id_atividade,inscricao_municipal,valor_total_servicos,base_calculo_issqn)
    VALUES (
        '$numero', '$serie', '$entrada_saida', '$chave_acesso', '$informacao_interna', '$nome_razao_social', '$sede', '$telefone', '$cep', '$protocolo_autorizacao', '$cnpj', '$inscricao_estadual_subs_tributaria', '$natureza_operacao', '$inscricao_estadual', '$nome_razao_social_remetente', '$cnpj_cpf_remetente', '$cep_remetente', '$telefone_remetente', '$inscricao_estadual_remetente', '$data_emissao', '$data_entrada_saida', '$hora_saida', '$fatura_duplicata', '$forma_pagamento', '$base_calculo_icms', '$valor_icms', '$base_calculo_icms_st', '$valor_icms_substituicao', '$total_produtos', '$valor_frete', '$valor_seguro', '$desconto', '$outras_despesas', '$valor_ipi', '$valor_total_nota', '$nome_razao_social_transportador', '$frete_por_conta', '$codigo_antt', '$placa_veiculo', '$cnpj_cpf_transportador', '$inscricao_estadual_transportador', '$quantidade', '$especie', '$marca', '$numeracao', '$peso_bruto', '$peso_liquido', '$nome_produto1', '$ncm_sh1', '$cst1', '$cfop1', '$unid1', '$quantidade_prod1', '$valor_unitario1', '$valor_total_prod1', '$nome_produto2', '$ncm_sh2', '$cst2', '$cfop2', '$unid2', '$quantidade_prod2', '$valor_unitario2', '$valor_total_prod2', '$nome_produto3', '$ncm_sh3', '$cst3', '$cfop3', '$unid3', '$quantidade_prod3', '$valor_unitario3', '$valor_total_prod3', '$nome_produto4', '$ncm_sh4', '$cst4', '$cfop4', '$unid4', '$quantidade_prod4', '$valor_unitario4', '$valor_total_prod4', '$id_turma', '$id_atividade', '$inscricao_municipal', '$valor_total_servicos', '$base_calculo_issqn')";

if ($conn->query($sql_a) === TRUE) {
    if (!empty($id_atividade)) {
        $sql_b = "UPDATE carga SET situacao='enviado' WHERE id=$id_atividade";
        echo "Consulta SQL para atualização: " . $sql_b; // Depuração
        if ($conn->query($sql_b) === TRUE) {
            header('location:../containerP.php', true, 301);
            exit();
        } else {
            echo "Erro ao atualizar o registro: " . $conn->error;
        }
    } else {
        echo "Erro: id_atividade não está definido ou está vazio.";
    }
} else {
    echo "Erro: " . $sql_a . "<br>" . $conn->error;
}


