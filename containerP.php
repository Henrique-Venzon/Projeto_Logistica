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
    <link rel="stylesheet" href="css/responsividade/criarpedidoResponsivo.css">

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

                <h1 id="verSku">SKUS</h1>

                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <?php

                        $hostname = "127.0.0.1";
                        $user = "root.Att";
                        $password = "root";
                        $database = "logistica";

                        // Estabelece a conexão
                        $conexao = new mysqli($hostname, $user, $password, $database);

                        // Verifica se houve um erro na conexão
                        if ($conexao->connect_error) {
                            die("Conexão falhou: " . $conexao->connect_error);
                        }

                        // Consulta SQL para buscar os dados da tabela produto
                        $sql = "SELECT id, nome_produto, preco FROM produto";
                        $resultado = $conexao->query($sql);

                        // Verifica se há resultados e, se houver, preenche a tabela
                        if ($resultado->num_rows > 0) {
                            echo '<span class="close">&times;</span>';
                            echo '<table>';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th>ID</th>';
                            echo '<th>Produto</th>';
                            echo '<th>Preço</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';

                            // Preenche a tabela com os dados
                            while ($row = $resultado->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $row["id"] . '</td>';
                                echo '<td>' . $row["nome_produto"] . '</td>';
                                echo '<td>' . $row["preco"] . '</td>';
                                echo '</tr>';
                            }

                            echo '</tbody>';
                            echo '</table>';
                        } else {
                            echo '<div class="flexresult">';
                            echo '<span class="close close1">&times;</span>';
                            echo "<h1 class=\"resultado\">Nenhuma sku cadastrada</h1>";
                            echo '</div>';
                        }

                        // Fecha a conexão
                        $conexao->close();

                        ?>
                    </div>
                </div>

                <div class="txtCont">
                    <h1>Criar pedido</h1>
                </div>

                <div class="form">
                    <div class="tabela-scroll">
                        <div class="presets">
                            <button
                                onclick="setMultipleInputValues({'empresa': 'Portonave', 'nomeCliente': 'Matheus Yan', 'telefone':'4740028922','cep':'88370904'})">Preset
                                1</button>
                            <button
                                onclick="setMultipleInputValues({'empresa': 'MultiLog', 'nomeCliente': 'Luan Pereira', 'telefone':'4789426155','cep':'23812310'})">Preset
                                2</button>
                            <button
                                onclick="setMultipleInputValues({'empresa': 'ARXO', 'nomeCliente': 'Henrique Venzon', 'telefone':'4791296865','cep':'88318481'})">Preset
                                3</button>
                        </div>
                        <form action="processamento/carga.php" method="post">
                            <div class="colunas1 colunadata coluna1cell">
                                <div class="numeroPedido">
                                    <label for="num">N° pedido:</label>
                                    <input id="num" type="number" name="npedido" min="0" required
                                        placeholder="Obrigatório">
                                </div>
                                <div class="inicio">
                                    <label for="inicio">Data do Pedido:</label>
                                    <input id="inicio" type="date" name="data_pedido" required
                                        placeholder="Obrigatório">
                                </div>
                                <div class="entrega">
                                    <label for="entrega">Data de entrega:</label>
                                    <input id="entrega" type="date" name="data_entrega" required
                                        placeholder="Obrigatório">
                                </div>
                            </div>
                            <div class="colunas1">
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
                                <div class="divisaoPhone">
                                <div class="sku">
                                    <label for="sku">Sku:</label>
                                    <input class="sku" type="text" id="sku1" name="sku1" placeholder="Opcional">
                                    <input class="sku" type="text" id="sku2" name="sku2" placeholder="Opcional">
                                    <input class="sku" type="text" id="sku3" name="sku3" placeholder="Opcional">
                                    <input class="sku" type="text" id="sku4" name="sku4" placeholder="Opcional">
                                </div>
                                <div class="produto">
                                    <label for="produto">Nome do Produto:</label>
                                    <input type="text" id="produto1" name="produto1" required placeholder="Obrigatório">
                                    <input type="text" id="produto2" name="produto2" placeholder="Opcional">
                                    <input type="text" id="produto3" name="produto3" placeholder="Opcional">
                                    <input type="text" id="produto4" name="produto4" placeholder="Opcional">
                                </div>

                                <div class="unidade">
                                    <label for="unidade">Unidade:</label>
                                    <select id="unidade1" name="unidade1" required>
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
                                    <input type="number" id="quantidade1" name="quantidade1" min="0" required
                                        placeholder="Obrigatório">
                                    <input type="number" id="quantidade2" name="quantidade2" min="0"
                                        placeholder="Opcional">
                                    <input type="number" id="quantidade3" name="quantidade3" min="0"
                                        placeholder="Opcional">
                                    <input type="number" id="quantidade4" name="quantidade4" min="0"
                                        placeholder="Opcional">
                                </div>
                                </div>                                
                                <div class="divisaoPhone">
                                <div class="valor">
                                    <label for="valor">Valor Unitário:</label>
                                    <input type="number" id="valor1" name="valor1" step="0.01" required
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
                            </div>
                            <div class="enviar">
                                <input type="submit" onclick="exibirMensagem()">
                            </div>
                        </form>
                        <br>
                        <br>
                        <br>
                        <div class="transportes">
                        <h1>Cadastro de Transportes</h1>
                        </div>
                        <div class="presets">
                        <button
                        onclick="setMultipleInputValues({'placa': '5568', 'cliente': 'Matheus Yan', 'NomeMotorista':'Luan','container':'88370904','navio': 'trivia', 'tipo': 'agua', 'lacre' : 'acido', 'temperatura' : '0 kelvin ', 'LacreSif' : '079', 'IMD': '341242', 'NOnu' : '12312' , 'Observacao': 'Veio manchado'})">Preset
                        1</button>
                        <button
                        onclick="setMultipleInputValues({'placa': '34O53B', 'cliente': 'Henrique Benzao', 'NomeMotorista':'Luan','container':'1434235702','navio': 'trivia alpha', 'tipo': 'sólido', 'lacre' : '9984', 'temperatura' : '22', 'LacreSif' : '5353', 'IMD': '33441', 'NOnu' : '12312' , 'Observacao': ''})">Preset
                        2</button>
                        <button
                        onclick="setMultipleInputValues({'placa': '5568', 'cliente': 'Matheus Yan', 'NomeMotorista':'Luan','container':'5235542','navio': 'trivia Omega', 'tipo': 'quimico', 'lacre' : '325253', 'temperatura' : '33 ', 'LacreSif' : '4332', 'IMD': '341242', 'NOnu' : '12312' , 'Observacao': ''})">Preset
                        3</button>
                        
                        
                        
                        
                        
                    </div>
                        <form action="processamento/processarcontainer.php" method="post">
                    

                            <div class="inputs">
                                <div class="juntar">
                                    <label for="placa">Placa do Caminhão:</label>
                                    <input type="text" name="placa" id="placa" placeholder="Obrigatório" required>
                                </div>
                                <div class="juntar">
                                    <label for="">Cliente:</label>
                                    <input type="text" name="cliente" id="cliente" placeholder="Obrigatório">
                                </div>
                                <div class="juntar">
                                    <label for="nome">Nome do Motorista:</label>
                                    <input type="text" name="NomeMotorista" id="NomeMotorista" placeholder="Obrigatório" required>
                                </div>
                                <div class="juntar">
                                    <label for="container">Container:</label>
                                    <input type="text" name="container"  id="container" placeholder="Obrigatório" required>
                                </div>
                                <div class="juntar">
                                    <label for="navio">Navio:</label>
                                    <input type="text" name="navio" id="navio" placeholder="Obrigatório" required>
                                </div>

                                <div class="juntar">
                                    <label for="tipo">Tipo:</label>
                                    <input type="text" name="tipo" id="tipo" placeholder="Obrigatório" required>
                                </div>
                                <div class="juntar">
                                    <label for="lacre">Lacre:</label>
                                    <input type="text" name="lacre" id="lacre" placeholder="Obrigatório" required>
                                </div>
                                <div class="juntar">
                                    <label for="">Temperatura:</label>
                                    <input type="text" name="temperatura" id="temperatura" placeholder="Opcional">
                                </div>
                                <div class="juntar">
                                    <label for="">Lacre SIF:</label>
                                    <input type="text" name="LacreSif" id="LacreSif" placeholder="Opcional">
                                </div>

                                <div class="juntar">
                                    <label for="">IMO:</label>
                                    <input type="text" name="IMD" id="IMD" placeholder="Opcional">
                                </div>
                                <div class="juntar">
                                    <label for="">N° ONU:</label>
                                    <input type="text" name="NOnu" id="NOnu" placeholder="Opcional">
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
    <script src="js/modal.js"></script>
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
            var skuInputs = document.querySelectorAll('input[id^="sku"]');

            skuInputs.forEach(function (input) {
                input.addEventListener('input', function () {
                    var sku = this.value;

                    if (sku) {
                        fetch('processamento/buscar_produto.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: 'sku=' + sku
                        })
                            .then(response => response.json())
                            .then(data => {
                                var produtoIndex = this.id.match(/\d+/)[0];
                                var produtoInput = document.getElementById('produto' + produtoIndex);
                                var valorInput = document.getElementById('valor' + produtoIndex);
                                var unidadeSelect = document.getElementById('unidade' + produtoIndex);

                                if (produtoInput) {
                                    produtoInput.value = data.nome_produto;
                                }
                                if (valorInput) {
                                    valorInput.value = data.preco;
                                }
                                if (unidadeSelect && unidadeSelect.value.trim() === '') {
                                    unidadeSelect.value = 'UN';
                                }
                            })
                            .catch(error => console.error('Erro:', error));
                    }
                });
            });

            checkAndUpdateUnitSelect('produto', 'unidade');
            checkAndUpdateUnitSelect('produto2', 'unidade2');
            checkAndUpdateUnitSelect('produto3', 'unidade3');
            checkAndUpdateUnitSelect('produto4', 'unidade4');
        });

    </script>
</body>

</html>