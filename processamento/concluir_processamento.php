<?php
$id_aluno = 1;
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}
if (!isset($_SESSION['turma'])) {
    header("Location: index.php");
    exit;
}
$turma = $_SESSION['turma'];
$id_carga = $_POST['id_carga'];

include_once('../include/conexao.php');

// Verificando a conexão
if ($conn->connect_error) {
    die('Conexão falhou: ' . $conn->connect_error);
}

$sql = "SELECT * FROM `expedicao` where id_pedido='$id_carga' and id_turma='" . $_SESSION['turma'] . "'";
$res = $conn->query($sql);
$qtd = $res->num_rows;

if ($qtd > 0) {
    while ($row = $res->fetch_object()) {
        $id_pedido = $row->id_pedido;
        $nome_produto = $row->nome_produto;
        $quantidade = $row->quantidade_enviada;
        $doca = $row->id_doca;

        // Sanitizando os dados (importante para segurança)
        $nome_produto = $conn->real_escape_string($nome_produto);
        $quantidade = $conn->real_escape_string($quantidade);

        $sql_insert = "INSERT INTO atividade_concluida_expedicao (id_pedido, nome_produto, quantidade, doca,id_turma) VALUES ('$id_pedido', '$nome_produto', '$quantidade', '$doca','$turma')";

        if ($conn->query($sql_insert) !== TRUE) {
            echo "Erro ao salvar item do pedido: " . $conn->error;
        }
    }

    // Exclui os dados da tabela expedicao após a inserção bem-sucedida
    $sql_delete = "DELETE FROM `expedicao` WHERE id_pedido='$id_carga' AND id_turma='$turma'";
    if ($conn->query($sql_delete) === TRUE) {
        // Redireciona ou exibe uma mensagem de sucesso
        header('Location: ../expedicao.php', true, 301);
        exit;
    } else {
        echo "Erro ao excluir dados da tabela expedicao: " . $conn->error;
    }
} else {
    print "<p class='alert alert-danger'>Não encontrou nenhum pedido nas docas.</p>";
}

$conn->close();
?>