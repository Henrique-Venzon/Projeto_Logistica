document.getElementById("autoDanfe").addEventListener("click", function () {
  document.getElementById("danfeForm").reset();
  document.getElementById("numero").value = "123456";
  document.getElementById("serie").value = "1";
  document.getElementById("entrada_saida").value = "Saída";
  document.getElementById("chave_acesso").value =
    "12345678901234567890123456789012345678901234";
  document.getElementById("informacao_interna").value =
    "Informação interna XYZ";
  document.getElementById("nome_razao_social").value = "Empresa XYZ";
  document.getElementById("sede").value = "Rua ABC, 123";
  document.getElementById("telefone").value = "(11) 1234-5678";
  document.getElementById("cep").value = "12345-678";
  document.getElementById("protocolo_autorizacao").value = "123456";
  document.getElementById("cnpj").value = "12.345.678/0001-12";
  document.getElementById("inscricao_estadual_subs_tributaria").value =
    "1234567890";
  document.getElementById("natureza_operacao").value = "Venda";
  document.getElementById("inscricao_estadual").value = "1234567890";
  document.getElementById("nome_razao_social_remetente").value = "Empresa XYZ";
  document.getElementById("cnpj_cpf_remetente").value = "12.345.678/0001-12";
  document.getElementById("cep_remetente").value = "12345-678";
  document.getElementById("telefone_remetente").value = "(11) 1234-5678";
  document.getElementById("inscricao_estadual_remetente").value = "1234567890";
  document.getElementById("data_emissao").value = "2023-06-18";
  document.getElementById("data_entrada_saida").value = "2023-06-18";
  document.getElementById("hora_saida").value = "12:00";
  document.getElementById("fatura_duplicata").value = "Fatura 123";
  document.getElementById("forma_pagamento").value = "Boleto";
  document.getElementById("base_calculo_icms").value = "1000.00";
  document.getElementById("valor_icms").value = "180.00";
  document.getElementById("base_calculo_icms_st").value = "1200.00";
  document.getElementById("valor_icms_substituicao").value = "216.00";
  document.getElementById("total_produtos").value = "1000.00";
  document.getElementById("valor_frete").value = "50.00";
  document.getElementById("valor_seguro").value = "20.00";
  document.getElementById("desconto").value = "30.00";
  document.getElementById("outras_despesas").value = "15.00";
  document.getElementById("valor_ipi").value = "50.00";
  document.getElementById("valor_total_nota").value = "1230.00";
  document.getElementById("nome_razao_social_transportador").value =
    "Transportadora ABC";
  document.getElementById("frete_por_conta").value = "Destinatário";
  document.getElementById("codigo_antt").value = "1234567";
  document.getElementById("placa_veiculo").value = "ABC-1234";
  document.getElementById("cnpj_cpf_transportador").value =
    "12.345.678/0001-12";
  document.getElementById("inscricao_estadual_transportador").value =
    "1234567890";
  document.getElementById("quantidade").value = "10";
  document.getElementById("especie").value = "Caixa";
  document.getElementById("marca").value = "Marca XYZ";
  document.getElementById("numeracao").value = "123456";
  document.getElementById("peso_bruto").value = "100.00";
  document.getElementById("peso_liquido").value = "95.00";
  document.getElementById("cod_prod").value = "001";
  document.getElementById("descricao_prod").value = "Produto A";
  document.getElementById("ncm_sh").value = "1234.56.78";
  document.getElementById("cst").value = "101";
  document.getElementById("cfop").value = "5102";
  document.getElementById("unid").value = "UN";
  document.getElementById("quantidade_prod").value = "10.00";
  document.getElementById("valor_unitario").value = "100.00";
  document.getElementById("valor_total_prod").value = "1000.00";
  document.getElementById("base_calculo_icms_prod").value = "1000.00";
  document.getElementById("valor_icms_prod").value = "180.00";
  document.getElementById("valor_ipi_prod").value = "50.00";
  document.getElementById("icms").value = "18.00";
  document.getElementById("ipi").value = "5.00";
  document.getElementById("inscricao_municipal").value = "1234567890";
  document.getElementById("valor_total_servicos").value = "200.00";
  document.getElementById("base_calculo_issqn").value = "200.00";
});

