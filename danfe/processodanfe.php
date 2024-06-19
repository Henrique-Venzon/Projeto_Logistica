<?php
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "danfe";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    $cod_prod = $_POST['cod_prod'];
    $descricao_prod = $_POST['descricao_prod'];
    $ncm_sh = $_POST['ncm_sh'];
    $cst = $_POST['cst'];
    $cfop = $_POST['cfop'];
    $unid = $_POST['unid'];
    $quantidade_prod = $_POST['quantidade_prod'];
    $valor_unitario = $_POST['valor_unitario'];
    $valor_total_prod = $_POST['valor_total_prod'];
    $base_calculo_icms_prod = $_POST['base_calculo_icms_prod'];
    $valor_icms_prod = $_POST['valor_icms_prod'];
    $valor_ipi_prod = $_POST['valor_ipi_prod'];
    $icms = $_POST['icms'];
    $ipi = $_POST['ipi'];
    $inscricao_municipal = $_POST['inscricao_municipal'];
    $valor_total_servicos = $_POST['valor_total_servicos'];
    $base_calculo_issqn = $_POST['base_calculo_issqn'];

    $sql = "INSERT INTO info (
        numero, serie, entrada_saida, chave_acesso, informacao_interna, nome_razao_social, sede, telefone, cep,
        protocolo_autorizacao, cnpj, inscricao_estadual_subs_tributaria, natureza_operacao, inscricao_estadual,
        nome_razao_social_remetente, cnpj_cpf_remetente, cep_remetente, telefone_remetente, inscricao_estadual_remetente,
        data_emissao, data_entrada_saida, hora_saida, fatura_duplicata, forma_pagamento, base_calculo_icms, valor_icms,
        base_calculo_icms_st, valor_icms_substituicao, total_produtos, valor_frete, valor_seguro, desconto, outras_despesas,
        valor_ipi, valor_total_nota, nome_razao_social_transportador, frete_por_conta, codigo_antt, placa_veiculo,
        cnpj_cpf_transportador, inscricao_estadual_transportador, quantidade, especie, marca, numeracao, peso_bruto,
        peso_liquido, cod_prod, descricao_prod, ncm_sh, cst, cfop, unid, quantidade_prod, valor_unitario, valor_total_prod,
        base_calculo_icms_prod, valor_icms_prod, valor_ipi_prod, icms, ipi, inscricao_municipal, valor_total_servicos, base_calculo_issqn
    ) VALUES (
        '$numero', '$serie', '$entrada_saida', '$chave_acesso', '$informacao_interna', '$nome_razao_social', '$sede', '$telefone', '$cep',
        '$protocolo_autorizacao', '$cnpj', '$inscricao_estadual_subs_tributaria', '$natureza_operacao', '$inscricao_estadual',
        '$nome_razao_social_remetente', '$cnpj_cpf_remetente', '$cep_remetente', '$telefone_remetente', '$inscricao_estadual_remetente',
        '$data_emissao', '$data_entrada_saida', '$hora_saida', '$fatura_duplicata', '$forma_pagamento', '$base_calculo_icms', '$valor_icms',
        '$base_calculo_icms_st', '$valor_icms_substituicao', '$total_produtos', '$valor_frete', '$valor_seguro', '$desconto', '$outras_despesas',
        '$valor_ipi', '$valor_total_nota', '$nome_razao_social_transportador', '$frete_por_conta', '$codigo_antt', '$placa_veiculo',
        '$cnpj_cpf_transportador', '$inscricao_estadual_transportador', '$quantidade', '$especie', '$marca', '$numeracao', '$peso_bruto',
        '$peso_liquido', '$cod_prod', '$descricao_prod', '$ncm_sh', '$cst', '$cfop', '$unid', '$quantidade_prod', '$valor_unitario', '$valor_total_prod',
        '$base_calculo_icms_prod', '$valor_icms_prod', '$valor_ipi_prod', '$icms', '$ipi', '$inscricao_municipal', '$valor_total_servicos', '$base_calculo_issqn'
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso!";
        // Redirecionar de volta para o formulário
        header("Location: gerarpdf.php");
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
