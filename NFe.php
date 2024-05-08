<?php
    $hostname = "127.0.0.1";
    $user = "root.Att";
    $password = "root";
    $database = "logistica";

    $conexao = new mysqli($hostname,$user,$password,$database);

    if ($conexao -> connect_errno) {
        echo "Failed to connect to MySQL: " . $conexao -> connect_error;
        exit();
    } else {
        // Evita caracteres epsciais (SQL Inject)
        $cep = $conexao -> real_escape_string($_POST['CEP']);
        $CNPJ = $conexao -> real_escape_string($_POST['CNPJ']);
        $nome = $conexao -> real_escape_string($_POST['nome']);
        $razaoSocial = $conexao -> real_escape_string($_POST['razao']);
        $telefone = $conexao -> real_escape_string($_POST['telefone']);

        function get_endereco($cep){
            $CEP = preg_replace("/[^0-9]/", "", $cep);
            $url= "https://viacep.com.br/ws/$CEP/xml/";

            $xml= simplexml_load_file($url);
            return $xml;
        }

        $endereco = get_endereco($cep);

        if ($endereco === false) {
            echo "Erro ao buscar o endereço. Verifique o CEP e tente novamente.";
        } else {
            
            $rua = (string)$endereco -> logradouro;
            $bairro = (string) $endereco->bairro;
            $localidade = (string) $endereco->localidade;
            $estado = (string) $endereco->uf;

           

            $sql = "INSERT INTO `fornecedores` (`CNPJ`, `nomeFantasia`, `CEP`,
            `telefone`, `razaoSocial`, `rua`, `bairro`, `localidade`, `estado`)
            VALUES ('".$CNPJ."', '".$nome."', '".$cep."', '".$telefone."', '".$razaoSocial."', 
            '".$rua."', '".$bairro."', '".$localidade."', '".$estado."')";

            $resultado = $conexao->query($sql);
            $conexao -> close();
            header('Location: ../fabricante.php', true, 301);

        }
    }
