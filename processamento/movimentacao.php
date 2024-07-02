<?php
session_start();
include_once('../include/conexao.php');

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

$id_aluno = $_SESSION['id'];
$id_doca = $_POST['id_doca'];
$id_carga_select = $_POST['id_carga_select'];

$nome_produto1 = $_POST['produto1'] ?? '';
$quantidade_enviada1 = $_POST['quantidade_enviada1'] ?? 0;
$posicao1 = $_POST['posicao1'] ?? '';

if (!empty($nome_produto1) && $quantidade_enviada1 > 0) {
    $sql = "INSERT INTO movimentacao (id_doca, nome_produto, quantidade_enviada, posicao, id_carga, id_aluno, id_turma) VALUES ('$id_doca', '$nome_produto1', '$quantidade_enviada1', '$posicao1', '$id_carga_select', '$id_aluno', '$_SESSION[turma]')";
    if ($conexao->query($sql) === TRUE) {
        $sql = "UPDATE vistoriado SET quantidade1 = quantidade1 - $quantidade_enviada1 WHERE id = $id_carga_select";
        if ($conexao->query($sql) !== TRUE) {
            echo "Erro ao atualizar quantidade de $nome_produto1: " . $conexao->error . "<br>";
        }
    } else {
        echo "Erro ao inserir dados: " . $conexao->error . "<br>";
    }
}

$nome_produto2 = $_POST['produto2'] ?? '';
$quantidade_enviada2 = $_POST['quantidade_enviada2'] ?? 0;
$posicao2 = $_POST['posicao2'] ?? '';

if (!empty($nome_produto2) && $quantidade_enviada2 > 0) {
    $sql = "INSERT INTO movimentacao (id_doca, nome_produto, quantidade_enviada, posicao, id_carga, id_aluno, id_turma) VALUES ('$id_doca', '$nome_produto2', '$quantidade_enviada2', '$posicao2', '$id_carga_select', '$id_aluno', '$_SESSION[turma]')";
    if ($conexao->query($sql) === TRUE) {
        $sql = "UPDATE vistoriado SET quantidade2 = quantidade2 - $quantidade_enviada2 WHERE id = $id_carga_select";
        if ($conexao->query($sql) !== TRUE) {
            echo "Erro ao atualizar quantidade de $nome_produto2: " . $conexao->error . "<br>";
        }
    } else {
        echo "Erro ao inserir dados: " . $conexao->error . "<br>";
    }
}

$nome_produto3 = $_POST['produto3'] ?? '';
$quantidade_enviada3 = $_POST['quantidade_enviada3'] ?? 0;
$posicao3 = $_POST['posicao3'] ?? '';

if (!empty($nome_produto3) && $quantidade_enviada3 > 0) {
    $sql = "INSERT INTO movimentacao (id_doca, nome_produto, quantidade_enviada, posicao, id_carga, id_aluno, id_turma) VALUES ('$id_doca', '$nome_produto3', '$quantidade_enviada3', '$posicao3', '$id_carga_select', '$id_aluno', '$_SESSION[turma]')";
    if ($conexao->query($sql) === TRUE) {
        $sql = "UPDATE vistoriado SET quantidade3 = quantidade3 - $quantidade_enviada3 WHERE id = $id_carga_select";
        if ($conexao->query($sql) !== TRUE) {
            echo "Erro ao atualizar quantidade de $nome_produto3: " . $conexao->error . "<br>";
        }
    } else {
        echo "Erro ao inserir dados: " . $conexao->error . "<br>";
    }
}

$nome_produto4 = $_POST['produto4'] ?? '';
$quantidade_enviada4 = $_POST['quantidade_enviada4'] ?? 0;
$posicao4 = $_POST['posicao4'] ?? '';

if (!empty($nome_produto4) && $quantidade_enviada4 > 0) {
    $sql = "INSERT INTO movimentacao (id_doca, nome_produto, quantidade_enviada, posicao, id_carga, id_aluno, id_turma) VALUES ('$id_doca', '$nome_produto4', '$quantidade_enviada4', '$posicao4', '$id_carga_select', '$id_aluno', '$_SESSION[turma]')";
    if ($conexao->query($sql) === TRUE) {
        $sql = "UPDATE vistoriado SET quantidade4 = quantidade4 - $quantidade_enviada4 WHERE id = $id_carga_select";
        if ($conexao->query($sql) !== TRUE) {
            echo "Erro ao atualizar quantidade de $nome_produto4: " . $conexao->error . "<br>";
        }
    } else {
        echo "Erro ao inserir dados: " . $conexao->error . "<br>";
    }
}

header('Location: ../docas.php', true, 301);
$conexao->close();

