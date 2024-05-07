<!DOCTYPE html>

<html>

<head>

    <title>Projetos</title>
    <link rel="stylesheet" href="css/projetosCSS.css">
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo32.png" type="image/x-icon">

</head>

<body>
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">Criar projeto</h2>
                <p class="description description-primary">Crie um novo projeto</p>
                <button id="signin" class="btn btn-primary">
                    <h3>Criar</h3>
                </button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">Lista de projetos</h2>
                <p class="description description-second">Exclua, edite ou continue no projeto</p>
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
        <div class="content second-content">
            <div class="first-column">
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
                        <input type="number" placeholder="Número de Alunos" name='qtd_alunos' oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min= "1" maxlength = "2">
                    

                    <button class="btn btn-second" value="professor" name="action" type='submit'>
                        <h3>Criar</h3>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="js/login.js"></script>

</body>

</html>