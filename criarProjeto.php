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
    $tituloPag = 'Criar Projetos';
    echo "$tituloPag"; 
    ?></title>


<link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/criarProj.css">
</head>

<body>
    <?php
    include 'include/header.php'
    ?>
    <main>
    <div class="centroTable">
        <div class="textCriarVoltar">
            <h1 class="txtNone">Criar turma</h1>
            <h1 id="voltar">Voltar</h1>
        </div>

            </div>
    </main>
    <script src="js/criarProj.js"></script>

</body>

</html>