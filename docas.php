<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: index.php");
    exit;
}
if(!isset($_SESSION['turma'])){
  header("Location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="img/amem.svg">

    <title><?php 
    $tituloPag = 'Docas';
    echo "$tituloPag"; 
    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

<link rel="stylesheet" href="style_produto.css">
</head>

<body>

<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Docas</title>
<link rel="stylesheet" href="css/doca.css">
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
                            <div class="txtCentro">
                            <h1>Escolher doca</h1>
                            </div>
                            
                    <form action="processamento/processar_docas.php" method="post">
                        <label for="pedido">Selecione o Pedido:</label>
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
                              <br>
                              <label for="doca">Doca:</label>
                              <select id="doca" >
                              <option value=" "> </option>     
                              <option value="dc1">Doca 1</option>
                              <option value="dc2">Doca 2</option>
                              <option value="dc3">Doca 3</option>
                              </select>
                              <br>
                              <input type="submit" value="Enviar">
                            </form>

            </div>
  </div>
</main>


<script src="js/sidebar.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>
</html>





