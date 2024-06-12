var modal = document.getElementById("myModal");

var span = document.getElementsByClassName("close")[0];

document.getElementById("verSku").addEventListener("click", function() {
  modal.style.display = "block";
});

span.addEventListener("click", function() {
  modal.style.display = "none";
});

window.addEventListener("click", function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
});