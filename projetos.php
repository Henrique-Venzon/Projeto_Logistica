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
                        <a href="" class="sidebar-link">
                            <span style="margin-left:10px;">Criar projeto</span>
                        </a>
                    </li>
            <li class="sidebar-item">
                        <a href="" class="sidebar-link">
                            <span style="margin-left:10px;">Continuar projeto</span>
                        </a>
                    </li>
            <li class="sidebar-item">
                        <a href="" class="sidebar-link">
                            <span style="margin-left:10px;">Listar projeto</span>
                        </a>
                    </li>
        </aside>

    </main>

</body>

</html>