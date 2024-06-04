<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: index.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['turma'] = $_POST['turma'];}
?>
<!DOCTYPE html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" >
<link rel="shortcut icon" href="img/amem.svg">

    <meta charset="utf-8">
    <title><?php 
    $tituloPag = 'Estoque';
    echo "$tituloPag"; 
    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/estoque.css">
</head>

<body>
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
                <h1>Estoque</h1>
            </div>
            <div class="stock">
                <div class="tabelaPesquisa">
                    <div class="pesquisa">
                    <h1>Pesquisa</h1>
                    <input class="input1" type="text" required placeholder="Produto">
                    <input class="input2" type="text" required placeholder="Quantidade">
                    <label for="pos">Posição</label>
                    <select name="" id="pos">
                        <option value=""></option>
                        <option value="">a1</option>
                        <option value="">a2</option>
                        <option value="">a3</option>
                        <option value="">a4</option>
                        <option value="">b1</option>
                        <option value="">b2</option>
                        <option value="">b3</option>
                        <option value="">b4</option>
                        <option value="">c1</option>
                        <option value="">c2</option>
                        <option value="">c3</option>
                        <option value="">c4</option>
                        <option value="">d1</option>
                        <option value="">d2</option>
                        <option value="">d3</option>
                        <option value="">d4</option>
                    </select>
                    <button class="buttonPesquisa" type="submit">Pesquisar</button>
                    </div>
                </div>
                <div class="tabelaPosicoes">
                        <div class="posicoes">
                            <div class="card a1">
                                <h1>a1</h1>
                            </div>
                            <div class="card a2">
                            <h1>a2</h1>
                            </div>
                            <div class="card a3">
                            <h1>a3</h1>
                            </div>
                            <div class="card a4">
                            <h1>a4</h1>
                            </div>
                            <div class="card b1">
                            <h1>b1</h1>
                            </div>
                            <div class="card b2">
                                <h1>b2</h1>
                            </div>
                            <div class="card b3">
                                <h1>b3</h1>
                            </div>
                            <div class="card b4">
                                <h1>b4</h1>
                            </div>
                            <div class="card c1">
                                <h1>c1</h1>
                            </div>
                            <div class="card c2">
                                <h1>c2</h1>
                            </div>
                            <div class="card c3">
                                <h1>c3</h1>
                            </div>
                            <div class="card c4">
                                <h1>c4</h1>
                            </div>
                            <div class="card d1">
                                <h1>d1</h1>
                            </div>
                            <div class="card d2">
                                <h1>d2</h1>
                            </div>
                            <div class="card d3">
                                <h1>d3</h1>
                            </div>
                            <div class="card d4">
                                <h1>d4</h1>
                            </div>
                        </div>
                </div>
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
