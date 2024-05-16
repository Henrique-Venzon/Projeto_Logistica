const botao = document.querySelector(".toggle-btn");

botao.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
  sidebar.classList.toggle("sidebar-transitioning");

});

