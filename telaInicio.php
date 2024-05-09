<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: index.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['turma'] = $_POST['turma'];}
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="vierport" content="width=device-width, initial-scale=1.0" >
    <title><?php 
    $tituloPag = 'Home';
    echo "$tituloPag"; 
    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="shortcut icon" href="img/logo32.png" type="image/x-icon">

        <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/estiloInicio.css">
</head>

<body>
    <?php
    include 'include/header.php'
    ?>
    <main>
        <?php
        include 'include/menuLateral.php'
        ?>

        
        <div class="DivDireita">
            <div class="bv">
                <div class="centT">
                <?php

				print '<h1>Olá '.$_SESSION['username'].'</h1>';
                print '<br>';
                print '<h1>Você está na</h1>';
                print '<br>';
                print '<h1>turma: '.$_SESSION['turma'].'</h1>';
                            ?>
            </div>
            </div>
            <div class="Imagem">
                <img class="imgLog" src="img/imgLog2.png" alt="">
            </div>
            
        </div>
    </main>

    

    <script src="js/sidebar.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>