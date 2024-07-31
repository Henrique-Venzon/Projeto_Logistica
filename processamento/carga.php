<?php

session_start();
include_once('../include/conexao.php');


    // Verifique a conexão
    if ($conn->connect_error) {
        die('Falha na conexão: ' . $conn->connect_error);
    }

    $npedido = $_POST['npedido'];
    $Empresa = $_POST['Empresa'];
    $cliente = $_POST['Cliente'];
    $telefone = $_POST['Telefone'];
    $CEP = $_POST['CEP'];
    $produto1 = $_POST['produto1'] ? $_POST['produto1'] : '';
    $produto2 = isset($_POST['produto2']) ? $_POST['produto2'] : '';
    $produto3 = isset($_POST['produto3']) ? $_POST['produto3'] : '';
    $produto4 = isset($_POST['produto4']) ? $_POST['produto4'] : '';
    $unidade1 = $_POST['unidade1'];
    $unidade2 = isset($_POST['unidade2']) ? $_POST['unidade2'] : 'NULL';
    $unidade3 = isset($_POST['unidade3']) ? $_POST['unidade3'] : 'NULL';
    $unidade4 = isset($_POST['unidade4']) ? $_POST['unidade4'] : 'NULL';
    $quantidade1 = is_numeric($_POST['quantidade1']) ? $_POST['quantidade1'] : 0;
    $quantidade2 = is_numeric($_POST['quantidade2']) ? $_POST['quantidade2'] : 0;
    $quantidade3 = is_numeric($_POST['quantidade3']) ? $_POST['quantidade3'] : 0;
    $quantidade4 = is_numeric($_POST['quantidade4']) ? $_POST['quantidade4'] : 0;
    $valor1 = is_numeric($_POST['valor1']) ? $_POST['valor1'] : '0.00';
    $valor2 = is_numeric($_POST['valor2']) ? $_POST['valor2'] : '0.00';
    $valor3 = is_numeric($_POST['valor3']) ? $_POST['valor3'] : '0.00';
    $valor4 = is_numeric($_POST['valor4']) ? $_POST['valor4'] : '0.00';
    $ncm1 = is_numeric($_POST['ncm1']) ? $_POST['ncm1'] : 0;
    $ncm2 = is_numeric($_POST['ncm2']) ? $_POST['ncm2'] : 0;
    $ncm3 = is_numeric($_POST['ncm3']) ? $_POST['ncm3'] : 0;
    $ncm4 = is_numeric($_POST['ncm4']) ? $_POST['ncm4'] : 0;
    $cst1 = is_numeric($_POST['cst1']) ? $_POST['cst1'] : 0;
    $cst2 = is_numeric($_POST['cst2']) ? $_POST['cst2'] : 0;
    $cst3 = is_numeric($_POST['cst3']) ? $_POST['cst3'] : 0;
    $cst4 = is_numeric($_POST['cst4']) ? $_POST['cst4'] : 0;
    $cfop1 = is_numeric($_POST['cfop1']) ? $_POST['cfop1'] : 0;
    $cfop2 = is_numeric($_POST['cfop2']) ? $_POST['cfop2'] : 0;
    $cfop3 = is_numeric($_POST['cfop3']) ? $_POST['cfop3'] : 0;
    $cfop4 = is_numeric($_POST['cfop4']) ? $_POST['cfop4'] : 0;
    $data_pedido = $_POST['data_pedido'];
    $data_entrega = $_POST['data_entrega'];
    $turma_id = $_SESSION['turma'];

    $sql = "INSERT INTO carga (`npedido`,`Empresa`,`cliente`,`Telefone`,`CEP`,`produto1`,`produto2`,`produto3`,`produto4`,`unidade1`,`unidade2`,`unidade3`,`unidade4`,`quantidade1`,`quantidade2`,`quantidade3`,`quantidade4`,`valor1`,`valor2`,`valor3`,`valor4`,`ncm1`,`ncm2`,`ncm3`,`ncm4`,`cst1`,`cst2`,`cst3`,`cst4`,`cfop1`,`cfop2`,`cfop3`,`cfop4`,`data_pedido`,`data_entrega`,`turma_id`,`situacao`) VALUES 
    ('$npedido', '$Empresa', '$cliente', '$telefone', '$CEP', '$produto1', '$produto2', '$produto3', '$produto4', '$unidade1', '$unidade2', '$unidade3', '$unidade4', '$quantidade1', '$quantidade2', '$quantidade3', '$quantidade4', '$valor1', '$valor2', '$valor3', '$valor4', '$ncm1', '$ncm2', '$ncm3', '$ncm4', '$cst1', '$cst2', '$cst3', '$cst4', '$cfop1', '$cfop2', '$cfop3', '$cfop4', '$data_pedido', '$data_entrega', '$turma_id', 'NotaFiscal');";

    function normalizeString($str) {
        $unwanted_array = array(
            'á' => 'a', 'à' => 'a', 'ã' => 'a', 'â' => 'a', 'ä' => 'a',
            'é' => 'e', 'è' => 'e', 'ê' => 'e', 'ë' => 'e',
            'í' => 'i', 'ì' => 'i', 'î' => 'i', 'ï' => 'i',
            'ó' => 'o', 'ò' => 'o', 'õ' => 'o', 'ô' => 'o', 'ö' => 'o',
            'ú' => 'u', 'ù' => 'u', 'û' => 'u', 'ü' => 'u',
            'ç' => 'c',
            'Á' => 'A', 'À' => 'A', 'Ã' => 'A', 'Â' => 'A', 'Ä' => 'A',
            'É' => 'E', 'È' => 'E', 'Ê' => 'E', 'Ë' => 'E',
            'Í' => 'I', 'Ì' => 'I', 'Î' => 'I', 'Ï' => 'I',
            'Ó' => 'O', 'Ò' => 'O', 'Õ' => 'O', 'Ô' => 'O', 'Ö' => 'O',
            'Ú' => 'U', 'Ù' => 'U', 'Û' => 'U', 'Ü' => 'U',
            'Ç' => 'C'
        );
        return strtr($str, $unwanted_array);
    }

    function insertIfNotExists($conn, $produto, $valor,$ncm,$cst,$cfop,$unidade) {
        if ($produto != '') {
            $produto_normalizado = normalizeString($produto);
            $check_sql = "SELECT * FROM produto WHERE nome_produto_normalizado='$produto_normalizado'";
            $result = $conn->query($check_sql);
            if ($result->num_rows == 0) {
                $insert_sql = "INSERT INTO produto (`nome_produto`, `nome_produto_normalizado`,`preco`,`unidade`,`ncm`,`cst`,`cfop`) VALUES ('$produto', '$produto_normalizado', '$valor','$unidade', '$ncm', '$cst', '$cfop')";
                $conn->query($insert_sql);
            }
        }
    }

    insertIfNotExists($conn, $produto1, $valor1,$ncm1,$cst1,$cfop1,$unidade1);
    insertIfNotExists($conn, $produto2, $valor2,$ncm2,$cst2,$cfop2,$unidade2);
    insertIfNotExists($conn, $produto3, $valor3,$ncm3,$cst3,$cfop3,$unidade3);
    insertIfNotExists($conn, $produto4, $valor4,$ncm4,$cst4,$cfop4,$unidade4);
    
    if ($conn->query($sql) === TRUE) {
        header('Location: ../criandoNotaFiscal.php?npedido=' . urlencode($npedido) . '&turma_id=' . urlencode($turma_id));
        exit();
        } else {
        echo 'Erro ao inserir dados: ' . $conn->error;
    }

    $conn->close();


