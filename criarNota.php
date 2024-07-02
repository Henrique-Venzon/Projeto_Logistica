<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}
if (($_SESSION['tipo_login'] != 'professor')) {
    header("Location: index.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npedido_ver = $_POST['turma'];
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
    $tituloPag = 'Ver Pedidos';
    echo "$tituloPag";
    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="css/nPedido.css">
</head>

<body>
<?php
  include_once('include/conexao.php');

$sql = "SELECT `placa`, `NomeMotorista`, `container`, `navio`, `tipo`, `lacre`, `LacreSif`, `IMD`, `NOnu`, `npedido`, `Empresa`, `cliente`, `telefone`, `CEP`, `produto1`, `produto2`, `produto3`, `produto4`, `unidade1`, `unidade2`, `unidade3`, `unidade4`, `quantidade1`, `quantidade2`, `quantidade3`, `quantidade4`, `valor1`, `valor2`, `valor3`, `valor4`, `ncm1`, `ncm2`, `ncm3`, `ncm4`, `cst1`, `cst2`, `cst3`, `cst4`, `cfop1`, `cfop2`, `cfop3`, `cfop4`, `Temperatura`, `turma_id` FROM transporte where turma_id = '".$_SESSION['turma']."' and `npedido`='" . $npedido_ver . "'  ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $placa = $row['placa'];
        $NomeMotorista = $row['NomeMotorista'];
        $container = $row['container'];
        $navio = $row['navio'];
        $tipo = $row['tipo'];
        $lacre = $row['lacre'];
        $LacreSif = $row['LacreSif'];
        $IMD = $row['IMD'];
        $NOnu = $row['NOnu'];
        $npedido = $row['npedido'];
        $Empresa = $row['Empresa'];
        $cliente = $row['cliente'];
        $telefone = $row['telefone'];
        $CEP = $row['CEP'];
        $produto1 = $row['produto1'];
        $produto2 = $row['produto2'];
        $produto3 = $row['produto3'];
        $produto4 = $row['produto4'];
        $unidade1 = $row['unidade1'];
        $unidade2 = $row['unidade2'];
        $unidade3 = $row['unidade3'];
        $unidade4 = $row['unidade4'];
        $quantidade1 = $row['quantidade1'];
        $quantidade2 = $row['quantidade2'];
        $quantidade3 = $row['quantidade3'];
        $quantidade4 = $row['quantidade4'];
        $valor1 = $row['valor1'];
        $valor2 = $row['valor2'];
        $valor3 = $row['valor3'];
        $valor4 = $row['valor4'];
        $ncm1 = $row['ncm1'];
        $ncm2 = $row['ncm2'];
        $ncm3 = $row['ncm3'];
        $ncm4 = $row['ncm4'];
        $cst1 = $row['cst1'];
        $cst2 = $row['cst2'];
        $cst3 = $row['cst3'];
        $cst4 = $row['cst4'];
        $cfop1 = $row['cfop1'];
        $cfop2 = $row['cfop2'];
        $cfop3 = $row['cfop3'];
        $cfop4 = $row['cfop4'];
        $Temperatura = $row['Temperatura'];
        $turma_id = $row['turma_id'];
    }
} else {
    echo "0 results";
}
$conn->close();




