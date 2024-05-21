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

$sql = "SELECT * FROM carga where turma_id = '".$_SESSION['turma']."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        $npedido = $row['npedido'];
        $Empresa = $row['Empresa'];
        $cliente = $row['cliente'];
        $telefone = $row['Telefone'];
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
                                $sql = "SELECT npedido FROM carga where turma_id = '".$_SESSION['turma']."'";
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
                                            <td><?php echo $unidade1; ?></td>
                                            <td>
                                                <span id="quantidade1"><?php echo $quantidade1; ?></span>
                                                <input id="quantidadeInput1" type="text" value="<?php echo $quantidade1; ?>" style="display:none;" />
                                            </td>
                                            <td><?php echo $valor1; ?></td>
                                            <td><button id="editar1" onclick="editarQuantidade(1)">editar</button></td>
                                        </tr>
                                        <tr>
                                            <?php if ($produto2!='')echo '<td>'.$produto2.'</td>'; ?>
                                            <?php if ($unidade2!=' ')echo '<td>'.$unidade2.'</td>'; ?>
                                            <?php if ($quantidade2!='0')echo '<td><span id="quantidade2">'.$quantidade2.'</span><input id="quantidadeInput2" type="text" value="'.$quantidade2.'" style="display:none;" /></td>'; ?>
                                            <?php if ($valor2!='0.00')echo '<td>'.$valor2.'</td>'; ?>
                                            <td> <button id="editar2" onclick="editarQuantidade(2)">editar</button></td>
                                        </tr>
                                        <tr>
                                            <?php if ($produto3!='')echo '<td>'.$produto3.'</td>'; ?>
                                            <?php if ($unidade3!=' ')echo '<td>'.$unidade3.'</td>'; ?>
                                            <?php if ($quantidade3!='0')echo '<td><span id="quantidade3">'.$quantidade3.'</span><input id="quantidadeInput3" type="text" value="'.$quantidade3.'" style="display:none;" /></td>'; ?>
                                            <?php if ($valor3!='0.00')echo '<td>'.$valor3.'</td>'; ?>
                                            <td><button id="editar3" onclick="editarQuantidade(3)">editar</button></td>
                                        </tr>
                                        <tr>
                                            <?php if ($produto4!='')echo '<td>'.$produto4.'</td>'; ?>
                                            <?php if ($unidade4!=' ')echo '<td>'.$unidade4.'</td>'; ?>
                                            <?php if ($quantidade4!='0')echo '<td><span id="quantidade4">'.$quantidade4.'</span><input id="quantidadeInput4" type="text" value="'.$quantidade4.'" style="display:none;" /></td>'; ?>
                                            <?php if ($valor4!='0.00')echo '<td>'.$valor4.'</td>'; ?>
                                            <td><button id="editar4" onclick="editarQuantidade(4)">editar</button></td>
                                        </tr>

                                    </table>
                                    
                                    </div>
                            </div>

                </div>

            </div>
        </div>

    </main>

    <script>
        function editarQuantidade(row) {
            var quantidadeSpan = document.getElementById('quantidade' + row);
            var quantidadeInput = document.getElementById('quantidadeInput' + row);
            var editButton = document.getElementById('editar' + row);

            if (quantidadeSpan.style.display === 'none') {
                quantidadeSpan.style.display = 'inline';
                quantidadeInput.style.display = 'none';
                editButton.textContent = 'editar';
            } else {
                quantidadeSpan.style.display = 'none';
                quantidadeInput.style.display = 'inline';
                editButton.textContent = 'salvar';
            }
        }

        function salvarQuantidade(row) {
            var quantidadeSpan = document.getElementById('quantidade' + row);
            var quantidadeInput = document.getElementById('quantidadeInput' + row);
            quantidadeSpan.textContent = quantidadeInput.value;

            quantidadeSpan.style.display = 'inline';
            quantidadeInput.style.display = 'none';
            document.getElementById('editar' + row).textContent = 'editar';
        }
    </script>
    <script src="js/vistoriaCarga.js"></script>
    <script src="js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>
