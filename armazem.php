<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title><?php 
    $tituloPag = 'Home';
    echo "$tituloPag"; 
    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        
        <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/estiloInicio.css">
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
        <?php
            // Conexão com o banco de dados
            $mysqli = new mysqli('127.0.0.1', 'root.Att', 'root', 'logistica');

            if ($mysqli->connect_error) {
                die('Erro na conexão (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
            }

            $sql = "SELECT * FROM produto";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
                // Saída de cada linha
                while($row = $result->fetch_assoc()) {
                    echo "id: " . $row["id"]. " - Nome do Produto: " . $row["nome_produto"]. " - Preço: " . $row["preco"]. ' - UN :' . $row["UN"]. ' - Quantidade :' . $row["Quantidade"]. "<br>";
                }
            } else {
                echo "0 resultados";
            }
            $mysqli->close();
        ?>

        </div>
    </main>

    

    <script src="js/sidebar.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>