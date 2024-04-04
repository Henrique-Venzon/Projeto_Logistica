<!-- Botão que abre o modal -->
<button id="btnAbreModal">Cadastrar</button>

<div id="meuModal" class="modal">
    <div class="modal-conteudo">
        <span class="fechar">×</span>
        <form class="form" action="adicionaritem.php" method="post">
            <label class="label-input" for=""> Nome do item:
                <br>
                <input type="text" name="nome" placeholder="Nome do Item" id="nome">
            </label>
            <br>
            <label class="label-input" for=""> Fornecedora:
                <br>
                <input type="text" name="fornecedora" placeholder="Fornecedora" id="fornecedora">
                <br>
            </label>
            <label for="tipo_login">Tipo de Produto:</label>
            <br>
            <select name="tipo_produto" id="tipo_produto">
                <option value=""></option>
                <option value="roupa">Roupa</option>
                <option value="higiene">Higiene</option>
                <option value="alimentos">Alimentos</option>
                <option value="eletronicos">Eletrônicos</option>
                <option value="moveis">Móveis</option>
                <option value="equipamentos">Equipamentos</option>
                <option value="materiais_de_construcao">Materiais de Construção</option>
                <option value="produtos_quimicos">Produtos Químicos</option>
                <option value="bebidas">Bebidas</option>
                <option value="brinquedos">Brinquedos</option>
            </select>
            <br>
            <label for="tipo_login">Tipo de embalagem:</label>
            <br>
            <select name="tipo_embalagem" id="tipo_embalagem">
                <option value="primaria">Primária</option>
                <option value="secundaria">Secundária</option>
                <option value="tercearia">Terceária</option>
                <option value="quartenaria">Quartenária</option>
                <option value="quintenaria">Quintenária</option>
            </select>
            <br>
            <div id="caracteristicas"></div>
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
        padding-top: 100px;
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
        border: 1px solid #888;
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
    document.getElementById("tipo_produto").addEventListener("change", function () {
        var tipo_produto = this.value;
        var caracteristicas = document.getElementById("caracteristicas");

        if (tipo_produto === '') {
            caracteristicas.innerHTML = "";
        }

        if (tipo_produto === "roupa") {
            caracteristicas.innerHTML = `
            <label class="label-input" for=""> Cor:
                <br>
                <input type="text" name="cor" placeholder="Cor" id="cor">
            </label>
            <br>
            <label class="label-input" for=""> Tecido:
                <br>
                <input type="text" name="tecido" placeholder="Tecido" id="tecido">
            </label>
            <br>
        `;
        }

    });

</script>