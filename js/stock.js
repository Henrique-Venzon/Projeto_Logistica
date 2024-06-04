document.getElementById('voltar').addEventListener('click', function() {
    window.location.href = 'telaEstoque.php'; 
});
document.addEventListener("DOMContentLoaded", function() {
    var cards = document.querySelectorAll('.card');

    cards.forEach(function(card) {
        card.addEventListener('click', function() {
            limparTabelaPosicoes();
        });
    });

    function limparTabelaPosicoes() {
        // Limpar a tabela 'tabelaPosicoes'
        var tabelaPosicoes = document.querySelector('.tabelaPosicoes');
        tabelaPosicoes.innerHTML = '';
    }
});
document.addEventListener("DOMContentLoaded", function() {
    var cards = document.querySelectorAll('.card');

    cards.forEach(function(card) {
        card.addEventListener('click', function() {
            var posicao = card.querySelector('h1').innerText;
            consultarEstoque(posicao);
        });
    });

    function consultarEstoque(posicao) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Exibir os resultados na tabela 'tabelaPosicoes'
                    document.querySelector('.tabelaPosicoes').innerHTML = xhr.responseText;
                } else {
                    console.error('Ocorreu um erro ao consultar o estoque.');
                }
            }
        };

        xhr.open('POST', 'processamento/consultar_estoque.php'); // Caminho ajustado para 'processamento'
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('posicao=' + encodeURIComponent(posicao));
    }
    
});



