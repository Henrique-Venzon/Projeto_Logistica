<button id="btnAbreModal">
    <h3>Cadastrar Produto</h3>
</button>

<div id="meuModal" class="modal">
    <div class="modal-conteudo">
        <span class="fechar"></span>
        <form class="form" action="cadastrarproduto.php" method="post">
            <label class="label-input" for=""> Nome do Produto:
                <br>
                <input type="text" name="nome_produto" placeholder="Nome do Produto" id="nome_produto">
            </label>
            <br>
            <label for="tipo_login">Selecione sua UN:</label>
            <br>
            <select name="UN" id="UN">
                <option value=""></option>
                <option value="UN">UN - Unidade</option>
                <option value="KG">KG - Quilograma</option>
                <option value="L">L - Litro</option>
                <option value="M">M - Metro</option>
                <option value="CM">CM - Centímetro</option>
                <option value="MM">MM - Milímetro</option>
                <option value="M2">M² - Metro quadrado</option>
                <option value="M3">M³ - Metro cúbico</option>
                <option value="CX">CX - Caixa</option>
                <option value="PC">PC - Peça</option>
                <option value="RL">RL - Rolo</option>
                <option value="FD">FD - Fardo</option>
            </select>
            <br>
            <label for="tipo_login">Coloque o preço:</label>
            <br>
            <input type="text" name="preco" placeholder="preço" id="preco">
            <br>
            <label for="tipo_login">Quantidade:</label>
            <br>
            <input type="number" name="quantidade" placeholder="quantidade" id="quantidade">
            <br>
            <br>
            <input type="submit" value="Cadastrar">
        </form>
    </div>
</div>

<!-- CSS para o modal -->
<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 280px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);

    }

    .modal-conteudo {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        width: 80%;

    }

    .fechar {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .fechar:hover,
    .fechar:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    button {
        background-color: white;
        box-shadow: 2px 2px 10px black;
        background-color: #64acff;


    }
</style>

<!-- JavaScript para abrir e fechar o modal -->
<script>
    var modal = document.getElementById("meuModal");
    var btn = document.getElementById("btnAbreModal");
    var span = document.getElementsByClassName("fechar")[0];

    btn.onclick = function () {
        modal.style.display = "block";
    }

    span.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

</script>