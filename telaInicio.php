<?php
session_start();
?>
<!DOCTYPE html>

<head>

    <title>Inicio</title>

    <link rel="stylesheet" href="estiloInicio.css">
</head>

<body>
    <header>
        <div class="imagemDec">
            <img src="" alt="">
        </div>
        <div class="textArmazem">
            <h1>Armazém</h1>
        </div>
        <div class="imgperfil">
            <img src="" alt="">
        </div>
    </header>
    <main>
        <div class="DivEsquerda">
    <ul class="Ulprincipal">
        <li><input type="checkbox" id="chec">
            <label for="chec">
                <div class="label1">
                    <div class="img-T"><img src="img/caminhao.png" style="cursor: pointer;" class="imgbotao"></div>
                    <div class="img-T"><img src="img/caminhao.png" style="cursor: pointer;" class="imgbotao"></div>
                    <div class="img-T"><img src="img/caminhao.png" style="cursor: pointer;" class="imgbotao"></div>
                    <div class="img-T"><img src="img/caminhao.png" style="cursor: pointer;" class="imgbotao"></div>
                </div>
            </label>
            <nav>
                <ul class="Ulvertical">
                    <div class="text">
                        <h1>Docas </h1>
                    </div>
                    <div class="text">
                        <h1>Piking</h1>
                    </div>
                    <div class="text">
                        <h1>Pedidos</h1>
                    </div>
                    <div class="text">
                        <h1>Configuração</h1>
                    </div>
                </ul>
            </nav>
        </li>
    </ul>
    </div>
    <div class="DivDireita">
            <div class="inicioConteudo">
                <div class="cabeca">
                <div class="imgCont">
                    <img class="imgCabeca" src="img/caminhao.png" style="margin-left:10px;" alt="">
                </div>
                <div class="textCon">
                    <h1>Produtos</h1>
                </div>
                <div class="botaoAdd">
                        <?php
                        include 'item.php';
                    ?>
                </div>
                <div class="botaoConfig">
                    <img class="imgCabeca" src="img/caminhao.png" style="margin-right:10px;" alt="">
                </div>
                </div>
            </div>
            </div>
            </main>
            <a href="limite_armazem.php">LIMITE</a>
        
        <script src="" async defer></script>
    </body>
</html>