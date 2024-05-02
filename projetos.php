<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: index.php");
    exit;
}
if(($_SESSION['tipo_login']!='professor')){
    header("Location: telainicio.php");
    exit;
}
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title><?php 
    $tituloPag = 'Projetos';
    echo "$tituloPag"; 
    ?></title>


    <link rel="stylesheet" href="css/projetosCSS.css">
</head>

<body>
    <?php
    include 'include/header.php'
    ?>
    <main>
        <aside>
            <li class="sidebar-item">
                        <button id="btnCriarProjeto" class="sidebar-link">
                            <span style="margin-left:10px;">Criar projeto</span>
                        </button>
                    </li>
            <li class="sidebar-item">
                        <button id="btnContinuarProjeto"  class="sidebar-link">
                            <span style="margin-left:10px;">Continuar projeto</span>
                        </button>
                    </li>
            <li class="sidebar-item">
                        <button id="btnListarProjetos"  class="sidebar-link">
                            <span style="margin-left:10px;">Listar projeto</span>
                        </button>
                    </li>
        </aside>
            <div class="direita">
        
                    <div class="bv">
                        <div class="centT">
                        <?php
                        print '<h1 >Seja</h1>';
                        print '<br>';
                        print '<h1 >Bem-Vindo</h1>';
                        print '<br>';
                        print '<h1  >'.$_SESSION['username'].'</h1>';
                                    ?>
                            </div>
                            </div>
                    <div class="Imagem">
                        <img class="imgLog" src="img/imgLog2.png" alt="">
                    </div>

                    <div id="divCriarProjeto" style="display: none;">
                criar
            </div>
            <div id="divContinuarProjeto" style="display: none;">
            continuar
            </div>
            <div id="divListarProjetos" style="display: none;">
               listar
            </div>
                

            </div>
    </main>
    <script src="js/projetos.js"></script>
</body>

</html>