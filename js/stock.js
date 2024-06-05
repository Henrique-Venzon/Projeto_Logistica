document.getElementById('voltar').addEventListener('click', function() {
    window.location.href = 'telaEstoque.php'; 
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