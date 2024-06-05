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
        // Definir todos os cards como brancos inicialmente após a pesquisa ser feita
        var cards = document.querySelectorAll('.card');
        cards.forEach(function(card) {
            card.style.backgroundColor = 'black';
        });

        // Aplicar as cores conforme a quantidade pesquisada
        posicoes.forEach(function(item) {
            var card = document.getElementById(item.posicao.toLowerCase());
            if (card) {
                if (item.quantidade_enviada > quantidade_pesquisada) {
                    card.style.backgroundColor = 'green';
                } else if (item.quantidade_enviada == quantidade_pesquisada) {
                    card.style.backgroundColor = 'yellow';
                } else if (item.quantidade_enviada < quantidade_pesquisada) {
                    card.style.backgroundColor = 'red';
                }
            }
        });
    }
});

