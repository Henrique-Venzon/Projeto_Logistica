<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hostname = "127.0.0.1";
    $user = "root.Att";
    $password = "root";
    $database = "logistica";

    $conexao = new mysqli($hostname, $user, $password, $database);

    if ($conexao->connect_errno) {
        echo "Failed to connect to MySQL: " . $conexao->connect_error;
        exit();
    } else {
        $turma_id = $conexao->real_escape_string($_POST['turma']);
        $sql_notasfiscais = "DELETE FROM nota_fiscal_criada WHERE id_turma = " . $turma_id;
        $sql_docas = "DELETE FROM docas WHERE id_turma = " . $turma_id;
        $sql_carga = "DELETE FROM carga WHERE turma_id = " . $turma_id;
        $sql_container = "DELETE FROM container WHERE turma_id = " . $turma_id;
        $conexao->query($sql_notasfiscais);
        $conexao->query($sql_docas);
        $conexao->query($sql_carga);
        $conexao->query($sql_container);
        // Excluir todos os alunos da turma
        $sql_alunos = "DELETE FROM aluno WHERE turma_id = " . $turma_id;
        $conexao->query($sql_alunos);

        // Excluir a turma
        $sql_turma = "DELETE FROM turma WHERE id = " . $turma_id;
        $conexao->query($sql_turma);

        header('Location: ../projetos.php', true, 301);
        exit();
    }
}

