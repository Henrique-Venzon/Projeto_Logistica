<?php
session_start();
include_once('../include/conexao.php');
    if ($conexao->connect_errno) {
        echo "Failed to connect to MySQL: " . $conexao->connect_error;
        exit();
    } else {
        $codigo_projeto = $conexao->real_escape_string($_POST['codigo_projeto']);
        $alunos = $conexao->real_escape_string($_POST['qtd_alunos']);

        
        $sql_check = "SELECT * FROM `turma` WHERE `id` = $codigo_projeto";
        $resultado_check = $conexao->query($sql_check);

        if ($resultado_check->num_rows > 0) {
            
            $_SESSION['error'] = "O turma_id já existe.";
            
            header('Location: ../projetos.php', true, 301);
            exit();
        }

        $sql = "INSERT INTO `turma`(`id`) VALUES ($codigo_projeto)";
        $resultado = $conexao->query($sql);

        if ($resultado) {
            for ($i = 1; $i <= $alunos; $i++) {
                
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
            exit();
        }

    }


