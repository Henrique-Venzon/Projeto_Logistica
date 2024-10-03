<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $notafiscal = $_GET['npedido'];
}
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
            integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="shortcut icon" href="img/amem.svg">
    <meta charset="utf-8">
    <title><?php $tituloPag = 'Danfe';
        echo "$tituloPag"; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="css/imprimirDanfe.css">

</head>

<body>
<div class="centro">
    <?php
    include_once('include/conexao.php');

    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    if (isset($notafiscal)) {
        $sql = "SELECT *  FROM nota_fiscal_expedicao WHERE id = $notafiscal";
        $resultado = $conexao->query($sql);

        echo '<table class="table1">';
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

        echo '</table>';
        echo '<div class="divisao">';
        echo '<table class="table2">';
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
        echo '<div class="Imagem-nome"> ';
        echo '<h1>LogConnect</h1>';
        echo '<img src="img/amem.png" alt="logo">';
        echo '</div>';
        echo '</div>';
    }

    // Fecha a conexão
    $conexao->close();
    ?>
</div>

</body>
<script>
    setTimeout(function imp() {
        window.print();

    }, 1000);
</script>
</html>
