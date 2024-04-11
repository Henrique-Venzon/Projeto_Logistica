<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Inicio</title>

    <link rel="stylesheet" href="estiloInicio.css">
</head>

<body>
    <header>
        <div class="imagemDec">
            <img src="img/armazem.png" alt="">
        </div>
        <div class="textArmazem">
            <h1>Armazém</h1>
        </div> 
        <div class="senai">
            <img src="img/senai-logo-1.png" alt="">
        </div>
        <!--
        <div class="nomeLogin">  
        <?php
				echo '"<h1 class="nomeLogin">'.'Bem vindo professor: '.$username.'</h1>';
                            ?>
        </div> 
        -->
   
        <div class="imgperfil">
            <img src="img/perfil.png" alt="">
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
                            <div class="img-T"><img src="img/Piking.png" style="cursor: pointer;" class="imgbotao">
                            </div>
                            <div class="img-T"><img src="img/pedidos.png" style="cursor: pointer;" class="imgbotao">
                            </div>
                            <div class="img-T"><img src="img/armazempreto.png" style="cursor: pointer;" class="imgbotao">
                            </div>
                            <div class="img-T"><img src="img/confpreto.png" style="cursor: pointer;" class="imgbotao">
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
                                <h1>Armazém</h1>
                            </div>
                            <div class="text">
                                <h1>Controle</h1>
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
                        <img class="imgCabeca" src="img/produtos.png" style="margin-left:10px;" alt="">
                    </div>
                    <div class="textCon">
                        <h1>Produtos</h1>
                    </div>

                    <div class="botaoConfig">
                        <img class="imgCabeca" src="img/confpreto.png" style="margin-right:10px;" alt="">
                    </div>
                </div>
    
            </div>
            <div class="conteudo">
                <div class="borda IDs">
                    <h1>ID</h1>

                </div>
                <div class="borda Buscas">
                    <input class="botaoBusca" type="text" class="barra" name="search" placeholder="Pesquisar">

                </div>
                <div class="borda disponivel">
                    <h1>UD</h1>
                </div>
                <div class="quantidade">
                <h1>Quantidade</h1>
                </div>
            </div>
        </div>
    </main>
    <script src="" async defer></script>
</body>

</html>