<?php
session_start();
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
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
            <div class="conteudo">
                <div class="borda IDs">
                    <h1>ID</h1>
                    <div class="conteudoID">
                        <h1 class="conBorda">vre</h1>
                        <h1 class="conBorda">d44</h1>
                    </div>
                </div>
                <div class="borda Buscas">
                    <input class="botaoBusca" type="text" class="barra" name="search" placeholder="Pesquisar">

                </div>
                <div class="borda disponivel">
                    <h1>Disponível?</h1>
                </div>
                <div class="quantidade">
                <h1>Quantidade</h1>
                </div>
            </div>
        </div>
    </main>
    <a href="limite_armazem.php">LIMITE</a>

    <script src="" async defer></script>
</body>

</html>