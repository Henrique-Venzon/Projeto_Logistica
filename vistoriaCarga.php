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
    $tituloPag = 'Carga';
    echo "$tituloPag";
    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <meta name="vierport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/carga.css">
</head>

<body>

<?php
$servername = "localhost";
$username = "root.Att";
$password = "root";
$dbname = "logistica";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

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
        include 'include/menuLateral.php'
            ?>



        <div class="DivDireita">
            <div class="table-inputs">
                
                <div class="txtCont">
                    <h1>Carga</h1>
                </div>
                <div class="tabela-scroll">
                        <div class="inputPedido">
                            <div class="label">
                        <label for="pedido">Selecione o Pedido:</label>
                        </div>
                        <div class="select">
                        <select name="pedido" id="pedido">
                            <?php
                            // Conexão com o banco de dados
                            $servername = "localhost";
                            $username = "root.Att";
                            $password = "root";
                            $dbname = "logistica";
                            
                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);   
                            if ($conexao->connect_error) {
                                die("Erro de conexão: " . $conexao->connect_error);
                            }

                                // Consulta para buscar os pedidos
                                $sql = "SELECT npedido FROM transporte";
                                $result = $conn->query($sql);
                                
                                // Se houver resultados, criar as opções do select
                                if ($result->num_rows > 0) {
                                  while($row = $result->fetch_assoc()) {
                                    echo "<option value=\"{$row['npedido']}\">{$row['npedido']}</option>";
                                  }
                                }
                                
                                // Fechar conexão
                                $conn->close();
                                ?>
                              </select>
                              </div>
                              <div class="selicionar">
                                <button id="Button">Selecionar</button>
                              </div>
                        </div>
                             <div id="aparecer" class="dados">

                                    <div class="doca">
                                    <label for="doca">Doca:</label>
                                    <select id="doca" >
                                    <option value=" "> </option>     
                                    <option value="dc1">Doca 1</option>
                                    <option value="dc2">Doca 2</option>
                                    <option value="dc3">Doca 3</option>
                                    </select>
                                    </div>

                                    <div class="tabelaComVistoria">
                                    <table class='table'>
                                        <tr>
                                            <th>Produto</th>
                                            <th>Unidade</th>
                                            <th>Quantidade</th>
                                            <th>Valor</th>
                                            <th>Faltando/Avariado</th>
                                        </tr>
                                        <tr>
                                        <td><?php echo $produto1; ?></td>
                                            <td><td><?php echo $unidade1; ?></td></td>
                                            <td><td><?php echo $quantidade1; ?></td></td>
                                            <td><td><?php echo $valor1; ?></td></td>
                                            <td><button>editar</button></td>
                                        </tr>
                                        <tr>
                                        <?php if ($produto2!='')echo '<td>'.$produto2.'</td>'; ?>
                                        <?php if ($unidade2!=' ')echo '<td>'.$unidade2.'</td>'; ?>
                                        <?php if ($quantidade2!='0')echo '<td>'.$quantidade2.'</td>'; ?>
                                        <?php if ($valor2!='0.00')echo '<td>'.$valor2.'</td>'; ?>
                                        </tr>
                                        <tr>
                                        <?php if ($produto3!='')echo '<td>'.$produto3.'</td>'; ?>
                                        <?php if ($unidade3!=' ')echo '<td>'.$unidade3.'</td>'; ?>
                                        <?php if ($quantidade3!='0')echo '<td>'.$quantidade3.'</td>'; ?>
                                        <?php if ($valor3!='0.00')echo '<td>'.$valor3.'</td>'; ?>
                                        </tr>
                                        <tr>
                                        <?php if ($produto4!='')echo '<td>'.$produto4.'</td>'; ?>
                                        <?php if ($unidade4!=' ')echo '<td>'.$unidade4.'</td>'; ?>
                                        <?php if ($quantidade4!='0')echo '<td>'.$quantidade4.'</td>'; ?>
                                        <?php if ($valor4!='0.00')echo '<td>'.$valor4.'</td>'; ?>
                                        </tr>

                                    </table>
                                    
                                    </div>
                            </div>

                </div>

            </div>
        </div>

    </main>


    <script src="js/vistoriaCarga.js"></script>
    <script src="js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>
