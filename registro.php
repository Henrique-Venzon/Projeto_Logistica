<!-- Botão que abre o modal -->
<button id="btnAbreModal">Cadastrar</button>

<div id="meuModal" class="modal">
    <div class="modal-conteudo">
        <span class="fechar">×</span>
        <form class="form" action="processarregistro.php" method="post">
            <label class="label-input" for="">
                <input type="text" name="username" placeholder="Usuario" id="username">.
            </label>
            <label class="label-input" for="">
                <input type="password" name="Senha" placeholder="Senha" id="Senha">
            </label>
            <label for="tipo_login">Tipo de Login:</label>
            <select name="tipo_login" id="tipo_login">
                <option value="professor">Professor</option>
                <option value="aluno">Aluno</option>
            </select>
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
</script>