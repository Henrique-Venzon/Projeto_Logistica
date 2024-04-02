<?php
// iniciar uma sessão
session_start();

$hostname = "127.0.0.1";
$user = "root.Att";
$password = "root";
$database = "logistica";

$conexao = new mysqli($hostname, $user, $password, $database);

if ($conexao->connect_errno) {
    echo "Failed to connect to MySQL: " . $conexao->connect_error;
    exit();
} else {
    if (isset($_POST['Usuario']) && isset($_POST['Senha'])) {
        // Evita caracteres epsciais (SQL Inject)
        $username = $conexao->real_escape_string($_POST['Usuario']);
        $password = $conexao->real_escape_string($_POST['Senha']);

        $sql = "SELECT `id`, `username` FROM `logins`
                    WHERE `username` = '" . $username . "'
                    AND `password` = '" . $password . "';";

        $resultado = $conexao->query($sql);

        if ($resultado->num_rows != 0) {
            $row = $resultado->fetch_array();
            $_SESSION['id'] = $row[0];
            $_SESSION['username'] = $row[1];

            // Verificar se já existe um registro para esse usuário na tabela armazem
            $sql = "SELECT `id` FROM `armazem_limite` WHERE `login_id` = " . $_SESSION['id'] . ";";
            $resultado = $conexao->query($sql);

            if ($resultado->num_rows == 0) {
                // Se não existir, inserir um novo registro com o limite máximo padrão de 300
                $sql = "INSERT INTO `armazem_limite` (`login_id`, `quantidade_atual`, `limite_maximo`) VALUES (" . $_SESSION['id'] . ", 0, 300);";
                $conexao->query($sql);
            }

            $conexao->close();

            header('Location: telaInicio.php', true, 301);
            exit();
        } else {

            $conexao->close();
            header('Location: index.php', true, 301);
        }
    }
}
?>