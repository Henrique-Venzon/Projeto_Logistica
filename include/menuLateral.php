<link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

<style>
    .menuL a {
        text-decoration: none;
    }

    .menuL li {
        list-style: none;
    }

    .menuL h1 {
        font-size: 1.4rem;
    }

    .menuL {
        display: flex;
        height: 92.1vh;
    }

    .toggle-btn img {
        height: 40px;
        width: 40px;
    }

    .d-flex {
        display: flex;
        margin-top: -10px;
        margin-bottom: 0px;
    }

    .sidebar-item img {
        height: 50px;
        width: 50px;
    }

    .menuImg {
        margin-left: 8px;
    }

    #sidebar {
        width: 100px;
        z-index: 1000;
        transition:  .05s ease-out;
        background-color: #64acff;
        display: flex;
        flex-direction: column;
    }

    #sidebar.expand {
        width: 260px;
    }

    .toggle-btn {
        background-color: transparent;
        cursor: pointer;
        border: 0;
        padding: 0.9rem 1.3rem;
    }


    .sidebar-logo {
        margin: auto 0;
    }



    #sidebar:not(.expand) .sidebar-logo,
    #sidebar:not(.expand) a.sidebar-link span {
        display: none;
    }

    .sidebar-nav {
        margin-top: 0;
        padding: 0 0;
        background-color: #64acff;
    }

    a.sidebar-link {
        padding: .425rem 1.425rem;
        color: #FFF;
        display: block;
        font-size: 0.9rem;
        white-space: nowrap;
        border-left: 5px solid transparent;
        background-color: #64acff;
    }

    a.sidebar-link:hover {
        background-color: rgba(255, 255, 255, 0.301);
        border-left: 5px solid #002753;
    }

    .sidebar-item {
        position: relative;
        background-color: #64acff;
    }

    #sidebar:not(.expand) .sidebar-item .sidebar-dropdown {
        position: absolute;
        top: 0;
        left: 100px;
        background-color: #002753;
        padding: 0;
        min-width: 11rem;
        display: none;
    }

    #sidebar:not(.expand) .sidebar-item:hover .has-dropdown+.sidebar-dropdown {
        display: block;
        width: 100%;
        opacity: 1;
    }

    #sidebar.expand .sidebar-link[data-bs-toggle="collapse"]::after {
        border: solid;
        border-width: 0 .075rem .075rem 0;
        content: "";
        display: inline-block;
        padding: 2px;
        position: absolute;
        right: 1.5rem;
        transform: rotate(-135deg);
        transition: all .1s ease-out;
    }

    #sidebar.expand .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
        transform: rotate(45deg);
        transition: all .1s ease-out;
    }




    @media  screen and (max-height: 768px) {
        .menuL img {
        height: 32px;
        width: 32px;
    }
    #sidebar.expand {
        width: 220px;
    }
    #sidebar {
        width: 90px;
    }
    #sidebar:not(.expand) .sidebar-item .sidebar-dropdown {
        left: 90px;
    }
}
@media  screen and (min-height: 770px) {
        .menuL img {
        height: 43px;
        width: 43px;
    }
}


</style>

<div class="menuL">
    <aside id="sidebar" class="sidebar-transition">
        <div class="d-flex">
            <button class="toggle-btn" type="button">
                <img class="menuImg" src="img/menu.png" alt="">
            </button>
            <div class="sidebar-logo">
                <h1 class="sidebar-text" style="text-shadow: 0px 0px 4px #002753 ;color:white;">
                    <?php
                    print $tituloPag;
                    ?>
                </h1>
            </div>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item" id="sidebarItem">
                <?php if($tituloPag!='Home')
                echo '
                <a href="telaInicio.php" class="sidebar-link">
                    <img src="img/home.png" alt="">
                    <span class=\"sidebar-text\" style="margin-left:10px;">Home</span>
                </a>'
                ?>
            </li>
            <?php if($_SESSION['tipo_login']=='professor')
                echo '
                <li class="sidebar-item">
                    <a href="telaUsuarios.php" class="sidebar-link">
                        <img src="img/perfil.png" alt="">
                        <span class="sidebar-text" style="margin-left:10px;">Alunos</span>
                    </a>
                </li>'
                ?>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <img src="img/mov03.png">
                        <span class="sidebar-text" style="margin-left:10px;">Movimentações</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <img src="img/Piking.png" alt=""><i class="lni lni-agenda"></i>
                        <span class="sidebar-text" style="margin-left:10px;">Piking</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="armazem.php" class="sidebar-link">
                        <img src="img/armazem_sidebar.png" alt=""><i class="lni lni-agenda"></i>
                        <span class="sidebar-text" style="margin-left:10px;">Estoque</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#Recebimentos" aria-expanded="false" aria-controls="Recebimentos">
                        <img src="img/receb.png" alt="">
                        <span class="sidebar-text" style="margin-left:10px;">Recebimentos</span>
                    </a>
                    <ul id="Recebimentos" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a id="linkContainer" style="margin-bottom: -10px;" href="container.php"
                                class="sidebar-link">Container</a>
                        </li>
                        <li class="sidebar-item">
                            <a style="margin-bottom: -10px;" href="#" class="sidebar-link">Carga</a>
                        </li>
                    </ul>
                </li>
                <?php if($_SESSION['tipo_login']=='professor')
                echo '
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#pedido" aria-expanded="false" aria-controls="Recebimentos">
                        <img src="img/pedidos.png" alt="">
                        <span class="sidebar-text" style="margin-left:10px;">Pedidos</span>
                    </a>
                    <ul id="pedido" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a style="margin-bottom: -10px;" href="produtos.php" class="sidebar-link">Criar pedidos</a>
                        </li>
                        <li class="sidebar-item">
                            <a style="margin-bottom: -10px;" href="#" class="sidebar-link">Ver pedidos</a>
                        </li>
                    </ul>
                </li>'
                ?>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <img src="img/carMov.png" alt="">
                        <span class="sidebar-text" style="margin-left:10px;">Expedição</span>
                    </a>
                </li>
                <?php if($_SESSION['tipo_login']=='professor')
                echo '
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#Nota" aria-expanded="false" aria-controls="Nota">
                        <img src="img/nota.png" alt="">
                        <span class="sidebar-text" style="margin-left:10px;">Nota Fiscal</span>
                    </a>
                    <ul id="Nota" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a style="margin-bottom: -10px;" href="#" class="sidebar-link">Criar Danfe</a>
                        </li>
                        <li class="sidebar-item">
                            <a style="margin-bottom: -10px;" href="#" class="sidebar-link">Minhas Danfe</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <img  src="img/relatorio02.png" alt="">
                        <span class="sidebar-text" style="margin-left:10px;">Relatórios</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <img src="img/confpreto.png" alt="">
                        <span class="sidebar-text" style="margin-left:10px;">Controle</span>
                    </a>
                </li>'
                ?>
        </ul>

    </aside>
</div>
        <script>
            
            if (<?php echo json_encode($_SESSION['tipo_login']); ?> == 'professor') {
                document.getElementById('linkContainer').setAttribute('href', 'containerP.php');
                //Control c + control v a linha de cima colocar um id no texto e mudar o nome do arquivo aqui.
            } else if (<?php echo json_encode($_SESSION['tipo_login']); ?> == 'aluno') {
                document.getElementById('linkContainer').setAttribute('href', 'containerA.php');
                //Control c + control v a linha de cima colocar um id no texto e mudar o nome do arquivo aqui.
            }
        </script>

