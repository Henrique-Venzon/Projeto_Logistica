<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: index.php");
    exit;
}
if (($_SESSION['tipo_login'] != 'professor')) {
    header("Location: index.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['turma'] = $_POST['turma'];}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="img/amem.svg">

    <title><?php 
    $tituloPag = 'Alunos';
    echo "$tituloPag"; 
    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/TelaUsuarios.css">
</head>

<body>
<?php
    include 'include/header.php'
    ?>
    <main>
        <?php
        include 'include/menuLateral.php'; 
        ?>
        <div class="DivDireita">
            <div class="table-inputs">
        <h1 class="centroT">Lista de alunos</h1>

        <?php        
  include_once('include/conexao.php');
        $sql = "SELECT * FROM aluno WHERE turma_id = '{$_SESSION['turma']}'";

        $res = $conn->query($sql);

        $qtd = $res->num_rows;

        if($qtd > 0){
            print "<div class=\"tabela-scroll\">";
            print "<table class='table' >";

            print "<tr>";
                    print "<th>Nome</th>";
                    print "<th>Senha</th>";
                    print "<th>Turma</th>";
                    print "<th style=\"border-right:none;\">Resetar senha</th>";
                    print "</tr>";
            
                while($row = $res->fetch_object()){
                    print "<tr>";
                    print "<td>".$row->username."</td>";
                    print "<td>".$row->password."</td>";
                    print "<td >".$row->turma_id."</td>";
                    print "<td style=\"border-right:none;\">
                    <button class=\"reset\" data-id=\"".$row->id."\"><span>Resetar</span></button>
                        </td>"; 
                    print "</tr>";

                }
                print "</table>";
                print "</div>";

        }else{
            print "<p class='alert alert-danger'>Não encrontrou nenhum usuario</p>";
        }

        ?>
            </div>   
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $(".reset").click(function(){
            var id = $(this).data('id'); 
            $.ajax({
                url: 'processamento/reset_password.php', 
                type: 'post',
                data: {id: id}, 
                success: function(response){
                    alert(response); 
                location.reload()
                }
            });
        });
    });
    </script>

    <script src="js/sidebar.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>
