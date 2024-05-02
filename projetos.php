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

<link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/projetosCSS.css">
</head>

<body>
    <?php
    include 'include/header.php'
    ?>
    <main>
        <div class="centroTable">
            <div class="cards">
                    <div class="textTit">
                        <h1>Criar projetos</h1>
                    </div>
            </div>
            <div class="cards">
            <div class="textTit">
                        <h1>Listas de projetos</h1>
                    </div>
            </div>
        </div>
        
    </main>
    <script src="js/projetos.js"></script>
</body>

</html>