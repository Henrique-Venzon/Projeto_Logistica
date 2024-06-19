<?php
session_start();
if (!isset($_SESSION['id']) || !isset($_SESSION['turma'])) {
    header("Location: index.php");
    exit;
}

// Conexão com o banco de dados
$servername = "localhost";
$username = "root.Att";
$password = "root";
$dbname = "logistica";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT DISTINCT nome_produto FROM estoque WHERE id_turma=".$_SESSION['turma']."";
$result = $conn->query($sql);
$options = "";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $options .= "<option value='" . $row['nome_produto'] . "'>" . $row['nome_produto'] . "</option>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/amem.svg">
    <meta charset="utf-8">
    <title><?php $tituloPag = 'Solicitação'; echo 'Solicitação'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/solicitacao.css">
</head>

<body>
    <?php include 'include/header.php'; ?>
    <main>
        <?php include 'include/menuLateral.php'; ?>

        <div class="DivDireita">
            <div class="table-inputs">
                <div class="txtCont">
                    <h1>Solicitação</h1>
                </div>
                    <div class="tabela-scroll">
                        <form id="solicitacaoForm" action="processamento/processosolicitacao.php" method="POST">
                            <div class="colunas">
                                <div class="numeroPedido">
                                    <label for="num">N° pedido:</label>
                                    <input id="num" type="number" name="npedido" min="0" required placeholder="Obrigatório">
                                </div>
                            </div>
                            <div class="colunas">
                                <div class="produto">
                                    <label for="produto">Nome do Produto:</label>
                                    <select id="produto" name="produto" required>
                                        <?php echo $options; ?>
                                    </select>
                                    <select id="produto2" name="produto2">
                                        <option value=""></option>
                                        <?php echo $options; ?>
                                    </select>
                                    <select id="produto3" name="produto3">
                                        <option value=""></option>
                                        <?php echo $options; ?>
                                    </select>
                                    <select id="produto4" name="produto4">
                                        <option value=""></option>
                                        <?php echo $options; ?>
                                    </select>
                                </div>

                                <div class="quantidade">
                                    <label for="quantidade">Quantidade:</label>
                                    <input type="number" id="quantidade" name="quantidade" min="0" required placeholder="Obrigatório">
                                    <input type="number" id="quantidade2" name="quantidade2" min="0" placeholder="Opcional">
                                    <input type="number" id="quantidade3" name="quantidade3" min="0" placeholder="Opcional">
                                    <input type="number" id="quantidade4" name="quantidade4" min="0" placeholder="Opcional">
                                </div>                          
                            </div>
                            <div class="inputObs">
                                <div>
                                    <label for="Observacao">Observação</label>
                                </div>
                                <input id="Observacao" type="text" name="observacao" placeholder="Opcional">
                            </div>

                            <div class="enviar">
                                <input type="submit" value="Enviar">
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </main>

    <script src="js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script>
        function validateForm() {
            let form = document.getElementById('solicitacaoForm');
            let produto2 = document.getElementById('produto2').value.trim();
            let quantidade2 = document.getElementById('quantidade2').value.trim();
            let produto3 = document.getElementById('produto3').value.trim();
            let quantidade3 = document.getElementById('quantidade3').value.trim();
            let produto4 = document.getElementById('produto4').value.trim();
            let quantidade4 = document.getElementById('quantidade4').value.trim();

            if ((produto2 && !quantidade2) || (!produto2 && quantidade2)) {
                alert("Se um produto opcional for selecionado, a quantidade correspondente deve ser preenchida e vice-versa.");
                return false;
            }
            if ((produto3 && !quantidade3) || (!produto3 && quantidade3)) {
                alert("Se um produto opcional for selecionado, a quantidade correspondente deve ser preenchida e vice-versa.");
                return false;
            }
            if ((produto4 && !quantidade4) || (!produto4 && quantidade4)) {
                alert("Se um produto opcional for selecionado, a quantidade correspondente deve ser preenchida e vice-versa.");
                return false;
            }
            return true;
        }

        document.getElementById('solicitacaoForm').onsubmit = validateForm;
    </script>
</body>
</html>

<?php
$conn->close();
?>
