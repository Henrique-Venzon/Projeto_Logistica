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
    $tituloPag = 'Projetos';
    echo "$tituloPag"; 
    ?></title>


    <link rel="stylesheet" href="projetosCSS.css">
</head>

<body>
    <?php
    include 'include/header.php'
    ?>
    <main>
        <div class="Card">
                
        </div>
        <div class="imgCentro">
                    <img src="" alt="">
        </div>
        <div class="Card">
                
        </div>
    </main>

</body>

</html>