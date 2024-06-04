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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                        <div class="presets">
                            <button
                                onclick="setMultipleInputValues({'empresa': 'Portonave', 'nomeCliente': 'Matheus Yan', 'telefone':'4739406838','cep':'88370904','produto':'Teclado','produto2':'Mouse','unidade':'UN','unidade2':'UN','quantidade':'10','quantidade2':'15','valor':'15.00','valor2':'8.00'})">Preset
                                1</button>
                            <button
                                onclick="setMultipleInputValues({'empresa': 'MultiLog', 'nomeCliente': 'Luan Pereira', 'telefone':'4789426155','cep':'23812310','produto':'Motor','produto2':'Óleo Diesel','unidade':'UN','unidade2':'L','quantidade':'15','quantidade2':'30','valor':'2800.00','valor2':'2.40'})">Preset
                                2</button>
                            <button
                                onclick="setMultipleInputValues({'empresa': 'ARXO', 'nomeCliente': 'Henrique Venzon', 'telefone':'4791296865','cep':'88318481','produto':'Camisa','produto2':'Moletom','unidade':'UN','unidade2':'UN','quantidade':'30','quantidade2':'20','valor':'20.00','valor2':'24.00'})">Preset
                                3</button>
                        </div>
                        <form action="processamento/carga.php" method="post">
                            <div class="colunas1">
                                <div class="numeroPedido">
                                    <label for="num">N° pedido:</label>
                                    <input id="num" type="number" name="npedido" min="0" required
                                        placeholder="Obrigatório">
                                </div>
                                <div class="NomeDaEmpresa">
                                    <label for="empresa">Empresa:</label>
                                    <input id="empresa" type="text" name="Empresa" required placeholder="Obrigatório">
                                </div>
                                <div class="cliente">
                                    <label for="nomeCliente">Cliente:</label>
                                    <input id="nomeCliente" type="text" name="Cliente" required
                                        placeholder="Obrigatório">
                                </div>
                                <div class="telefone">
                                    <label for="telefone">Telefone:</label>
                                    <input id="telefone" type="number" name="Telefone" required
                                        placeholder="Obrigatório">
                                </div>
                                <div class="cep">
                                    <label for="cep">CEP:</label>
                                    <input id="cep" type="text" name="CEP" required placeholder="Obrigatório">
                                </div>
                            </div>

                            <div class="colunas">
                                <div class="produto">
                                    <label for="produto">Nome do Produto:</label>
                                    <input type="text" id="produto" name="produto1" required placeholder="Obrigatório">
                                    <input type="text" id="produto2" name="produto2" placeholder="Opcional">
                                    <input type="text" id="produto3" name="produto3" placeholder="Opcional">
                                    <input type="text" id="produto4" name="produto4" placeholder="Opcional">
                                </div>

                                <div class="unidade">
                                    <label for="unidade">Unidade:</label>
                                    <select id="unidade" name="unidade1" required>
                                        <option value="UN">UN</option>
                                        <option value="RL">RL</option>
                                        <option value="FD">FD</option>
                                        <option value="KG">KG</option>
                                        <option value="L">L</option>
                                    </select>
                                    <select id="unidade2" name="unidade2">
                                        <option value=" "> </option>
                                        <option value="UN">UN</option>
                                        <option value="RL">RL</option>
                                        <option value="FD">FD</option>
                                        <option value="KG">KG</option>
                                        <option value="L">L</option>
                                    </select>
                                    <select id="unidade3" name="unidade3">
                                        <option value=" "> </option>
                                        <option value="UN">UN</option>
                                        <option value="RL">RL</option>
                                        <option value="FD">FD</option>
                                        <option value="KG">KG</option>
                                        <option value="L">L</option>
                                    </select>
                                    <select id="unidade4" name="unidade4">
                                        <option value=" "> </option>
                                        <option value="UN">UN</option>
                                        <option value="RL">RL</option>
                                        <option value="FD">FD</option>
                                        <option value="KG">KG</option>
                                        <option value="L">L</option>
                                    </select>
                                </div>

                                <div class="quantidade">
                                    <label for="quantidade">Quantidade:</label>
                                    <input type="number" id="quantidade" name="quantidade1" min="0" required
                                        placeholder="Obrigatório">
                                    <input type="number" id="quantidade2" name="quantidade2" min="0"
                                        placeholder="Opcional">
                                    <input type="number" id="quantidade3" name="quantidade3" min="0"
                                        placeholder="Opcional">
                                    <input type="number" id="quantidade4" name="quantidade4" min="0"
                                        placeholder="Opcional">
                                </div>

                                <div class="valor">
                                    <label for="valor">Valor Unitário:</label>
                                    <input type="number" id="valor" name="valor1" step="0.01" required
                                        placeholder="Obrigatório">
                                    <input type="number" id="valor2" name="valor2" step="0.01" placeholder="Opcional">
                                    <input type="number" id="valor3" name="valor3" step="0.01" placeholder="Opcional">
                                    <input type="number" id="valor4" name="valor4" step="0.01" placeholder="Opcional">
                                </div>

                                <div class="ncm">
                                    <label for="ncm">NCM:</label>
                                    <input type="text" id="ncm" name="ncm1" placeholder="Opcional">
                                    <input type="text" id="ncm2" name="ncm2" placeholder="Opcional">
                                    <input type="text" id="ncm3" name="ncm3" placeholder="Opcional">
                                    <input type="text" id="ncm4" name="ncm4" placeholder="Opcional">
                                </div>

                                <div class="cst">
                                    <label for="cst">CST:</label>
                                    <input type="text" id="cst" name="cst1" placeholder="Opcional">
                                    <input type="text" id="cst2" name="cst2" placeholder="Opcional">
                                    <input type="text" id="cst3" name="cst3" placeholder="Opcional">
                                    <input type="text" id="cst4" name="cst4" placeholder="Opcional">
                                </div>

                                <div class="cfop">
                                    <label for="cfop">CFOP:</label>
                                    <input type="text" id="cfop" name="cfop1" placeholder="Opcional">
                                    <input type="text" id="cfop2" name="cfop2" placeholder="Opcional">
                                    <input type="text" id="cfop3" name="cfop3" placeholder="Opcional">
                                    <input type="text" id="cfop4" name="cfop4" placeholder="Opcional">
                                </div>
                            </div>
                            <div class="enviar">
                                <input type="submit" onclick="exibirMensagem()">
                            </div>
                        </form>

                        <form action="processamento/processarcontainer.php" method="post">
                            <div class="transportes">
                                <h1>Cadastro de Transportes</h1>
                            </div>

                            <div class="inputs">
                                <div class="juntar">
                                    <label for="placa">Placa do Caminhão:</label>
                                    <input type="text" name="placa" placeholder="Obrigatório" required>
                                </div>
                                <div class="juntar">
                                    <label for="">Cliente:</label>
                                    <input type="text" name="cliente" placeholder="Obrigatório">
                                </div>
                                <div class="juntar">
                                    <label for="nome">Nome do Motorista:</label>
                                    <input type="text" name="NomeMotorista" placeholder="Obrigatório" required>
                                </div>
                                <div class="juntar">
                                    <label for="container">Container:</label>
                                    <input type="text" name="container" placeholder="Obrigatório" required>
                                </div>
                                <div class="juntar">
                                    <label for="navio">Navio:</label>
                                    <input type="text" name="navio" placeholder="Obrigatório" required>
                                </div>

                                <div class="juntar">
                                    <label for="tipo">Tipo:</label>
                                    <input type="text" name="tipo" placeholder="Obrigatório" required>
                                </div>
                                <div class="juntar">
                                    <label for="lacre">Lacre:</label>
                                    <input type="text" name="lacre" placeholder="Obrigatório" required>
                                </div>
                                <div class="juntar">
                                    <label for="">Temperatura:</label>
                                    <input type="text" name="temperatura" placeholder="Opcional">
                                </div>
                                <div class="juntar">
                                    <label for="">Lacre SIF:</label>
                                    <input type="text" name="LacreSif" placeholder="Opciona">
                                </div>

                                <div class="juntar">
                                    <label for="">IMO:</label>
                                    <input type="text" name="IMD" placeholder="Opcional">
                                </div>
                                <div class="juntar">
                                    <label for="">N° ONU:</label>
                                    <input type="text" name="NOnu" placeholder="Opcional">
                                </div>
                            </div>
                            <div class="inputObs">
                                <div>
                                    <label for="Observacao">Observação</label>
                                </div>
                                <input id="Observacao" type="text" placeholder="Opcional">
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

    <script src="js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script>
        function setMultipleInputValues(values) {
            for (var id in values) {
                var inputElement = document.getElementById(id);
                if (inputElement) {
                    inputElement.value = values[id];
                } else {
                    console.log("Elemento com ID " + id + " não encontrado.");
                }
            }
        }

        function checkAndUpdateUnitSelect(productId, unitId) {
            var productInput = document.getElementById(productId);
            var unitSelect = document.getElementById(unitId);
            if (productInput && unitSelect) {
                productInput.addEventListener('input', function () {
                    if (productInput.value.trim() !== '') {
                        if (unitSelect.value.trim() === '') {
                            unitSelect.value = 'UN';
                        }
                    }
                });
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            checkAndUpdateUnitSelect('produto', 'unidade');
            checkAndUpdateUnitSelect('produto2', 'unidade2');
            checkAndUpdateUnitSelect('produto3', 'unidade3');
            checkAndUpdateUnitSelect('produto4', 'unidade4');
        });
    </script>
</body>

</html>