?>
    <?php
    include 'include/header.php'
        ?>
    <main>
        <?php
        include 'include/menuLateral.php';

        ?>
        <div class="DivDireita">
            <div class="table-inputs">

                <div class="text">
                    <h1>Pedidos</h1>
                </div>
                <div class="tabela-scroll">
                <Div class="nomet">   
                <h1>Cliente</h1>
                </Div>
                <table class="table">
                    <tr>
                        <th>N° Pedido</th>
                        <th>Cliente</th>
                        <th>Empresa</th>
                        <th>CEP</th>
                        <th>Telefone</th>
                    </tr>
                    <tr>
                        <td><?php echo $CEP; ?></td>
                        <td><?php echo $cliente; ?></td>
                        <td><?php echo $Empresa; ?></td>
                        <td><?php echo $CEP; ?></td>
                        <td><?php echo $telefone; ?></td>
                    </tr>
                </table>
                <Div class="nomet">   
                <h1>Produto</h1>
                </Div>
                    <table class="table">
                    <tr>
                        <th>Produto 1</th>
                        <?php
                        if ($produto2!='') print"
                        <th>Produto 2</th>";
                        if ($produto3!='') print"
                        <th>Produto 3</th>";
                        if ($produto4!='') print"
                        <th>Produto 4</th>";?>

                    </tr>
                    <tr>
                        <td><?php echo $produto1; ?></td>
                        <td><?php if ($produto2=='')$produto2='Não Inserido';echo $produto2; ?></td>
                        <td><?php if ($produto3=='')$produto3='Não Inserido';echo $produto3; ?></td>
                        <td><?php if ($produto4=='')$produto4='Não Inserido';echo $produto4; ?></td>
                    </tr>
                    <tr>
                        <th>Unidade 1</th>
                        <th>Unidade 2</th>
                        <th>Unidade 3</th>
                        <th>Unidade 4</th>
                    </tr>
                    <tr>
                        <td><?php echo $unidade1; ?></td>
                        <td><?php if ($unidade2==' ')$unidade2='Não Inserido';echo $unidade2; ?></td>
                        <td><?php if ($unidade3==' ')$unidade3='Não Inserido';echo $unidade3; ?></td>
                        <td><?php if ($unidade4==' ')$unidade4='Não Inserido';echo $unidade4; ?></td>
                    </tr>
                    <tr>
                        <th>Quantidade 1</th>
                        <th>Quantidade 2</th>
                        <th>Quantidade 3</th>
                        <th>Quantidade 4</th>
                    </tr>
                    <tr>
                        <td><?php echo $quantidade1; ?></td>
                        <td><?php echo $quantidade2; ?></td>
                        <td><?php echo $quantidade3; ?></td>
                        <td><?php echo $quantidade4; ?></td>
                    </tr>
                    <tr>
                        <th>Valor 1</th>
                        <th>Valor 2</th>
                        <th>Valor 3</th>
                        <th>Valor 4</th>
                    </tr>
                    <tr>
                        <td><?php echo $valor1; ?></td>
                        <td><?php echo $valor2; ?></td>
                        <td><?php echo $valor3; ?></td>
                        <td><?php echo $valor4; ?></td>
                    </tr>
                    <tr>
                        <th>Ncm 1</th>
                        <th>Ncm 2</th>
                        <th>Ncm 3</th>
                        <th>Ncm 4</th>
                    </tr>
                    <tr>
                        <td><?php echo $ncm1; ?></td>
                        <td><?php echo $ncm2; ?></td>
                        <td><?php echo $ncm3; ?></td>
                        <td><?php echo $ncm4; ?></td>
                    </tr>
                    <tr>
                        <th>Cfop 1</th>
                        <th>Cfop 2</th>
                        <th>Cfop 3</th>
                        <th>Cfop 4</th>
                    </tr>
                    <tr>
                        <td><?php echo $cfop1; ?></td>
                        <td><?php echo $cfop2; ?></td>
                        <td><?php echo $cfop3; ?></td>
                        <td><?php echo $cfop4; ?></td>
                    </tr>
                    <tr>
                        <th>Cst 1</th>
                        <th>Cst 2</th>
                        <th>Cst 3</th>
                        <th>Cst 4</th>
                    </tr>
                    <tr>
                        <td><?php echo $cst1; ?></td>
                        <td><?php echo $cst2; ?></td>
                        <td><?php echo $cst3; ?></td>
                        <td><?php echo $cst4; ?></td>
                    </tr>
                </table>
                <Div class="nomet">   
                <h1>Transporte</h1>
                </Div>
                <table class="table">
                    <tr>
                        <th>Motorista</th>
                        <th>Placa</th>
                        <th>Container</th>
                        <th>Navio</th>
                        <th>Tipo</th>
                    </tr>
                    <tr>
                        <td><?php echo $NomeMotorista; ?></td>
                        <td><?php echo $placa; ?></td>
                        <td><?php echo $container; ?></td>
                        <td><?php echo $navio; ?></td>
                        <td><?php echo $tipo; ?></td>
                    </tr>
                    <tr>
                        <th>LacreSif</th>
                        <th>Lacre</th>
                        <th>temperatura</th>
                        <th>Nº Onu</th>
                        <th>IMD</th>
                    </tr>
                    <tr>
                        <td><?php echo $LacreSif; ?></td>
                        <td><?php echo $lacre; ?></td>
                        <td><?php echo $Temperatura; ?></td>
                        <td><?php echo $NOnu; ?></td>
                        <td><?php echo $IMD; ?></td>
                    </tr>

                </table>
            </div>                           
            </div>
        </div>
    </main>


    <script src="js/ver.js"></script>
    <script src="js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>