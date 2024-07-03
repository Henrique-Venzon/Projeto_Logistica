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
$doca = $_POST['doca'];

include_once('../include/conexao.php');

// Verifica se houve uma requisição POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['produtos_selecionados'])) {

        $insert_stmt = $conn->prepare("INSERT INTO pegado (id_doca, nome_produto, quantidade_enviada, posicao, id_carga, id_aluno, id_turma) VALUES (?, ?, ?, ?, ?, ?, ?)");


        $delete_stmt = $conn->prepare("DELETE FROM movimentacao WHERE id = ?");


        $insert_stmt->bind_param("isissii", $id_doca, $nome_produto, $quantidade_enviada, $posicao, $id_carga, $id_aluno, $id_turma);


        $delete_stmt->bind_param("i", $produto_id);


        foreach ($_POST['produtos_selecionados'] as $produto_id) {

            $check_query = "SELECT COUNT(*) AS count FROM pegado WHERE id = ?";
            $check_stmt = $conn->prepare($check_query);
            $check_stmt->bind_param("i", $produto_id);
            $check_stmt->execute();
            $check_result = $check_stmt->get_result();
            $row = $check_result->fetch_assoc();

            if ($row['count'] == 0) {
                
                
                $get_info_query = "SELECT nome_produto, quantidade_enviada, posicao FROM movimentacao WHERE id = ?";
                $get_info_stmt = $conn->prepare($get_info_query);
                $get_info_stmt->bind_param("i", $produto_id);
                $get_info_stmt->execute();
                $info_result = $get_info_stmt->get_result();
                $produto_info = $info_result->fetch_assoc();


                $id_doca = $_POST['doca_id_real']; 
                $nome_produto = $produto_info['nome_produto'];
                $quantidade_enviada = $produto_info['quantidade_enviada'];
                $posicao = $produto_info['posicao'];
                $id_carga = $_POST['id_carga']; 
                $id_turma = $_SESSION['turma']; 


                $insert_stmt->execute();


                $delete_stmt->execute();
            }
        }

        // Fecha as declarações preparadas
        $insert_stmt->close();
        $delete_stmt->close();
    }
}
header('location:../movimentar'. $doca .'.php',true,301);
exit();

