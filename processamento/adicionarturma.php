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
        $codigo_projeto = $conexao->real_escape_string($_POST['codigo_projeto']);
        $alunos = $conexao->real_escape_string($_POST['qtd_alunos']);

        $sql = "INSERT INTO `turma`(`id`) VALUES ($codigo_projeto)";
        $resultado = $conexao->query($sql);

        if ($resultado) { // Se a inserção foi bem-sucedida
            // Inserir alunos na tabela 'aluno'
            for ($i = 1; $i <= $alunos; $i++) {
                // Gera uma nova senha com 4 caracteres e números diferentes
                $new_password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 4);
                $username = "Aluno " . $i;
                $sql = "INSERT INTO `aluno`(`username`, `password`, `turma_id`) VALUES ('$username', '$new_password', $codigo_projeto)";
                $conexao->query($sql);
            }

            header('Location: ../projetos.php', true, 301);
            exit();
        } else {
            $conexao->close();
            header('Location: ../index.php', true, 301);
        }

    }
}



