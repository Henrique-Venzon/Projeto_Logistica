<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "logistica";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT quantidade_atual, limite_maximo FROM armazem WHERE id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if ($row["quantidade_atual"] < $row["limite_maximo"]) {
      $sql = "UPDATE armazem SET quantidade_atual = quantidade_atual + 1 WHERE id = 1";
      if ($conn->query($sql) === TRUE) {
        echo "Item adicionado com sucesso!";
      } else {
        echo "Erro ao adicionar item: " . $conn->error;
      }
    } else {
      echo "O armazém está cheio. Não é possível adicionar mais itens.";
    }
  }
} else {
  echo "0 results";
}
$conn->close();
