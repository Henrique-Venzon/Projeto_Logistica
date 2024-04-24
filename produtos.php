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
              
                <div class="form">
         
                <div class="ordem-form">

<form action="" method="post">
  <label for="ordem-numero">Pedido Nº</label>
  <input type="text" id="" name="">



</div>
<label for="produto">NCM</label>
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
  <textarea id="descricao" name="descricao" oninput="this.style.height = ''; this.style.height = this.scrollHeight + 'px'"></textarea>
</div>


<div class="buttons">
  <button type="submit" class="button">Enviar</button>
  <button type="button" class="button">Adicionar</button>
</div>
               
                    </div>
                </form>
                    
            </div>
        </div>
</main>


</body>
</html>
