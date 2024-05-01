document.getElementById('adicionarInputs').addEventListener('click', function() {
  var colunasDiv = document.querySelector('.colunas');

  var novoInput = document.createElement('input');
  novoInput.type = "text";
  novoInput.name = "produto";
  novoInput.required = true;
  colunasDiv.querySelector('.produto').appendChild(novoInput);

  novoInput = document.createElement('select');
  novoInput.name = "unidade";
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
  novoInput.name = "quantidade";
  novoInput.min = "1";
  colunasDiv.querySelector('.quantidade').appendChild(novoInput);

  novoInput = document.createElement('input');
  novoInput.type = "number";
  novoInput.name = "valor";
  novoInput.step = "0.01";
  colunasDiv.querySelector('.valor').appendChild(novoInput);

  novoInput = document.createElement('input');
  novoInput.type = "text";
  novoInput.name = "ncm";
  novoInput.required = true;
  colunasDiv.querySelector('.ncm').appendChild(novoInput);

  novoInput = document.createElement('input');
  novoInput.type = "text";
  novoInput.name = "cst";
  novoInput.required = true;
  colunasDiv.querySelector('.cst').appendChild(novoInput);

  novoInput = document.createElement('input');
  novoInput.type = "text";
  novoInput.name = "cfop";
  novoInput.required = true;
  colunasDiv.querySelector('.cfop').appendChild(novoInput);
});

document.getElementById('removerUltimo').addEventListener('click', function() {
  var colunasDiv = document.querySelector('.colunas');
  var ultimosInputs = colunasDiv.querySelectorAll('.produto > input:last-child, .unidade > select:last-child, .quantidade > input:last-child, .valor > input:last-child, .ncm > input:last-child, .cst > input:last-child, .cfop > input:last-child');
  ultimosInputs.forEach(function(input) {
    input.remove();
  });
});