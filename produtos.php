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
<link rel="shortcut icon" href="img/logo32.png" type="image/x-icon">

    <title><?php 
    $tituloPag = 'Pedidos';
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
<title>Formulário de Pedido</title>
<link rel="stylesheet" href="css/style_produto.css">
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
            <form>
            <h2 class="centroTxt">Criar pedido</h2>

            <div class="colunas1">
          <div class="cliente">
        <label for="nomeCliente">Cliente:</label>
        <input id="nomeCliente" type="text" required>
        </div>
        <div class="cep">
        <label for="cep">CEP:</label>
        <input id="cep" type="number" required>
        </div>
        <div class="telefone">
        <label for="telefone">Telefone:</label>
        <input id="telefone" type="number" required>
        </div>
        <div class="numeroPedido">
        <label for="num">N° pedido:</label>
        <input id="num" type="number" required>
        </div>

            </div>

            <div class="botao">
    <button id="adicionarInputs">Adicionar</button>
    <button id="removerUltimo">Remover</button>
</div>
            <div class="colunas">
    <div class="produto">
      <label for="produto">Nome do Produto:</label>
      <input type="text" id="produto" name="produto" required>
      
    </div>

    <div class="unidade">
      <label for="unidade">Unidade:</label>
      <select id="unidade" name="unidade" required>
        <option value="UN">UN</option>
        <option value="RL">RL</option>
        <option value="FD">FD</option>
        <option value="KG">KG</option>
      </select>
    </div>

    <div class="quantidade">
      <label for="quantidade">Quantidade:</label>
      <input type="number" id="quantidade" name="quantidade" min="1" >
    </div>

    <div class="valor">
      <label for="valor">Valor Unitário:</label>
      <input type="number" id="valor" name="valor" step="0.01" >
    </div>

    <div class="ncm">
      <label for="ncm">NCM:</label>
      <input type="text" id="ncm" name="ncm" required>
    </div>

    <div class="cst">
      <label for="cst">CST:</label>
      <input type="text" id="cst" name="cst" required>
    </div>

    <div class="cfop">
      <label for="cfop">CFOP:</label>
      <input type="text" id="cfop" name="cfop" required>
    </div>


  </div>


<div class="botao">
        <button type="submit">Enviar</button>
        </div>


    </form>
            </div>
</main>


<script src="js/produtos.js"></script>
<script src="js/sidebar.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>
</html>
=======
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulário de Pedido</title>
<link rel="stylesheet" href="style_produto.css">
</head>

<body>

<?php
include'header.php'
?>
<main>
    <?php 
    include'menuLateal.php'
    ?>

    <div class="DivDireita">
</div>

<div class="ordem-form">
  <form action="" method="post">
    <label for="ordem-numero">Pedido Nº</label>
    <input type="text" id="" name="">

    <div class="input">
    <label for="produto">Produtos</label>
   

  
</div>

<div class="input">
    <input type="text" id="" name="">
    <input type="text" id="" name="">
    <input type="text" id="" name="">
    <input type="text" id="" name="">
    <input type="text" id="" name="">
</div>

<div class="input">
    <input type="text" id="" name="">
    <input type="text" id="" name="">
    <input type="text" id="" name="">
    <input type="text" id="" name="">
    <input type="text" id="" name="">
</div>

<div class="input">
    <input type="text" id="" name="">
    <input type="text" id="" name="">
    <input type="text" id="" name="">
    <input type="text" id="" name="">
    <input type="text" id="" name="">
</div>

<div class="input">
    <input type="text" id="" name="" repla>
    <input type="text" id="" name="">
    <input type="text" id="" name="">
    <input type="text" id="" name="">
    <input type="text" id="" name="">
</div>

<div class="input">
    <input type="text" id="" name="">
    <input type="text" id="" name="">
    <input type="text" id="" name="">
    <input type="text" id="" name="">
    <input type="text" id="" name="">
</div>

<div class="input">
    <input type="text" id="" name="">
    <input type="text" id="" name="">
    <input type="text" id="" name="">
    <input type="text" id="" name="">
    <input type="text" id="" name="">
</div>



<div class="descricao">
    <label for="descricao">Descrição</label>
    <textarea id="descricao" name="descricao" oninput="this.style.height = ''; this.style.height = this.scrollHeight + 'px' "></textarea>
</div>


<div class="buttons">
    <button type="submit" class="button">Enviar</button>
    <button type="button" class="button">Adicionar</button>
</div>
  </form>
</div>
</div>
</main>

</body>
</html>

