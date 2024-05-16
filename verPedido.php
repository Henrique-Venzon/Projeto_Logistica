<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: index.php");
    exit;
}
if (($_SESSION['tipo_login'] != 'professor')) {
    header("Location: index.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['turma'] = $_POST['turma'];}
?>
<!DOCTYPE html>

<head>
<meta name="vierport" content="width=device-width, initial-scale=1.0" >
<link rel="shortcut icon" href="img/amem.svg">

    <meta charset="utf-8">
    <title><?php 
    $tituloPag = 'Ver Pedidos';
    echo "$tituloPag"; 
    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/verPedidos.css">
</head>

<body>
<?php
    include 'include/header.php'
    ?>
    <main>
        <?php
        include 'include/menuLateral.php';
        
        ?>
        <div class="DivDireita">
            <div class="table-inputs">

            <div class="text">
                <h1>Ver Pedidos</h1>
            </div>
                
            <?php        

$servername = "localhost";
$username = "root.Att";
$password = "root";
$dbname = "logistica";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);     

$sql = "SELECT * FROM transporte ORDER BY `transporte`.`situacao` ASC";

$res = $conn->query($sql);

$qtd = $res->num_rows;

if($qtd > 0){
    print "<div class=\"tabela-scroll\">";
    print "<table class='table' >";

    print "<tr>";
            print "<th>N° Pedido</th>";
            print"<th>Situação</th>";
            print "<th>Fechar Pedido</th>";
            print "<th>Ver pedido</th>";
            print "<th style=\"border-right:none;\">Criar Nota Fiscal</th>";
            print "</tr>";
    
        while($row = $res->fetch_object()){
            print "<tr>";
            print "<form action='processamento/fechar_atividade.php' method='post'>";
            print "<input type='hidden' name='id_atividade_ver_perdido' value='" . $row->id . "'>";
            print "<td>".$row->npedido."</td>";
            print "<td>";
            print $row->situacao;
            print "</td>";
            print "<td>
            <button type=\"button\" class=\"reset\" data-id=\"".$row->npedido."\"><span>Fechar Pedido</span></button>
            </td>"; 
            print "<td>";
            print"</form>";
            print "<form action='nPedido.php' method='post'>";
            print "<input type='hidden' name='turma' value='" . $row->npedido . "'>";
            print "<button class=\"reset\" type='submit'><span>Ver</span> </button>";
            print "</form>";
            print"</td>"; 
            print "<td >";
            print "<form action='criardanfe.php' method='post'>";
            print "<input type='hidden' name='turma' value='" . $row->npedido . "'>";
            print "<button type='button' class=\"reset\"><span>Criar</span></button>";
            print "</form>";
            print "</td>";
            print "</tr>";

        }
        print "</table>";
        print "</div>";

}else{
    print "<p class='alert alert-danger'>Não encrontrou nenhum pedido</p>";
}

?>
            </div>
        </div>
    </main>


    <script src="js/ver.js"></script>
    <script src="js/sidebar.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>
