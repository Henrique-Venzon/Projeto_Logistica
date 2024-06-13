<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}

$servername = "localhost";
$username = "root.Att";
$password = "root";
$dbname = "logistica";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$turma = $_SESSION['turma'];
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];

    $stmt = $conn->prepare("SELECT * FROM estoque WHERE nome_produto = ? AND id_turma = ? AND quantidade_enviada > 0");
    $stmt->bind_param("si", $produto, $turma);

    $stmt->execute();

    $result = $stmt->get_result();

    $posicoes = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $posicoes[] = array(
                'posicao' => $row["posicao"],
                'quantidade_enviada' => $row["quantidade_enviada"]
            );
        }
    }
    echo "<script>var posicoes = " . json_encode($posicoes) . ";</script>";
    echo "<script>var quantidade_pesquisada = $quantidade;</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/amem.svg">
    <title><?php
    $tituloPag = 'Estoque';
    echo $tituloPag; ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/estoque.css">
</head>

<body>
    <?php include 'include/header.php'; ?>
    <main>
        <?php include 'include/menuLateral.php'; ?>
        <div class="DivDireita">
            <div class="table-inputs">
                <span class="tooltip-container">
                    <i class="fa-regular fa-circle-question"></i>
                    <span class="tooltip">Cor Preta: Não tem o produto pesquisado.<br>
                        Cor Vermelha: Quantidade insuficiente.<br>
                        Cor Ciano: Quantidade exata.<br>
                        Cor Verde: Quantidade a mais.<br>

                    </span>
                </span>
                <h1 id="voltar">voltar</h1>
                <div class="text">
                    <h1>Estoque</h1>
                </div>
                <div class="stock">
                    <div class="tabelaPesquisa">
                        <div class="pesquisa">
                            <form id="formPesquisa" method="post" action="">
                                <h1>Pesquisa</h1>
                                <input class="input1" type="text" name="produto" required placeholder="Produto">
                                <input class="input2" type="text" name="quantidade" required placeholder="Quantidade">
                                <button class="buttonPesquisa">Pesquisar</button>
                            </form>
                        </div>
                    </div>
                    <div class="tabelaPosicoes">
                        <div class="posicoes">
                            <div class="card a1" id="a1">
                                <h1>A1</h1>
                            </div>
                            <div class="card a2" id="a2">
                                <h1>A2</h1>
                            </div>
                            <div class="card a3" id="a3">
                                <h1>A3</h1>
                            </div>
                            <div class="card a4" id="a4">
                                <h1>A4</h1>
                            </div>
                            <div class="card b1" id="b1">
                                <h1>B1</h1>
                            </div>
                            <div class="card b2" id="b2">
                                <h1>B2</h1>
                            </div>
                            <div class="card b3" id="b3">
                                <h1>B3</h1>
                            </div>
                            <div class="card b4" id="b4">
                                <h1>B4</h1>
                            </div>
                            <div class="card c1" id="c1">
                                <h1>C1</h1>
                            </div>
                            <div class="card c2" id="c2">
                                <h1>C2</h1>
                            </div>
                            <div class="card c3" id="c3">
                                <h1>C3</h1>
                            </div>
                            <div class="card c4" id="c4">
                                <h1>C4</h1>
                            </div>
                            <div class="card d1" id="d1">
                                <h1>D1</h1>
                            </div>
                            <div class="card d2" id="d2">
                                <h1>D2</h1>
                            </div>
                            <div class="card d3" id="d3">
                                <h1>D3</h1>
                            </div>
                            <div class="card d4" id="d4">
                                <h1>D4</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/stock.js"></script>
    <script src="js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

</body>

</html>