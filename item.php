<button id="btnAbreModal"><h1>Cadastrar</h1></button>

<div id="meuModal" class="modal">
    <div class="modal-conteudo">
        <span class="fechar"></span>
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
    button{
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
        if (tipo_produto === "higiene") {
            caracteristicas.innerHTML = `
            <label class="label-input" for=""> Fabricante:
                <br>
                <input type="text" name="Fabricante" placeholder="Fabricante" id="Fabricante">
            </label>
            <br>
            <label class="label-input" for=""> Tamanho:
                <br>
                <input type="text" name="Tamanho" placeholder="Tamanho" id="Tamanho">
            </label>
            <br>
            
            <label class="label-input" for=""> Tipo do Produto:
                <br>
            <select name="tipo_higiene" id="tipo_higiene">
                <option value="Produtos Gerais">Produtos Gerais</option>
                <option value="Panos e Esponjas">Panos e Esponjas</option>
                <option value="Limpeza de Pisos">Limpeza de Pisos</option>
                <option value="Limpeza de Superfícies">Limpeza de Superfícies</option>
                <option value="Coleta de Resíduos e Descartáveis">Coleta de Resíduos e Descartáveis</option>
                <option value="Higiene Sanitária">Higiene Sanitária</option>
            </select>
        `;
        }
        if (tipo_produto === "alimentos") {
            caracteristicas.innerHTML = `
            <label class="label-input" for=""> Marca do Alimento:
                <br>
                <input type="text" name="marca_alimentos" placeholder="Marca" id="marca_alimentos">
            </label>
            <br>
            <label class="label-input" for=""> Tamanho do Conteudo:
                <br>
                <input type="text" name="Tamanho_alimentos" placeholder="Tamanho" id="Tamanho_alimentos">
            </label>
            <br>
            <label for="tipo_login">Tipo de Produtos:</label>
            <br>
            <select name="tipo_alimento" id="tipo_alimento">
                <option value="Salgado">Salgado</option>
                <option value="Doce">Doce</option>
                <option value="Legumes">Leguminosas</option>
                <option value="Verduras">Verduras</option>
            </select>
            <br>
        `;
        }
        if (tipo_produto === "eletronicos") {
            caracteristicas.innerHTML = `
            <label class="label-input" for=""> Marca:
                <br>
                <input type="text" name="marca_eletronicos" placeholder="Marca" id="marca_eletronicos">
            </label>
            <br>
            <label class="label-input" for=""> Dimenções do Produto:
                <br>
                <input type="text" name="tamanho_eletronicos" placeholder="Tamanho" id="tamanho_eletronicos">
            </label>
            <br>
            <label for="tipo_login">Tipo de Produtos:</label>
            <br>
<<<<<<< Updated upstream
            <select name="tipo_eletronico" id="tipo_eletronico">
=======
            <select name="tipo_alimento" id="tipo_alimento">
>>>>>>> Stashed changes
                <option value="Celulares">Celulares</option>
                <option value="Computadores">Computadores</option>
                <option value="Notebooks">Notebooks</option>
                <option value="Maquinas de Lavar">Maquinas de Lavar</option>
                <option value="Micro Ondas">Micro Ondas</option>
                <option value="Fornos">Fornos</option>
                <option value="Aspiradores">Aspiradores</option>
            </select>
            <br>
        `;
        }
        if (tipo_produto === "moveis") {
            caracteristicas.innerHTML = `
            <label class="label-input" for=""> Fabricante do movel:
                <br>
                <input type="text" name="fabricante" placeholder="fabricante" id="fabricante">
            </label>
            <br>
            <label class="label-input" for=""> Dimenções do movel:
                <br>
                <input type="text" name="tamanho_movel" placeholder="Dimenções" id="tamanho_movel">
            </label>
            <br>
            <label for="tipo_login">Tipo de Produtos:</label>
            <br>
<<<<<<< Updated upstream
            <select name="tipo_movel" id="tipo_movel">
=======
            <select name="tipo_alimento" id="tipo_alimento">
>>>>>>> Stashed changes
                <option value="Guarda Roupa">Guarda Roupa</option>
                <option value="Mesas">Mesas</option>
                <option value="Prateleiras">Prateleiras</option>
                <option value="Camas">Camas</option>
                <option value="Escrivaninhas">Escrivaninhas</option>
                <option value="Churrasqueiras">Churrasqueiras</option>
            </select>
            <br>
        `;
        }
        if (tipo_produto === "equipamentos") {
            caracteristicas.innerHTML = `
            <label class="label-input" for=""> Fabricante do equipamentos:
                <br>
                <input type="text" name="fabricante_equipamento" placeholder="fabricante" id="fabricante_equipamento">
            </label>
            <br>
            <label class="label-input" for=""> Dimenções do movel:
                <br>
<<<<<<< Updated upstream
                <input type="text" name="tamanho_equipamento" placeholder="Dimenções" id="tamanho_equipamento">
            </label>
            <br>
            <label for="tipo_login">Tipo de Equipamento:</label>
            <br>
            <select name="tipo_equipamento" id="tipo_equipamento">
                <option value="Capacete">Capacete</option>
                <option value="luvas">luvas</option>
                <option value="Botas">Botas</option>
                <option value="Solda MIG">Solda MIG</option>
                <option value="Solda TIG">Solda TIG</option>
                <option value="Andaimes">Andaimes</option>
=======
                <input type="text" name="tamanho_movel" placeholder="Dimenções" id="tamanho_movel">
            </label>
            <br>
            <label for="tipo_login">Tipo de Produtos:</label>
            <br>
            <select name="tipo_alimento" id="tipo_alimento">
                <option value="Guarda Roupa">Guarda Roupa</option>
                <option value="Mesas">Mesas</option>
                <option value="Prateleiras">Prateleiras</option>
                <option value="Camas">Camas</option>
                <option value="Escrivaninhas">Escrivaninhas</option>
                <option value="Churrasqueiras">Churrasqueiras</option>
>>>>>>> Stashed changes
            </select>
            <br>
        `;
        }
<<<<<<< Updated upstream
        if (tipo_produto === "materiais_de_construcao") {
            caracteristicas.innerHTML = `
            <label class="label-input" for=""> Fabricante do Material:
                <br>
                <input type="text" name="fabricante_construcao" placeholder="fabricante" id="fabricante_construcao">
            </label>
            <br>
            <label class="label-input" for=""> Peso do Material:
                <br>
                <input type="text" name="tamanho_Material" placeholder="Peso" id="tamanho_Material">
            </label>
            <br>
            <label for="tipo_login">Tipo de Material:</label>
            <br>
            <select name="tipo_equipamento" id="tipo_equipamento">
                <option value="Concreto">Concreto</option>
                <option value="Brita">Brita</option>
                <option value="Areia">Areia</option>
                <option value="Aço">Aço</option>
                <option value="Paineis de Vidro">Paineis de Vidro</option>
                <option value="Lajes">Lajes</option>
            </select>
            <br>
        `;
        }
        if (tipo_produto === "produtos_quimicos") {
            caracteristicas.innerHTML = `
            <label class="label-input" for=""> Fornecedor:
                <br>
                <input type="text" name="fornecedor" placeholder="fabricante" id="fornecedor">
            </label>
            <br>
            <label class="label-input" for=""> Peso do Material/Litros:
                <br>
                <input type="text" name="tamanho_quimicos" placeholder="Peso/Litros" id="tamanho_quimicos">
            </label>
            <br>
            <label for="tipo_login">Tipo de Quimicos:</label>
            <br>
            <select name="tipo_quimicos" id="tipo_quimicos">
                <option value="Gases">Gases</option>
                <option value="Líquidos inflamáveis">Líquidos inflamáveis</option>
                <option value="Sólidos inflamáveis">Sólidos inflamáveis</option>
                <option value="Substâncias oxidantes e peróxidos orgânicos">Substâncias oxidantes e peróxidos orgânicos</option>
                <option value="Substâncias tóxicas e substâncias infectantes">Substâncias tóxicas e substâncias infectantes</option>
                <option value="Substâncias corrosivas">Substâncias corrosivas</option>
                <option value="Substâncias e artigos perigosos diversos.">Substâncias e artigos perigosos diversos.</option>
            </select>
            <br>
        `;
        }
        if (tipo_produto === "bebidas") {
            caracteristicas.innerHTML = `
            <label class="label-input" for=""> Marca:
                <br>
                <input type="text" name="marca_bebidas" placeholder="Marca" id="marca_bebidas">
            </label>
            <br>
            <label class="label-input" for=""> Litros:
                <br>
                <input type="text" name="litros" placeholder="Litros" id="litros">
            </label>
            <br>
            <label for="tipo_login">Tipo de Bebida:</label>
            <br>
            <select name="tipo_bebidas" id="tipo_bebidas">
                <option value="Sem alchol">Sem alchol</option>
                <option value="Com Alchol">Com Alchol</option>
                <option value="Sucos">Sucos</option>
                <option value="Água">Água</option>
                <option value="Energéticos">Energéticos</option>
                <option value="Tonicas">Tonicas</option>
            </select>
            <br>
        `;
        }
        if (tipo_produto === "brinquedos") {
            caracteristicas.innerHTML = `
            <label class="label-input" for=""> Marca:
                <br>
                <input type="text" name="marca_brinquedos" placeholder="Marca" id="marca_brinquedos">
            </label>
            <br>
            <label class="label-input" for=""> Tamanho:
                <br>
                <input type="text" name="tamanho_brinquedo" placeholder="Tamanho" id="tamanho_brinquedo">
            </label>
            <br>
            <label for="tipo_login">Tipo de brinquedos:</label>
            <br>
            <select name="tipo_brinqueds" id="tipo_brinqueds">
                <option value="Carros">Carros</option>
                <option value="Pelucias">Pelucias</option>
                <option value="Bonecos">Bonecos</option>
=======

>>>>>>> Stashed changes

            </select>
            <br>
        `;
        }
    });

</script>

