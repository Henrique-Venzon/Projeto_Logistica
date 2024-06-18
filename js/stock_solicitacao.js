document.addEventListener("DOMContentLoaded", function() {
    var cards = document.querySelectorAll('.card');

    cards.forEach(function(card) {
        card.addEventListener('click', function() {
            limparTabelaPosicoes();
        });
    });

    function limparTabelaPosicoes() {
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
                    document.querySelector('.tabelaPosicoes').innerHTML = xhr.responseText;
                } else {
                    console.error('Ocorreu um erro ao consultar o estoque.');
                }
            }
        };

        xhr.open('POST', 'processamento/consultar_estoque.php'); 
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('posicao=' + encodeURIComponent(posicao));
    }
    
});

document.addEventListener("DOMContentLoaded", function() {
    if (typeof posicoes !== 'undefined' && typeof quantidade_pesquisada !== 'undefined') {
        var cards = document.querySelectorAll('.card');
        cards.forEach(function(card) {
            card.style.backgroundColor = 'black';
        });

        posicoes.forEach(function(item) {
            var card = document.getElementById(item.posicao.toLowerCase());
            if (card) {
                if (item.quantidade_enviada > quantidade_pesquisada) {
                    card.style.backgroundColor = '#298c0d';
                } else if (item.quantidade_enviada == quantidade_pesquisada) {
                    card.style.backgroundColor = '#15c6c4';
                } else if (item.quantidade_enviada < quantidade_pesquisada) {
                    card.style.backgroundColor = '#eb0000';
                }
            }
        });
    }
});

