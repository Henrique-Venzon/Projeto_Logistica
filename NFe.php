<?php
$data = array();

$data['nCdEmpresa'] = '';
$data['sDsSenha'] = '';

$cep_origem = '86300000';
$cep = '86300000';
$peso = '0.100';

$data['sCepOrigem'] = $cep_origem;
$data['sCepDestino'] = $cep;
$data['nVlPeso'] = $peso;

$data['nCdFormato'] = '1';

$data['nVlComprimento'] = '16';
$data['nVlAltura'] = '5';
$data['nVlLargura'] = '15';
$data['nVlDiametro'] = '0';

$data['sCdMaoPropria'] = 'n';
$data['nVlValorDeclarado'] = '0';
$data['sCdAvisoRecebimento'] = 'n';
$data['StrRetorno'] = 'xml';

$data['nCdServico'] = '40010,41106';

$data = http_build_query($data);
$url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
		 
$curl = curl_init($url . '?' . $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		 
$result = curl_exec($curl);
$result = simplexml_load_string($result);

foreach($result -> cServico as $row){
		 
  if($row->Erro == 0){
  
	echo $row->Codigo . " - " . $row->Valor  . "
";

    // $row->Codigo
    // $row->PrazoEntrega
    // $row->Valor 

  }

}