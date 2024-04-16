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
    <div class="menuL">
            <aside id="sidebar">
                <div class="d-flex">
                    <button class="toggle-btn" type="button">
                        <img class="menuImg" src="img/menu.png" alt="">
                    </button>
                    <div class="sidebar-logo">
            <a href="#" >Nome</a>
                    </div>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <img src="img/perfil.png" alt="">
                            <span>Perfil</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <img src="" alt="">
                            <span>Movimentações</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <img src="img/Piking.png" alt=""><i class="lni lni-agenda"></i>
                            <span>Piking</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <img src="" alt=""><i class="lni lni-agenda"></i>
                            <span>Estoque</span>
                        </a>
                    </li>
                    
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                            data-bs-target="#Recebimentos" aria-expanded="false" aria-controls="Recebimentos">
                            <img src="img/caminhao.png" alt="">
                            <span>Recebimentos</span>
                        </a>
                        <ul id="Recebimentos" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Container</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Carga</a>
                            </li>
                        </ul>
                    </li> 
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <img src="" alt=""><i class="lni lni-agenda"></i>
                            <span>Expedição</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <img src="" alt=""><i class="lni lni-agenda"></i>
                            <span>Relatórios</span>
                        </a>
                    </li>
                    
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <img src="img/confpreto.png" alt="">
                            <span>Controle</span>
                        </a>
                    </li>
                </ul>
                
            </aside>
            
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