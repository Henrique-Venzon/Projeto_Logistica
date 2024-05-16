<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}
if (!isset($_SESSION['turma'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>

<head>
    <meta name="vierport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/amem.svg">

    <meta charset="utf-8">
    <title><?php
    $tituloPag = 'Container';
    echo "$tituloPag";
    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <meta name="vierport" content="width=device-width, initial-scale=1.0">

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
            <span class="tooltip-container">
            <i class="fa-regular fa-circle-question"></i>
        <span class="tooltip">Insira os dados para criar o pedido!</span>
    </span>
                <div class="txtCont">
                    <h1>Criar pedido</h1>
                </div>

                <div class="form">
                    <div class="tabela-scroll">
                        <form action="processamento/processarcontainer.php" method="post">
                            <div class="colunas1">
                                <div class="numeroPedido">
                                    <label for="num">N° pedido:</label>
                                    <input id="num" type="number" name="npedido" min="0" required>
                                </div>
                                <div class="NomeDaEmpresa">
                                    <label for="empresa">Empresa:</label>
                                    <input id="empresa" type="text" name="Empresa" required>
                                </div>
                                <div class="cliente">
                                    <label for="nomeCliente">Cliente:</label>
                                    <input id="nomeCliente" type="text" name="Cliente" required>
                                </div>
                                <div class="telefone">
                                    <label for="telefone">Telefone:</label>
                                    <input id="telefone" type="number" name="Telefone" required>
                                </div>
                                <div class="cep">
                                    <label for="cep">CEP:</label>
                                    <input id="cep" type="text" name="CEP" required>
                                </div>
                            </div>

                            <div class="colunas">
                                <div class="produto">
                                    <label for="produto">Nome do Produto:</label>
                                    <input type="text" id="produto" name="produto1" required>
                                    <input type="text" id="produto" name="produto2">
                                    <input type="text" id="produto" name="produto3">
                                    <input type="text" id="produto" name="produto4">
                                </div>

                                <div class="unidade">
                                    <label for="unidade">Unidade:</label>
                                    <select id="unidade" name="unidade1" required>
                                        <option value="UN">UN</option>
                                        <option value="RL">RL</option>
                                        <option value="FD">FD</option>
                                        <option value="KG">KG</option>
                                    </select>
                                    <select id="unidade" name="unidade2">
                                        <?php // <?php if ($produto2==' ') print "<option value=' '> </option>" ?> 
                                        <option value=" "> </option>
                                        <option value="UN">UN</option>
                                        <option value="RL">RL</option>
                                        <option value="FD">FD</option>
                                        <option value="KG">KG</option>
                                    </select>
                                    <select id="unidade" name="unidade3">
                                        <option value=" "> </option>
                                        <option value="UN">UN</option>
                                        <option value="RL">RL</option>
                                        <option value="FD">FD</option>
                                        <option value="KG">KG</option>
                                    </select>
                                    <select id="unidade" name="unidade4">
                                        <option value=" "> </option>
                                        <option value="UN">UN</option>
                                        <option value="RL">RL</option>
                                        <option value="FD">FD</option>
                                        <option value="KG">KG</option>
                                    </select>
                                </div>

                                <div class="quantidade">
                                    <label for="quantidade">Quantidade:</label>
                                    <input type="number" id="quantidade" name="quantidade1" min="0" required>
                                    <input type="number" id="quantidade" name="quantidade2" min="0">
                                    <input type="number" id="quantidade" name="quantidade3" min="0">
                                    <input type="number" id="quantidade" name="quantidade4" min="0">
                                </div>

                                <div class="valor">
                                    <label for="valor">Valor Unitário:</label>
                                    <input type="number" id="valor" name="valor1" step="0.01" required>
                                    <input type="number" id="valor" name="valor2" step="0.01">
                                    <input type="number" id="valor" name="valor3" step="0.01">
                                    <input type="number" id="valor" name="valor4" step="0.01">
                                </div>

                                <div class="ncm">
                                    <label for="ncm">NCM:</label>
                                    <input type="text" id="ncm" name="ncm1" required>
                                    <input type="text" id="ncm" name="ncm2">
                                    <input type="text" id="ncm" name="ncm3">
                                    <input type="text" id="ncm" name="ncm4">
                                </div>

                                <div class="cst">
                                    <label for="cst">CST:</label>
                                    <input type="text" id="cst" name="cst1" required>
                                    <input type="text" id="cst" name="cst2">
                                    <input type="text" id="cst" name="cst3">
                                    <input type="text" id="cst" name="cst4">
                                </div>

                                <div class="cfop">
                                    <label for="cfop">CFOP:</label>
                                    <input type="text" id="cfop" name="cfop1" required>
                                    <input type="text" id="cfop" name="cfop2">
                                    <input type="text" id="cfop" name="cfop3">
                                    <input type="text" id="cfop" name="cfop4">
                                </div>
                            </div>


                            <div class="transportes">
                                <h1>Cadastro de Transportes</h1>
                            </div>


                            <div class="inputs">
                                <div class="juntar">
                                    <label for="">Placa do Caminhão:</label>
                                    <input type="text" name="placa" placeholder="Placa do Caminhão" required>
                                </div>
                                <div class="juntar">
                                    <label for="">Temperatura:</label>
                                    <input type="text" name="temperatura" placeholder="Temperatura" required>
                                </div>
                                <div class="juntar">
                                    <label for="">Nome do Motorista:</label>
                                    <input type="text" name="NomeMotorista" placeholder="Nome do Motorista" required>
                                </div>
                                <div class="juntar">
                                    <label for="">Container:</label>
                                    <input type="text" name="container" placeholder="Container" required>
                                </div>
                                <div class="juntar">
                                    <label for="">Navio:</label>
                                    <input type="text" name="navio" placeholder="Navio" required>
                                </div>

                                <div class="juntar">
                                    <label for="">Tipo:</label>
                                    <input type="text" name="tipo" placeholder="Tipo" required>
                                </div>
                                <div class="juntar">
                                    <label for="">Lacre:</label>
                                    <input type="text" name="lacre" placeholder="Lacre" required>
                                </div>
                                <div class="juntar">
                                    <label for="">Lacre SIF:</label>
                                    <input type="text" name="LacreSif" placeholder="Lacre SIF" required>
                                </div>

                                <div class="juntar">
                                    <label for="">IMO:</label>
                                    <input type="text" name="IMD" placeholder="IMO" required>
                                </div>
                                <div class="juntar">
                                    <label for="">N° ONU:</label>
                                    <input type="text" name="NOnu" placeholder="N° ONU" required>
                                </div>
                            </div>
                            <div class="inputObs">
                                <div>
                                    <label for="">Observação</label>
                                </div>
                                <input type="text">
                            </div>
                            

                            <div class="enviar">
                                <input type="submit" onclick="exibirMensagem()">
                            </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>

    </main>


    <script>
        function exibirMensagem() {
            alert('Dados enviados com sucesso!');
        }
    </script>
    <script src="js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>
