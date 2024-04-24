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
    $tituloPag = 'Container';
    echo "$tituloPag"; 
    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        
        <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

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
                <form action="">
                <div class="inputs">
                    <div class="juntar">
                    <label for="">Placa do Caminhão:</label>
                    <input type="text" name="" placeholder="Placa do Caminhão">
                    </div>
                    <div class="juntar">
                    <label for="">Nome do Motorista:</label>
                    <input type="text" name="" placeholder="Nome do Motorista">
                    </div>
                    <div class="juntar">
                    <label for="">Container:</label>
                    <input type="text" name="" placeholder="Container">
                    </div>
                    <div class="juntar">
                    <label for="">Navio:</label>
                    <input type="text" name="" placeholder="Navio">
                    </div>
                    <div class="juntar">
                    <label for="">Cliente:</label>
                    <input type="text" name="" placeholder="Cliente">
                    </div>
                    <div class="juntar">
                    <label for="">Tipo:</label>
                    <input type="text" name="" placeholder="Tipo">
                    </div>
                    <div class="juntar">
                    <label for="">Lacre:</label>
                    <input type="text" name="" placeholder="Lacre">
                    </div>
                    <div class="juntar">
                    <label for="">Lacre SIF:</label>
                    <input type="text" name="" placeholder="Lacre SIF">
                    </div>
                    <div class="juntar">
                    <label for="">Temperatura:</label>
                    <input type="text" name="" placeholder="Temperatura">
                    </div>
                    <div class="juntar">
                    <label for="">IMO:</label>
                    <input type="text" name="" placeholder="IMO">
                    </div>
                    <div class="juntar">
                    <label for="">N° ONU:</label>
                    <input type="text" name="" placeholder="N° ONU">
                    </div>
                    <h1>Assinale se tiver algum problema</h1>
                    <div class="problema">
                    <div class="juntar2">
                    <div class="input-group">
                    <input id="1" type="checkbox" name="">
                    <label for="1">Container bem desgastado</label>
                    </div>
                    </div>
                    <div class="juntar2">
                    <div class="input-group">
                    <input id="2" type="checkbox" name="">
                    <label for="2">Avariana lateral direita</label>
                    </div>
                    </div>
                    <div class="juntar2">
                    <div class="input-group">
                    <input id="3" type="checkbox" name="">
                    <label for="3">Avariana na lateral esquerda</label>
                    </div>
                    </div>
                    <div class="juntar2">
                    <div class="input-group">
                    <input id="4" type="checkbox" name="">
                    <label for="4">Avaria no teto</label>
                    </div>
                    </div>
                    <div class="juntar2">
                    <div class="input-group">
                    <input id="5" type="checkbox" name="">
                    <label for="5">Avaria na frente</label>
                    </div>
                    </div>
                    <div class="juntar2">
                    <div class="input-group">
                    <input id="6" type="checkbox" name="">
                    <label for="6">Sem lacre</label>
                    </div>
                    </div>
                    <div class="juntar2">
                    <div class="input-group">
                    <input id="7" type="checkbox" name="">
                    <label for="7">Adesivos avariados</label>
                    </div>
                    </div>
                    <div class="juntar2">
                    <div class="input-group">
                    <input id="8" type="checkbox" name="">
                    <label for="8">Excesso de altura</label>
                    </div>
                    </div>
                    <div class="juntar2">
                    <div class="input-group">
                    <input id="9" type="checkbox" name="">
                    <label for="9">Excesso na direita</label>
                    </div>
                    </div>
                    <div class="juntar2">
                    <div class="input-group">
                    <input id="10" type="checkbox" name="">
                    <label for="10">Excessona esquerda</label>
                    </div>
                    </div>
                    <div class="juntar2">
                    <div class="input-group">
                    <input id="11" type="checkbox" name="">
                    <label for="11">Excesso frontal</label>
                    </div>
                    </div>
                    <div class="juntar2">
                    <div class="input-group">
                    <input id="12" type="checkbox" name="">
                    <label for="12">Painel avariado</label>
                    </div>
                    </div>
                    <div class="juntar2">
                    <div class="input-group">
                    <input id="13" type="checkbox" name="">
                    <label for="13">Sem cabo de energia</label>
                    </div>
                    </div>
                    <div class="juntar2">
                    <div class="input-group">
                    <input id="14" type="checkbox" name="">
                    <label for="14">Sem lona</label>
                    </div>
                    </div>

                    </div>
                    </div>
                    </div>
                    <div class="enviar">
                        <input type="submit">
                    </div>
                </form>
                    
            </div>
        </div>
                

    </main>

    

    <script src="js/sidebar.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>