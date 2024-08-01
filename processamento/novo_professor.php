<?php

include_once "../include/conexao.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $turma_id= -1;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password']; 

    $errors = [];

    if (empty($username)) {
        $errors[] = "O campo Nome é obrigatório.";
    }

    if (empty($password)) {
        $errors[] = "O campo Senha é obrigatório.";
    }

    if ($password !== $confirmPassword) {
        $errors[] = "As senhas não coincidem.";
    }

    if (empty($errors)) {
        
        $sql = "INSERT INTO professor (username, `password`,turma_id) VALUES (?, ?,?)"; 
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("Erro na preparação da consulta: " . $conn->error);
        }

        $hashedPassword = $password;

        $stmt->bind_param("ssi", $username, $hashedPassword,$turma_id);

        if ($stmt->execute()) {
            echo "Professor cadastrado com sucesso!";
            header("Location: ../projetos.php"); 
            exit();
        } else {
            echo "Erro ao cadastrar o professor: " . $stmt->error;
        }

        $stmt->close();
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}

$conn->close();
