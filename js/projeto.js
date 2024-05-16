document.getElementById('criarProjeto').addEventListener('click', function() {
    window.location.href = 'criarProjeto.php'; 
});


document.getElementById('listarProjeto').addEventListener('click', function() {
    window.location.href = 'listaDeProjetos.php'; 
});


document.addEventListener("DOMContentLoaded", function() {
    const cards1 = document.getElementById("criarProjeto");
    const cards2 = document.getElementById("listarProjeto");

    cards1.addEventListener("mouseenter", function() {
        cards2.classList.add("blur");
    });

    cards1.addEventListener("mouseleave", function() {
        cards2.classList.remove("blur");
    });


    cards2.addEventListener("mouseenter", function() {
        cards1.classList.add("blur");
    });

    cards2.addEventListener("mouseleave", function() {
        cards1.classList.remove("blur");
    });


});



