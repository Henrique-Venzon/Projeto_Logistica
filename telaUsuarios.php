<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title><?php 
    $tituloPag = 'Cadastros';
    echo "$tituloPag"; 
    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="TelaUsuarios.css">
</head>

<body>
<?php
    include 'header.php'
    ?>
    <main>
        <?php
        include 'menuLateral.php';
        
        ?>

        
        <div class="DivDireita">
            
        <h1 class="centroT">Lista de alunos</h1>

        <?php        

        $servername = "localhost";
        $username = "root.Att";
        $password = "root";
        $dbname = "logistica";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);     

        $sql = "SELECT * FROM aluno";

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
                    print "<td >".$row->turma."</td>";
                    print "<td style=\"border-right:none;\">
                    <button class=\"reset\" onclick=\"location.href='?page=editar&id=".$row->id."';\"><span>Resetar</span></button>
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
    </main>

    

    <script src="telaInicio.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>