<?php
$servername = "localhost";
$username = "root.Att";
$password = "root";
$dbname = "logistica";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM armazem";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row mostrar cada produto.

} else {
  echo "0 results";
}
$conn->close();
?>
