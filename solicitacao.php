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
    $tituloPag = 'Solicitação';
    echo "$tituloPag";
    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/solicitacao.css">
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
                <div class="txtCont">
                    <h1>Solicitação</h1>
                </div>

                <div class="form">
                    <div class="tabela-scroll">
                        
                        <form action="" method="post">
                        <div class="colunas">
                                <div class="numeroPedido">
                                    <label for="num">N° pedido:</label>
                                    <input id="num" type="number" name="npedido" min="0" required placeholder="Obrigatório">
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
                            </div>
                       <div class="inputObs">
                                <div>
                                    <label for="Observacao">Observação</label>
                                </div>
                                <input id="Observacao" type="text" placeholder="Opcional">
                            </div>

                            <div class="enviar">
                                <input type="submit" >
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