<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<head>
<meta name="vierport" content="width=device-width, initial-scale=1.0" >
<link rel="shortcut icon" href="img/logo32.png" type="image/x-icon">

    <meta charset="utf-8">
    <title><?php 
    $tituloPag = 'Container';
    echo "$tituloPag"; 
    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        
        <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <meta name="vierport" content="width=device-width, initial-scale=1.0" >

    <link rel="stylesheet" href="css/container.css">
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
            <div class="table-inputs">
                <div class="txtCont">
                    <h1>Container</h1>
                </div>
                <div class="form">
                <form action="processamento/processarcontainer.php" method="post">
                <div class="inputs">
                    <div class="juntar">
                    <div class="juntar">
    <label for="">Placa do Caminhão:</label>
</div>
<div class="juntar">
    <label for="">Nome do Motorista:</label>
</div>
<div class="juntar">
    <label for="">Container:</label>
</div>
<div class="juntar">
    <label for="">Navio:</label>
</div>
<div class="juntar">
    <label for="">Cliente:</label>
</div>
<div class="juntar">
    <label for="">Tipo:</label>
</div>
<div class="juntar">
    <label for="">Lacre:</label>
</div>
<div class="juntar">
    <label for="">Lacre SIF:</label>
</div>
<div class="juntar">
    <label for="">Temperatura:</label>
</div>
<div class="juntar">
    <label for="">IMO:</label>
</div>
<div class="juntar">
    <label for="">N° ONU:</label>
</div>

        
                    <div class="enviar">
                <input type="submit" onclick="exibirMensagem()">
            </div>
        </form>
    </div>

    <script>
        function exibirMensagem() {
            alert('Dados enviados com sucesso!'); 
            
        }
    </script>
    </form>

"
            
        </div>
                

    </main>

    

    <script src="js/sidebar.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>