<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular Valor do Frete</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

</head>
<body>

    <form id="formDestino" action="calculofrete.php">
        <p>
            <label for="">Cep de origem</label>
            <input name="sCepOrigem" type="text">
        </p>

        <p>
            <label for="">Cep de destino</label>
            <input name="sCepDestino" type="text">
        </p>

        <p>
            <label for="">Peso</label>
            <input name="nVlPeso" type="text">
        </p>

        <p>
            <label for="">Comprimento</label>
            <input name="nVlComprimento" type="text">
        </p>

        <p>
            <label for="">Altura</label>
            <input name="nVlAltura" type="text">
        </p>

        <p>
            <label for="">Largura</label>
            <input name="nVlLargura" type="text">
        </p>

        <p>
            <label for="">Serviço</label>
            <select name="nCdServico" id="">
                <option value="04014">Sedex</option>
                <option value="04510">PAC</option>
            </select>
        </p>

        <button type="button" id="calcular">Calcular</button>

<p id="resultado"></p>

<script>
    $('#calcular').click(function() {
        let formSerialized = $('#formDestino').serialize();
        $.post('calculofre.php', formSerialized, function(resultado) {
            resultado = JSON.parse(resultado);
            let valorFrete = resultado.preco;
            let prazoEntrega = resultado.prazo;
            $('#resultado').php(`O valor do frete é <b>R$ ${valorFrete}</b> e o prazo de entrega é <b>${prazoEntrega} dias úteis</b>.`);
        });
    });
</script>

</body>
</html>