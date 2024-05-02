document.getElementById('btnCriarProjeto').addEventListener('click', function() {
    document.querySelector('.bv').style.display = 'none';
    document.querySelector('.Imagem').style.display = 'none';
    document.getElementById('divCriarProjeto').style.display = 'block';
    document.getElementById('divContinuarProjeto').style.display = 'none';
    document.getElementById('divListarProjetos').style.display = 'none';
});

document.getElementById('btnContinuarProjeto').addEventListener('click', function() {
    document.querySelector('.bv').style.display = 'none';
    document.querySelector('.Imagem').style.display = 'none';
    document.getElementById('divCriarProjeto').style.display = 'none';
    document.getElementById('divContinuarProjeto').style.display = 'block';
    document.getElementById('divListarProjetos').style.display = 'none';
});

document.getElementById('btnListarProjetos').addEventListener('click', function() {
    document.querySelector('.bv').style.display = 'none';
    document.querySelector('.Imagem').style.display = 'none';
    document.getElementById('divCriarProjeto').style.display = 'none';
    document.getElementById('divContinuarProjeto').style.display = 'none';
    document.getElementById('divListarProjetos').style.display = 'block';
});