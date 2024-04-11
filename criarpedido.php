<div>
    <div class="">
        <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="quantidade">Quantidade de produtos do pedido:</label>
            <input type="text" id="id_pedido" name="id_pedido">

            <label for="quantidade">Quantidade de produtos do pedido:</label>
            <input type="number" id="quantidade" name="quantidade" min="1" max="100" onchange="gerarCampos()">

            <div id="camposProdutos">
                <!-- local dos campos do produto:  -->
            </div>

            <input type="submit" value="Cadastrar">
        </form>
    </div>
</div>

<script>
function gerarCampos() {
    var quantidade = document.getElementById('quantidade').value;
    var container = document.getElementById('camposProdutos');
    container.innerHTML = ''; 

    for (var i = 0; i < quantidade; i++) {
        container.innerHTML += `
            <label class="label-input" for=""> Nome do produto:<br>
                <input type="text" name="nome_produto[]" placeholder="Nome do produto" id="nome_produto${i}">
            </label>
            <br>
            
            <label class="label-input" for="">OCM: <br>
                <input type="text" name="nome_produto[]" placeholder="Nome do produto" id="nome_produto${i}">
            </label>
            <br>
            
            <label class="label-input" for="">CFOP: <br>
                <input type="text" name="nome_produto[]" placeholder="Nome do produto" id="nome_produto${i}">
            </label>
            <br>
            <br>
            <br>
        `;
    }
}
</script>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quantidade = $_POST['quantidade'];
    $nomesProdutos = $_POST['nome_produto'];

    //banco de dados aqui :)

    //mostra oque foi cadastrado
    echo "<h3>Produtos cadastrados:</h3>";
    for ($i = 0; $i < $quantidade; $i++) {
        echo "<p>Produto " . ($i + 1) . ": " . $nomesProdutos[$i] . "</p>";
    }
}
?>