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
<meta name="vierport" content="width=device-width, initial-scale=1.0" >

    <meta charset="utf-8">
    <title>
        <?php 
    $tituloPag = 'Projetos';
    echo "$tituloPag"; 
    ?></title>


<link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/projetosCSS.css">
</head>

<body>
    <?php
    include 'include/header.php'
    ?>
    <main>
        <div class="centroTable">
            <div id="criarProjeto" class="cards cards1">
                    <div class="textTit">
                        <h1>Criar projetos</h1>
                    </div>
                    <div class="img">
                        <img src="img/adicionarprojeto (5).png" alt="">
                    </div>
            </div>
            <div id="listarProjeto" class="cards cards2">
            <div class="textTit">
                        <h1>Listas de projetos</h1>
                    </div>
                    <div class="img">
                        <img src="img\editarprojetobranco.png" alt="">
                    </div>
            </div>
        </div>
    </main>
    <script src="js/projeto.js"></script>

</body>

</html>