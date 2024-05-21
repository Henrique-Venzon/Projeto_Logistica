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
    <meta name="vierport" content="width=device-width, initial-scale=1.0">
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
$servername = "localhost";
$username = "root.Att";
$password = "root";
$dbname = "logistica";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT `placa`, `NomeMotorista`, `container`, `navio`, `tipo`, `lacre`, `LacreSif`, `IMD`, `NOnu`, `npedido`, `Empresa`, `cliente`, `telefone`, `CEP`, `produto1`, `produto2`, `produto3`, `produto4`, `unidade1`, `unidade2`, `unidade3`, `unidade4`, `quantidade1`, `quantidade2`, `quantidade3`, `quantidade4`, `valor1`, `valor2`, `valor3`, `valor4`, `ncm1`, `ncm2`, `ncm3`, `ncm4`, `cst1`, `cst2`, `cst3`, `cst4`, `cfop1`, `cfop2`, `cfop3`, `cfop4`, `Temperatura`, `turma_id` FROM container where turma_id = '".$_SESSION['turma']."' and `npedido`='" . $npedido_ver . "'  ";

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
                    <h1 id="v" class="voltar">Voltar</h1>
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
                <h1>Produtos cadastrados:</h1>
                </Div>
                    <table class="table">
                    <tr>
                        <th>Produto</th>
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
                        <?php if ($produto2!='')echo '<td>'.$produto2.'</td>'; ?>
                        <?php if ($produto3!='')echo '<td>'.$produto3.'</td>'; ?>
                        <?php if ($produto4!='')echo '<td>'.$produto4.'</td>'; ?>
                    </tr>
                    <tr>
                        <th>Unidade </th>
                        <?php
                        if ($unidade2!=' ') print"
                        <th>unidade 2</th>";
                        if ($unidade3!=' ') print"
                        <th>unidade 3 </th>";
                        if ($unidade4!=' ') print"
                        <th>unidade 4</th>";?>
                    </tr>
                    <tr>
                        <td><?php echo $unidade1; ?></td>
                        <?php if ($unidade2!=' ')echo '<td>'.$unidade2.'</td>'; ?>
                        <?php if ($unidade3!=' ')echo '<td>'.$unidade3.'</td>'; ?>
                        <?php if ($unidade4!=' ')echo '<td>'.$unidade4.'</td>'; ?>
                    </tr>
                    <tr>
                        <th>Quantidade </th>
                        <?php
                        if ($quantidade2!='0') print"
                        <th>quantidade 2</th>";
                        if ($quantidade3!='0') print"
                        <th>qantidade 3</th>";
                        if ($quantidade4!='0') print"
                        <th>quantidade 4</th>";?>
                    </tr>
                    <tr>
                        <td><?php echo $quantidade1; ?></td>
                        <?php if ($quantidade2!='0')echo '<td>'.$quantidade2.'</td>'; ?>
                        <?php if ($quantidade3!='0')echo '<td>'.$quantidade3.'</td>'; ?>
                        <?php if ($quantidade4!='0')echo '<td>'.$quantidade4.'</td>'; ?>
                    </tr>
                    <tr>
                        <th>Valor </th>
                        <?php
                        if ($valor2!='0.00') print"
                        <th>valor 2</th>";
                        if ($valor3!='0.00') print"
                        <th>valor 3</th>";
                        if ($valor4!='0.00') print"
                        <th>valor 4</th>";?>
                    </tr>
                    <tr>
                        <td><?php echo $valor1; ?></td>
                        <?php if ($valor2!='0.00')echo '<td>'.$valor2.'</td>'; ?>
                        <?php if ($valor3!='0.00')echo '<td>'.$valor3.'</td>'; ?>
                        <?php if ($valor4!='0.00')echo '<td>'.$valor4.'</td>'; ?>
                    </tr>
                    <tr>
                        <th>Ncm </th>
                        <?php
                        if ($ncm2!='0') print"
                        <th>ncm 2</th>";
                        if ($ncm3!='0') print"
                        <th>ncm 3</th>";
                        if ($ncm4!='0') print"
                        <th>ncm 4</th>";?>
                    </tr>
                    <tr>
                        <td><?php echo $ncm1; ?></td>
                        <?php if ($ncm2!='0')echo '<td>'.$ncm2.'</td>'; ?>
                        <?php if ($ncm3!='0')echo '<td>'.$ncm3.'</td>'; ?>
                        <?php if ($ncm4!='0')echo '<td>'.$ncm4.'</td>'; ?>
                    </tr>
                    <tr>
                        <th>Cfop </th>
                        <?php
                        if ($cfop2!='0') print"
                        <th>cfop 2</th>";
                        if ($cfop3!='0') print"
                        <th>cfop 3</th>";
                        if ($cfop4!='0') print"
                        <th>cfop 4</th>";?>
                    </tr>
                    <tr>
                        <td><?php echo $cfop1; ?></td>
                        <?php if ($cfop2!='0')echo '<td>'.$cfop2.'</td>'; ?>
                        <?php if ($cfop3!='0')echo '<td>'.$cfop3.'</td>'; ?>
                        <?php if ($cfop4!='0')echo '<td>'.$cfop4.'</td>'; ?>
                    </tr>
                    <tr>
                        <th>Cst </th>
                        <?php
                        if ($cst2!='0') print"
                        <th>cst 2</th>";
                        if ($cst3!='0') print"
                        <th>cst 3</th>";
                        if ($cst4!='0') print"
                        <th>cst 4</th>";?>
                    </tr>
                    <tr>
                        <td><?php echo $cst1; ?></td>
                        <?php if ($cst2!='0')echo '<td>'.$cst2.'</td>'; ?>
                        <?php if ($cst3!='0')echo '<td>'.$cst3.'</td>'; ?>
                        <?php if ($cst4!='0')echo '<td>'.$cst4.'</td>'; ?>
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