<?php
session_start();
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Inicio</title>

    <link rel="stylesheet" href="cadastrar.css">
</head>

<body>
    <header>
        <div class="imagemDec">
            <img src="" alt="">
        </div>
        <div class="textArmazem">
            <h1>Armazém</h1>
        </div> 
        <!--
        <div class="nomeLogin">  
        <?php
				echo '"<h1 class="nomeLogin">'.$username.'</h1>';
                            ?>
        </div> 
        -->
   
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
                            <div class="img-T"><img src="img/caminhao.png" style="cursor: pointer;" class="imgbotao">
                            </div>
                            <div class="img-T"><img src="img/caminhao.png" style="cursor: pointer;" class="imgbotao">
                            </div>
                            <div class="img-T"><img src="img/caminhao.png" style="cursor: pointer;" class="imgbotao">
                            </div>
                            <div class="img-T"><img src="img/caminhao.png" style="cursor: pointer;" class="imgbotao">
                            </div>
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
            <div class="imgPerfil">
                
            </div>
            
            </div>
        </div>
    </main>
    <a href="limite_armazem.php">LIMITE</a>

    <script src="" async defer></script>
</body>

</html>