<link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/6934df05fc.js" crossorigin="anonymous"></script>

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
        height: 92.05vh;
        background-color: #1c1c1c;
    }



    .d-flex {
        display: flex;
        margin-top: -10px;
        margin-bottom: 0px;
    }


    #sidebar {
        width: 100px;
        z-index: 13;
        transition:  .05s ease-out;
        background-color: #1c1c1c;
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
        align-items: center;
    }
    .toggle-btn i {
        margin-left:17px ;
        font-size: 37px;
        color: white;
    }
    i{
        font-size: 36px;
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
        background-color: #1c1c1c;
    }

    a.sidebar-link {
        padding: .425rem 1.425rem;
        color: #FFF;
        display: block;
        font-size: 0.9rem;
        white-space: nowrap;
        border-left: 5px solid transparent;
        background-color: #1c1c1c;
    }

    a.sidebar-link:hover {
        background-color: rgba(255, 255, 255, 0.301);
        border-left: 5px solid #fff;
    }

    .sidebar-item {
        position: relative;
        background-color: #1c1c1c;
    }

    #sidebar:not(.expand) .sidebar-item .sidebar-dropdown {
        position: absolute;
        top: 0;
        left: 100px;
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
        .toggle-btn i {
        margin-left:12px ;
        font-size: 28px;
        color: white;
    }
        i{
        font-size: 24.5px;
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
@media only screen and( min-height:769px) and (max-height:859px) {

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
@media  screen and (min-height: 860px) {

    .sidebar-item{
        margin-top: 0.7%;
        margin-bottom: 0.8%;
    }
    a.sidebar-link {

        font-size: 1.2rem;

    }

}
.fa-house{
    margin-left: 5px;
    margin-right: 5px;
}
.fa-user{
    margin-left: 10px;
    margin-right: 5px;
}
.fa-route{
    margin-left: 6px;
    margin-right: 5px;
}
.fa-boxes-packing{
    margin-left: 2px;
    margin-right: 5px;
}
.fa-warehouse{
    margin-left: 3px;
    margin-right: 5px;
}
.fa-hand-holding-hand{
    margin-left: 4px;
    margin-right: 5px;
}
.fa-box{
    margin-left: 8px;
    margin-right: 5px;
}
.fa-truck-front{
    margin-left: 6px;
    margin-right: 5px;
}
.fa-receipt{
    margin-left: 10px;
    margin-right: 5px;
}
.fa-clipboard{
    margin-left: 10px;
    margin-right: 5px;
}
.fa-gear{
    margin-left: 6px;
    margin-right: 5px;
}
</style>

<div class="menuL">
    <aside id="sidebar" class="sidebar-transition">
        <div class="d-flex">
            <button class="toggle-btn" type="button">
            <i class="fa-solid fa-bars"></i>
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
                <a href="telaInicio.php" class="sidebar-link">
                <i class="fa-solid fa-house"></i>
                <span class="sidebar-text" style="margin-left:10px;">Home</span>
                </a>
                
            </li>
            <?php if($_SESSION['tipo_login']=='professor')
                echo '
                <li class="sidebar-item">
                    <a href="telaUsuarios.php" class="sidebar-link">
                    <i class="fa-solid fa-user"></i>
                        <span class="sidebar-text" style="margin-left:10px;">Alunos</span>
                    </a>
                </li>'
                ?>

                <li class="sidebar-item">
                    <a href="docas.php" class="sidebar-link">
                    <i class="fa-solid fa-route"></i>
                    <span class="sidebar-text" style="margin-left:10px;">Movimentações</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-boxes-packing"></i>
                        <span class="sidebar-text" style="margin-left:10px;">Piking</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="armazem.php" class="sidebar-link">
                    <i class="fa-solid fa-warehouse"></i>
                        <span class="sidebar-text" style="margin-left:10px;">Estoque</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#Recebimentos" aria-expanded="false" aria-controls="Recebimentos">
                        <i class="fa-solid fa-hand-holding-hand"></i>
                        <span class="sidebar-text" style="margin-left:10px;">Recebimentos</span>
                    </a>
                    <ul id="Recebimentos" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a id="linkContainer" style="margin-bottom: -1.4px;" href="container.php"
                                class="sidebar-link">Container</a>
                        </li>
                        <li class="sidebar-item">
                            <a  href="#" style="margin-top: -1.4px;" class="sidebar-link">Carga</a>
                        </li>
                    </ul>
                </li>
                <?php if($_SESSION['tipo_login']=='professor')
                echo '
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#pedido" aria-expanded="false" aria-controls="Recebimentos">
                        <i class="fa-solid fa-box"></i>
                        <span class="sidebar-text" style="margin-left:10px;">Pedidos</span>
                    </a>
                    <ul id="pedido" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a style="margin-bottom: -1.25px;" href="produtos.php" class="sidebar-link">Criar pedidos</a>
                        </li>
                        <li class="sidebar-item">
                            <a style="margin-top: -1.25px;" href="verPedido.php" class="sidebar-link">Ver pedidos</a>
                        </li>
                    </ul>
                </li>'
                ?>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-truck-front"></i>
                        <span class="sidebar-text" style="margin-left:10px;">Expedição</span>
                    </a>
                </li>
                <?php if($_SESSION['tipo_login']=='professor')
                echo '
                <li class="sidebar-item">
                <a href="notaf.php" class="sidebar-link">
                <i class="fa-solid fa-receipt"></i>
                    <span class="sidebar-text" style="margin-left:10px;">Nota Fiscal</span>
                </a>
            </li>
                

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-clipboard"></i>
                        <span class="sidebar-text" style="margin-left:10px;">Relatórios</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-gear"></i>
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

