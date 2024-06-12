<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hostname = '127.0.0.1';
    $user = 'root.Att';
    $password = 'root';
    $database = 'logistica';

    $conn = new mysqli($hostname, $user, $password, $database);

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
    $turma_id = $_SESSION['turma'];

    $sql = "INSERT INTO carga (`npedido`,`Empresa`,`cliente`,`Telefone`,`CEP`,`produto1`,`produto2`,`produto3`,`produto4`,`unidade1`,`unidade2`,`unidade3`,`unidade4`,`quantidade1`,`quantidade2`,`quantidade3`,`quantidade4`,`valor1`,`valor2`,`valor3`,`valor4`,`ncm1`,`ncm2`,`ncm3`,`ncm4`,`cst1`,`cst2`,`cst3`,`cst4`,`cfop1`,`cfop2`,`cfop3`,`cfop4`,`turma_id`,`situacao`) VALUES 
    ('$npedido', '$Empresa', '$cliente', '$telefone', '$CEP', '$produto1', '$produto2', '$produto3', '$produto4', '$unidade1', '$unidade2', '$unidade3', '$unidade4', '$quantidade1', '$quantidade2', '$quantidade3', '$quantidade4', '$valor1', '$valor2', '$valor3', '$valor4', '$ncm1', '$ncm2', '$ncm3', '$ncm4', '$cst1', '$cst2', '$cst3', '$cst4', '$cfop1', '$cfop2', '$cfop3', '$cfop4', '$turma_id', 'espera_fiscal');";

    function insertIfNotExists($conn, $produto, $valor, $turma_id) {
        if ($produto != '') {
            $check_sql = "SELECT * FROM produto WHERE nome_produto='$produto' AND id_turma='$turma_id'";
            $result = $conn->query($check_sql);
            if ($result->num_rows == 0) {
                $insert_sql = "INSERT INTO produto (`nome_produto`, `preco`, `id_turma`) VALUES ('$produto', '$valor', '$turma_id')";
                $conn->query($insert_sql);
            }
        }
    }

    insertIfNotExists($conn, $produto1, $valor1, $turma_id);
    insertIfNotExists($conn, $produto2, $valor2, $turma_id);
    insertIfNotExists($conn, $produto3, $valor3, $turma_id);
    insertIfNotExists($conn, $produto4, $valor4, $turma_id);

    if ($conn->query($sql) === TRUE) {
        echo 'Dados inseridos com sucesso!';
        header('Location: criar_nota_fiscal.php?npedido=' . urlencode($npedido) . '&turma_id=' . urlencode($turma_id));
    } else {
        echo 'Erro ao inserir dados: ' . $conn->error;
    }

    $conn->close();
}
?>
