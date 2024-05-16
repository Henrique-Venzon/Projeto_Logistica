var maxInputs = 7;
var inputsAdicionados = 0;

document.getElementById('adicionarInputs').addEventListener('click', function() {
  if (inputsAdicionados < maxInputs) {
    var colunasDiv = document.querySelector('.colunas');

    var novoInput = document.createElement('input');
    novoInput.type = "text";
    novoInput.name = "produto[]";
    novoInput.required = true;
    colunasDiv.querySelector('.produto').appendChild(novoInput);

    novoInput = document.createElement('select');
    novoInput.name = "unidade[]";
    novoInput.required = true;
    novoInput.innerHTML = `
      <option value="UN">UN</option>
      <option value="RL">RL</option>
      <option value="FD">FD</option>
      <option value="KG">KG</option>
    `;
    colunasDiv.querySelector('.unidade').appendChild(novoInput);

    novoInput = document.createElement('input');
    novoInput.type = "number";
    novoInput.name = "quantidade[]";
    novoInput.min = "1";
    colunasDiv.querySelector('.quantidade').appendChild(novoInput);

    novoInput = document.createElement('input');
    novoInput.type = "number";
    novoInput.name = "valor[]";
    novoInput.step = "0.01";
    colunasDiv.querySelector('.valor').appendChild(novoInput);

    novoInput = document.createElement('input');
    novoInput.type = "text";
    novoInput.name = "ncm[]";
    novoInput.required = true;
    colunasDiv.querySelector('.ncm').appendChild(novoInput);

    novoInput = document.createElement('input');
    novoInput.type = "text";
    novoInput.name = "cst[]";
    novoInput.required = true;
    colunasDiv.querySelector('.cst').appendChild(novoInput);

    novoInput = document.createElement('input');
    novoInput.type = "text";
    novoInput.name = "cfop[]";
    novoInput.required = true;
    colunasDiv.querySelector('.cfop').appendChild(novoInput);

    inputsAdicionados++;

    if (inputsAdicionados === maxInputs) {
      document.getElementById('adicionarInputs').disabled = true;
      alert("Número máximo de produtos atingido!");
    }
  }
});

document.getElementById('removerUltimo').addEventListener('click', function() {
  var colunasDiv = document.querySelector('.colunas');
  var ultimoProdutoDiv = colunasDiv.querySelector('.produto:last-child');
  if (ultimoProdutoDiv) {
    ultimoProdutoDiv.remove();
  }

  if (inputsAdicionados > 0) {
    inputsAdicionados--;
  }

  if (inputsAdicionados < maxInputs) {
    document.getElementById('adicionarInputs').disabled = false;
  }
});
