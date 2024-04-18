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
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        
        <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="estiloInicio.css">
</head>

<body>
    <header>
    <div class="logo">
            <img src="" alt="">
            <h1>LogConnect</h1>
        </div>
         
        <div class="senai">
            <img src="img/senai-logo-1.png" alt="">
        </div>
        
        <div class="nomeLogin">  
        <?php
				print '<h1>'.$_SESSION['username'].'</h1>';
                            ?>
        </div> 
        <div class="textArmazem">
            <h1>Home</h1>
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
            <a href="#" >Home</a>
                    </div>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="telaUsuarios.php" class="sidebar-link">
                            <img src="img/perfil.png" alt="">
                            <span>Perfil</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <img src="img/mov03.png">
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
                            <img src="img/armazem_sidebar.png" alt=""><i class="lni lni-agenda"></i>
                            <span>Estoque</span>
                        </a>
                    </li>
                    
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                            data-bs-target="#Recebimentos" aria-expanded="false" aria-controls="Recebimentos">
                            <img src="img/receb.png" alt="">
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
                            <img src="img/carMov.png" alt="">
                            <span>Expedição</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <img style="width: 70px;margin-left:-10px;" src="img/relatorio.png" alt="">
                            <span>Relatórios</span>
                        </a>
                    </li>
                    
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <img  src="img/confpreto.png" alt="">
                            <span>Controle</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="sair.php" class="sidebar-link">
                        <img style="width: 45px;margin-left:5px;height:45px;" src="img/sair.png" alt="">
                            <span>Sair</span>
                        </a>
                    </li>
                </ul>
                
            </aside>
            
        </div>

        
        
        <div class="DivDireita">
            <div class="bv">
                <h1>Seja Bem-Vindo</h1>
                <?php
				print '<h1>'.$_SESSION['username'].'</h1>';
                            ?>
            </div>
            <div class="Imagem">
                <img class="imgLog" src="img/imgLog2.png" alt="">
            </div>
        </div>
    </main>

    

    <script src="telaInicio.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>