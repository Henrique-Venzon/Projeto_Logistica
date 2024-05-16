<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}
if (($_SESSION['tipo_login'] != 'professor')) {
    header("Location: index.php");
    exit;
}
if (isset($_SESSION['error'])) {
    echo "<script type='text/javascript'>alert('" . $_SESSION['error'] . "');</script>";
    unset($_SESSION['error']);
}
?>
<!DOCTYPE html>

<html>

<head>

    <title>Projetos</title>
    <link rel="stylesheet" href="css/projetosCSS.css">
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
        <link rel="shortcut icon" href="img/amem.svg">
    <script src="https://kit.fontawesome.com/6934df05fc.js" crossorigin="anonymous"></script>


</head>

<body>
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <div class="sair">
                <i id="sair" class="fa-solid fa-person-running"></i>
                </div>
                <h2 class="title title-primary">Criar projeto</h2>
                <p class="description description-primary">Crie um novo projeto</p>
                <button id="signin" class="btn btn-primary">
                    <h3>Criar</h3>
                </button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">Lista de projetos</h2>
                <p class="description description-second">Exclua, edite ou continue o projeto</p>
                <?php

                $servername = "localhost";
                $username = "root.Att";
                $password = "root";
                $dbname = "logistica";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                $sql = "SELECT * FROM turma where id>=0";


                $res = $conn->query($sql);

                $qtd = $res->num_rows;

                if ($qtd > 0) {
                    print "<div class=\"tabela-scroll\">";
                    print "<table class='table' >";

                    print "<tr>";
                    print "<th>Turma</th>";
                    print "<th>N° Alunos</th>";
                    print "<th>Acessar</th>";
                    print "<th >Editar</th>";
                    print "<th>Excluir</th>";
                    print "</tr>";

                    while ($row = $res->fetch_object()) {
                        // Consulta SQL para contar o número de alunos na turma
                        $sql_alunos = "SELECT COUNT(*) AS num_alunos FROM aluno WHERE turma_id = " . $row->id;
                        $res_alunos = $conn->query($sql_alunos);
                        $row_alunos = $res_alunos->fetch_object();

                        print "<tr style=\"border-bottom: none;\">";
                        print "<td>" . $row->id . "</td>";
                        print "<td>" . $row_alunos->num_alunos . "</td>";
                        print "<td>";
                        print "<form action='telainicio.php' method='POST'>";
                        print "<input type='hidden' name='turma' value='" . $row->id . "'>";
                        print "<button class=\"acessar\" type='submit' ><span>Acessar</span></button>";
                        print "</form>";
                        print "</td>";
                        print "<td>";
                        print "<form action='telaUsuarios.php' method='post'>";
                        print "<input type='hidden' name='turma' value='" . $row->id . "'>";
                        print "<button class=\"editar\" type='submit'><span>Editar</span> </button>";
                        print "</form>";
                        print "</td>";
                        print "<td style=\"border-right:none;\">";
                        print "<form action='processamento/Excluir.php' method='post' onsubmit='return confirm(\"Tem certeza que deseja excluir?\");'>";
                        print "<input type='hidden' name='turma' value='" . $row->id . "'>";
                        print "<button class=\"excluir\" type='submit'><span>Excluir</span> </button>";
                        print "</form>";
                        print "</td>";
                        print "</tr>";
                    }



                    print "</table>";
                    print "</div>";

                } else {
                    print "<p class='alert alert-danger'>Não encrontrou nenhuma turma criada</p>";
                }

                ?>


            </div>
        </div>
        <div class="content second-content">
            <div class="first-column">
                <div class="sair2">
                <i id="sair2" class="fa-solid fa-person-running"></i>
                </div>
                <h2 class="title title-primary">Lista de Projetos</h2>
                <p class="description description-primary">Projetos</p>
                <button id="signup" class="btn btn-primary">
                    <h3>Acessar</h3>
                </button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">Criar Projetos</h2>
                <p class="description description-second">Crie um novo Projeto</p>
                <form class="form" action='processamento/adicionarturma.php' method="POST">

                    <label class="label-input" for=""></label>
                    <input type="number" placeholder="Código do Projeto" name='codigo_projeto'>
                    <label class="label-input" for=""></label>
                    <input type="number" placeholder="Número de Alunos" name='qtd_alunos'
                        oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        min="1" maxlength="2">


                    <button class="btn btn-second" value="professor" name="action" type='submit'>
                        <h3>Criar</h3>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="js/login.js"></script>
    <script src="js/projetos.js"></script>


</body>

</html>