<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="estiloInicio.css">
    <link rel="stylesheet" href="TelaUsuarios.css">
</head>

<body>
    <header>
        <div class="imagemDec">
            <img src="img/armazempreto.png" alt="">
        </div>
        <div class="textArmazem">
            <h1>Estoque</h1>
        </div> 
        <div class="senai">
            <img src="img/senai-logo-1.png" alt="">
        </div>
        <!--
        <div class="nomeLogin">  
        <?php
				echo '"<h1 class="nomeLogin">'.$username.'</h1>';
                            ?>
        </div> 
        -->
   
        <div class="imgperfil">
            <img src="" alt="">
        </div>
    </header>
    <main>
        <div class="menuL">
            <aside id="sidebar">
                <div class="d-flex">
                    <button class="toggle-btn" type="button">
                        <img class="menuImg" src="img/menu.png" alt="">
                    </button>
                    <div class="sidebar-logo">
            <a href="#" >Nome</a>
                    </div>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <img src="img/perfil.png" alt="">
                            <span>Perfil</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <img src="" alt="">
                            <span>Movimentações</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <img src="img/Piking.png" alt=""><i class="lni lni-agenda"></i>
                            <span>Piking</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <img src="" alt=""><i class="lni lni-agenda"></i>
                            <span>Estoque</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                            data-bs-target="#Pedidos" aria-expanded="false" >
                            <img src="img/pedidos.png" alt="">
                            <span>Pedidos</span>
                        </a>
                        <ul id="Pedidos" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Criar pedidos</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Ver meus pedidos</a>
                            </li>
                        </ul>
                    </li> 
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                            data-bs-target="#Nota" aria-expanded="false" >
                            <img src="img/caminhao.png" alt="">
                            <span>Nota fiscal</span>
                        </a>
                        <ul id="Nota" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Criar Danfe</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Minhas Danfe</a>
                            </li>
                        </ul>
                    </li> 
                    
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                            data-bs-target="#Recebimentos" aria-expanded="false" >
                            <img src="img/caminhao.png" alt="">
                            <span>Recebimentos</span>
                        </a>
                        <ul id="Recebimentos" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Container</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Carga</a>
                            </li>
                        </ul>
                    </li> 
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <img src="" alt=""><i class="lni lni-agenda"></i>
                            <span>Expedição</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <img src="" alt=""><i class="lni lni-agenda"></i>
                            <span>Relatórios</span>
                        </a>
                    </li>
                    
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <img src="img/confpreto.png" alt="">
                            <span>Controle</span>
                        </a>
                    </li>
                </ul>
                
            </aside>
            
        </div>

        
        
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
            print "<table class='table' >";

            print "<tr>";
                    print "<th>Nome</th>";
                    print "<th>Senha</th>";
                    print "<th>Turma</th>";
                    print "<th>Cargo</th>";
                    print "</tr>";
            
                while($row = $res->fetch_object()){
                    print "<tr>";
                    print "<td>".$row->username."</td>";
                    print "<td>".$row->password."</td>";
                    print "<td>".$row->turma."</td>";
                    print "<td>
                    <button onclick=\"location.href='?page=editar&id=".$row->id."';\">Resetar senha</button>
                        </td>"; 
                    print "</tr>";

                }
                print "</table>";

        }else{
            print "<p class='alert alert-danger'>Não encrontrou nenhum usuario</p>";
        }

        ?>

        </div>
    </main>

    

    <script src="telaInico.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>