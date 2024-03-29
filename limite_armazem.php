<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
#armazem {
  width: 100%;
  background-color: #f3f3f3;
}

#itens {
  width: 0%;
  height: 30px;
  background-color: #4CAF50;
}
</style>
</head>
<body>

<h1>Armazém</h1>

<div id="armazem">
  <div id="itens"></div>
</div>

<br>
Quantidade atual: <span id="quantidade_atual"></span>/<span id="limite_maximo"></span>

<button id="adicionarItem">Adicionar item</button>

<script>
$(document).ready(function(){
  setInterval(function(){
    $.get("getDados.php", function(data){
      var dados = JSON.parse(data);
      var quantidade_atual = dados.quantidade_atual;
      var limite_maximo = dados.limite_maximo;

      document.getElementById("itens").style.width = (quantidade_atual / limite_maximo * 100) + "%";
      document.getElementById("quantidade_atual").textContent = quantidade_atual;
      document.getElementById("limite_maximo").textContent = limite_maximo;
    });
  }, 1000);

  $("#adicionarItem").click(function(){
    $.get("adicionarItem.php", function(data){
      alert(data);
    });
  });
});
</script>

</body>
</html>
