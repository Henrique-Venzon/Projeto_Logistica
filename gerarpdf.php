<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="danfe/estilo.css">
    <title>Formulário DANFE</title>



</head>

<body>

    <div id="container-formulario" class="container">
        <h1>Nota Fiscal</h1>
        <button id="autoDanfe">Preset1</button>
        <button id="autoDanfe1">Preset2</button>
        <button id="autoDanfe2">Preset3</button>
        <button d="autoDanfe3">Preset4</button>
        <button id="autoDanfe4">Preset5</button>
        <button id="autoDanfe5">Preset6</button>
        <button id="preset2">Preset 2 random</button>
        <button id="preset3">Preset 3 ramdom</button>
        <form action="processodanfe.php" method="post" id="danfeForm">

            <div class="section">
                <h2>DANFE</h2>
                <label for="numero">Número</label>
                <input type="text" id="numero" name="numero" value="<?php echo isset($numero) ? $numero : ''; ?>"
                    required>

                <label for="serie">Série</label>
                <input type="text" id="serie" name="serie" required>

                <label for="entrada_saida">Entrada/Saída</label>
                <input type="date" id="entrada_saida" name="entrada_saida" required>

                <label for="chave_acesso">Chave de Acesso</label>
                <input type="text" id="chave_acesso" name="chave_acesso" required>

                <label for="informacao_interna">Fornecedor</label>
                <input type="text" id="informacao_interna" name="informacao_interna">

                <label for="nome_razao_social">Nome/Razão Social</label>
                <input type="text" id="nome_razao_social" name="nome_razao_social" required>

                <label for="sede">Sede</label>
                <input type="text" id="sede" name="sede" required>

                <label for="telefone">Telefone</label>
                <input type="text" id="telefone" name="telefone" required>

                <label for="cep">CEP</label>
                <input type="text" id="cep" name="cep" required>

                <label for="protocolo_autorizacao">Protocolo de Autorização de Uso</label>
                <input type="text" id="protocolo_autorizacao" name="protocolo_autorizacao" required>

                <label for="cnpj">CNPJ</label>
                <input type="text" id="cnpj" name="cnpj" required>

                <label for="inscricao_estadual_subs_tributaria">Inscrição Estadual Sub. Tributária</label>
                <input type="text" id="inscricao_estadual_subs_tributaria" name="inscricao_estadual_subs_tributaria">

                <label for="natureza_operacao">Natureza da Operação</label>
                <input type="text" id="natureza_operacao" name="natureza_operacao" required>

                <label for="inscricao_estadual">Inscrição Estadual</label>
                <input type="text" id="inscricao_estadual" name="inscricao_estadual">
            </div>

            <!-- Identificação do Remetente/Destinatário Section -->
            <div class="section">
                <h2>Identificação do Remetente/Destinatário</h2>
                <label for="nome_razao_social_remetente">Nome/Razão Social</label>
                <input type="text" id="nome_razao_social_remetente" name="nome_razao_social_remetente" required>

                <label for="cnpj_cpf_remetente">CNPJ/CPF</label>
                <input type="text" id="cnpj_cpf_remetente" name="cnpj_cpf_remetente" required>

                <label for="cep_remetente">CEP</label>
                <input type="text" id="cep_remetente" name="cep_remetente" required>

                <label for="telefone_remetente">Telefone</label>
                <input type="text" id="telefone_remetente" name="telefone_remetente" required>

                <label for="inscricao_estadual_remetente">Inscrição Estadual</label>
                <input type="text" id="inscricao_estadual_remetente" name="inscricao_estadual_remetente">

                <label for="data_emissao">Data de Emissão</label>
                <input type="date" id="data_emissao" name="data_emissao" required>

                <label for="data_entrada_saida">Data de Entrada/Saída</label>
                <input type="date" id="data_entrada_saida" name="data_entrada_saida" required>

                <label for="hora_saida">Hora de Saída</label>
                <input type="time" id="hora_saida" name="hora_saida" required>

                <label for="fatura_duplicata">Fatura/Duplicata</label>
                <input type="text" id="fatura_duplicata" name="fatura_duplicata" required>

                <label for="forma_pagamento">Forma de Pagamento</label>
                <input type="text" id="forma_pagamento" name="forma_pagamento" required>
            </div>

            <!-- Cálculo do Imposto Section -->
            <div class="section">
                <h2>Cálculo do Imposto</h2>
                <label for="base_calculo_icms">Base de Cálculo de ICMS</label>
                <input type="number" step="0.01" id="base_calculo_icms" name="base_calculo_icms" required>

                <label for="valor_icms">Valor do ICMS</label>
                <input type="number" step="0.01" id="valor_icms" name="valor_icms" required>

                <label for="base_calculo_icms_st">Base de Cálculo de ICMS ST</label>
                <input type="number" step="0.01" id="base_calculo_icms_st" name="base_calculo_icms_st">

                <label for="valor_icms_substituicao">Valor do ICMS Substituição</label>
                <input type="number" step="0.01" id="valor_icms_substituicao" name="valor_icms_substituicao">

                <label for="total_produtos">Total dos Produtos</label>
                <input type="number" step="0.01" id="total_produtos" name="total_produtos" required>

                <label for="valor_frete">Valor do Frete</label>
                <input type="number" step="0.01" id="valor_frete" name="valor_frete">

                <label for="valor_seguro">Valor do Seguro</label>
                <input type="number" step="0.01" id="valor_seguro" name="valor_seguro">

                <label for="desconto">Desconto</label>
                <input type="number" step="0.01" id="desconto" name="desconto">

                <label for="outras_despesas">Outras Despesas Acessórias</label>
                <input type="number" step="0.01" id="outras_despesas" name="outras_despesas">

                <label for="valor_ipi">Valor do IPI</label>
                <input type="number" step="0.01" id="valor_ipi" name="valor_ipi">

                <label for="valor_total_nota">Valor Total da Nota sem desconto</label>
                <input type="number" step="0.01" id="valor_total_nota" name="valor_total_nota" required>
            </div>

            <!-- Transportador/Volumes Transportados Section -->
            <div class="section">
                <h2>Transportador/Volumes Transportados</h2>
                <label for="nome_razao_social_transportador">Nome/Razão Social</label>
                <input type="text" id="nome_razao_social_transportador" name="nome_razao_social_transportador">

                <label for="frete_por_conta">Frete por Conta</label>
                <input type="text" id="frete_por_conta" name="frete_por_conta">

                <label for="codigo_antt">Código ANTT</label>
                <input type="text" id="codigo_antt" name="codigo_antt">

                <label for="placa_veiculo">Placa do Veículo</label>
                <input type="text" id="placa_veiculo" name="placa_veiculo">

                <label for="cnpj_cpf_transportador">CNPJ/CPF</label>
                <input type="text" id="cnpj_cpf_transportador" name="cnpj_cpf_transportador">

                <label for="inscricao_estadual_transportador">Inscrição Estadual</label>
                <input type="text" id="inscricao_estadual_transportador" name="inscricao_estadual_transportador">

                <label for="quantidade">Quantidade</label>
                <input type="number" id="quantidade" name="quantidade">

                <label for="especie">Espécie</label>
                <input type="text" id="especie" name="especie">

                <label for="marca">Marca</label>
                <input type="text" id="marca" name="marca">

                <label for="numeracao">Numeração</label>
                <input type="text" id="numeracao" name="numeracao">

                <label for="peso_bruto">Peso Bruto</label>
                <input type="number" step="0.01" id="peso_bruto" name="peso_bruto">

                <label for="peso_liquido">Peso Líquido</label>
                <input type="number" step="0.01" id="peso_liquido" name="peso_liquido">
            </div>

            <!-- Dados do Produto/Serviço Section -->
            <div class="section">
                <h2>Dados do Produto/Serviço</h2>
                <label for="cod_prod">Código do Produto</label>
                <input type="text" id="cod_prod" name="cod_prod" required>

                <label for="descricao_prod">Descrição do Produto/Serviço</label>
                <input type="text" id="descricao_prod" name="descricao_prod" required>

                <label for="ncm_sh">NCM/SH</label>
                <input type="text" id="ncm_sh" name="ncm_sh" required>

                <label for="cst">CST</label>
                <input type="text" id="cst" name="cst" required>

                <label for="cfop">CFOP</label>
                <input type="text" id="cfop" name="cfop" required>

                <label for="unid">Unidade</label>
                <input type="text" id="unid" name="unid" required>

                <label for="quantidade_prod">Quantidade</label>
                <input type="number" step="0.01" id="quantidade_prod" name="quantidade_prod" required>

                <label for="valor_unitario">Valor Unitário</label>
                <input type="number" step="0.01" id="valor_unitario" name="valor_unitario" required>

                <label for="valor_total_prod">Valor Total</label>
                <input type="number" step="0.01" id="valor_total_prod" name="valor_total_prod" required>

                <label for="base_calculo_icms_prod">Base de Cálculo ICMS</label>
                <input type="number" step="0.01" id="base_calculo_icms_prod" name="base_calculo_icms_prod">

                <label for="valor_icms_prod">Valor ICMS</label>
                <input type="number" step="0.01" id="valor_icms_prod" name="valor_icms_prod">

                <label for="valor_ipi_prod">Valor IPI</label>
                <input type="number" step="0.01" id="valor_ipi_prod" name="valor_ipi_prod">

                <label for="icms">ICMS</label>
                <input type="number" step="0.01" id="icms" name="icms">

                <label for="ipi">IPI</label>
                <input type="number" step="0.01" id="ipi" name="ipi">
            </div>

            <!-- Cálculo do ISSQN Section -->
            <div class="section">
                <h2>Cálculo do ISSQN</h2>
                <label for="inscricao_municipal">Inscrição Municipal</label>
                <input type="text" id="inscricao_municipal" name="inscricao_municipal">

                <label for="valor_total_servicos">Valor Total dos Serviços</label>
                <input type="number" step="0.01" id="valor_total_servicos" name="valor_total_servicos">

                <label for="base_calculo_issqn">Base de Cálculo do ISSQN</label>
                <input type="number" step="0.01" id="base_calculo_issqn" name="base_calculo_issqn">
            </div>

                <div class="desconto">
                    <H1>Valor Total</H1>
                    <button onclick="desconto()">Valor total</button>
                    <script>
                      function desconto (){  
                        var totalProdutos = parseFloat(document.getElementById("total_produtos").value);
                      var valorFrete = parseFloat(document.getElementById("valor_frete").value);
                      var valorSeguro = parseFloat(document.getElementById("valor_seguro").value);
                      var desconto = parseFloat(document.getElementById("desconto").value);
                      var outrasDespesas = parseFloat(document.getElementById("outras_despesas").value);
                      var valorIpi = parseFloat(document.getElementById("valor_ipi").value);


                        var a = getElementById("base_calculo_icms");
                        var a = getElementById("valor_icms");   
                        var a = getElementById("base_calculo_icms_st");
                        var a = getElementById("valor_icms_substituicao");
                        var a = getElementById("total_produtos");
                        var a = getElementById("valor_frete");
                        var a = getElementById("valor_seguro");
                        var a = getElementById("outras_despesas");
                        var a = getElementById("valor_ipi");
                        var a = getElementById("valor_ipi");
                        var a = getElementById("valor_ipi");


                      var valorTotalNota = totalProdutos + valorFrete + valorSeguro + outrasDespesas + valorIpi - desconto;
                        console.log(valorTotalNota);
                      }
                        

                    </script>
                        <label>
                </div>
      
                
                
                

            <div class="button-group">
                <button type="submit" id="enviar">Enviar</button>
                <button type="button" id="clearForm">Apagar e Fazer Nova</button>
                <button type="button" id="verDanfe">Ver DANFE</button>
                <button type="button" id="baixar">Baixar PDf</button>

            </div>
        </form>


                    <div class="desconto">
                <H1>Valor Final Total</H1>
                <label>O valor total com desconto é:</label>
                <button id="caldesco" onclick="desconto()" >Valor total</button>
                <label id="deconto"></label>
    </div>
    </div>

    <script src="danfe/autodanfe.js"></script>

</body>

</html>