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
    $tituloPag = 'Listar Projetos';
    echo "$tituloPag"; 
    ?></title>


<link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/listar.css">
</head>

<body>
    <?php
    include 'include/header.php'
    ?>
    <main>
    <div class="centroTable">

</div>
    </main>

</body>

</html>