document.getElementById("clearForm").addEventListener("click", function () {
  document.getElementById("danfeForm").reset();
});
document.getElementById("preset2").addEventListener("click", function () {
  // Função para gerar uma string aleatória de letras e números
  function getRandomString(length) {
    let result = "";
    const characters =
      "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    const charactersLength = characters.length;
    for (let i = 0; i < length; i++) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
  }

  // Função para gerar uma string aleatória de números
  function getRandomNumberString(length) {
    let result = "";
    const characters = "0123456789";
    const charactersLength = characters.length;
    for (let i = 0; i < length; i++) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
  }

  // Função para gerar um número aleatório
  function getRandomNumber(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }

  // Função para gerar um número decimal aleatório
  function getRandomDecimal(min, max, decimals) {
    return (Math.random() * (max - min) + min).toFixed(decimals);
  }

  // Função para gerar uma data aleatória
  function getRandomDate(start, end) {
    const date = new Date(
      start.getTime() + Math.random() * (end.getTime() - start.getTime())
    );
    return date.toISOString().slice(0, 10);
  }

  // Função para gerar um horário aleatório
  function getRandomTime() {
    const date = new Date();
    const hours = getRandomNumber(0, 23).toString().padStart(2, "0");
    const minutes = getRandomNumber(0, 59).toString().padStart(2, "0");
    const seconds = getRandomNumber(0, 59).toString().padStart(2, "0");
    return `${hours}:${minutes}:${seconds}`;
  }

  // Preencher os campos com valores aleatórios
  document.getElementById("numero").value = getRandomNumber(1000, 9999);
  document.getElementById("serie").value = getRandomNumberString(3);
  document.getElementById("entrada_saida").value = getRandomDate(
    new Date(2020, 0, 1),
    new Date()
  );
  document.getElementById("chave_acesso").value = getRandomNumber(1000, 9999);
  document.getElementById("cep").value = getRandomNumberString(8);
  document.getElementById("protocolo_autorizacao").value = getRandomNumber(
    1000,
    9999
  );

  document.getElementById("cnpj").value = getRandomNumberString(14);

  document.getElementById("cnpj_cpf_remetente").value =
    getRandomNumberString(11);
  document.getElementById("cep_remetente").value = getRandomNumberString(8);
  document.getElementById("inscricao_estadual_remetente").value =
    getRandomString(12);
  document.getElementById("data_emissao").value = getRandomDate(
    new Date(2020, 0, 1),
    new Date()
  );
  document.getElementById("data_entrada_saida").value = getRandomDate(
    new Date(2020, 0, 1),
    new Date()
  );
  document.getElementById("base_calculo_icms").value = getRandomDecimal(
    100,
    1000,
    2
  );
  document.getElementById("valor_icms").value = getRandomDecimal(10, 100, 2);
  document.getElementById("base_calculo_icms_st").value = getRandomDecimal(
    100,
    1000,
    2
  );
  document.getElementById("valor_icms_substituicao").value = getRandomDecimal(
    10,
    100,
    2
  );
  document.getElementById("total_produtos").value = getRandomDecimal(
    100,
    1000,
    2
  );
  document.getElementById("valor_frete").value = getRandomDecimal(10, 100, 2);
  document.getElementById("valor_seguro").value = getRandomDecimal(10, 100, 2);
  document.getElementById("desconto").value = getRandomDecimal(10, 100, 2);
  document.getElementById("valor_ipi").value = getRandomDecimal(10, 100, 2);
  document.getElementById("valor_total_nota").value = getRandomDecimal(
    1000,
    5000,
    2
  );
  document.getElementById("codigo_antt").value = getRandomString(10);
  document.getElementById("placa_veiculo").value =
    getRandomString(3).toUpperCase() + "-" + getRandomNumberString(4);
  document.getElementById("cnpj_cpf_transportador").value =
    getRandomNumberString(14);
  document.getElementById("inscricao_estadual_transportador").value =
    getRandomString(12);
  document.getElementById("quantidade").value = getRandomNumber(1, 100);
  document.getElementById("numeracao").value = getRandomNumber(1000, 9999);
  document.getElementById("peso_bruto").value = getRandomDecimal(1, 100, 2);
  document.getElementById("peso_liquido").value = getRandomDecimal(1, 100, 2);
  document.getElementById("cod_prod").value = getRandomString(10);
  document.getElementById("ncm_sh").value = getRandomNumberString(8);
  document.getElementById("cst").value = getRandomNumberString(3);
  document.getElementById("cfop").value = getRandomNumberString(4);
  document.getElementById("unid").value = getRandomString(3);
  document.getElementById("quantidade_prod").value = getRandomDecimal(
    1,
    100,
    2
  );
  document.getElementById("valor_unitario").value = getRandomDecimal(
    1,
    1000,
    2
  );
  document.getElementById("valor_total_prod").value = getRandomDecimal(
    1,
    10000,
    2
  );
  document.getElementById("base_calculo_icms_prod").value = getRandomDecimal(
    1,
    1000,
    2
  );
  document.getElementById("valor_icms_prod").value = getRandomDecimal(
    1,
    100,
    2
  );
  document.getElementById("valor_ipi_prod").value = getRandomDecimal(1, 100, 2);
  document.getElementById("icms").value = getRandomDecimal(1, 100, 2);
  document.getElementById("ipi").value = getRandomDecimal(1, 100, 2);
  document.getElementById("inscricao_municipal").value =
    getRandomNumberString(10);
  document.getElementById("valor_total_servicos").value = getRandomDecimal(
    1,
    1000,
    2
  );
  document.getElementById("base_calculo_issqn").value = getRandomDecimal(
    1,
    1000,
    2
  );
});
