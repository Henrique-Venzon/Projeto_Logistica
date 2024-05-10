<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}
if (!isset($_SESSION['turma'])) {
    header("Location: index.php");
    exit;
}
$turma = $_SESSION['turma']
    ?>
<!DOCTYPE html>

<head>
    <meta name="vierport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo32.png" type="image/x-icon">

    <meta charset="utf-8">
    <title><?php
    $tituloPag = 'Container';
    echo "$tituloPag";
    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="css/container.css">
</head>

<body>
    <?php
    include 'include/header.php'
        ?>
    <main>
        <?php
        include 'include/menuLateral.php'
            ?>
        <?php
        $servername = "localhost";
        $username = "root.Att";
        $password = "root";
        $dbname = "logistica";

        // Cria a conexão
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT `id`, `placa`, `NomeMotorista`, `container`, `navio`, `cliente`, `tipo`, `lacre`, `LacreSif`, `Temperatura`, `IMD`, `NOnu`, `situacao` FROM `transporte` where situacao='enviado' AND `turma_id` = $turma ORDER BY id ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $placa = $row["placa"];
                $NomeMotorista = $row["NomeMotorista"];
                $container = $row["container"];
                $navio = $row["navio"];
                $cliente = $row["cliente"];
                $tipo = $row["tipo"];
                $lacre = $row["lacre"];
                $LacreSif = $row["LacreSif"];
                $Temperatura = $row["Temperatura"];
                $IMD = $row["IMD"];
                $NOnu = $row["NOnu"];
                $situacao = $row["situacao"];
                $resultado_de_container='True';
            }

        } else {
            $resultado_de_container = 'false';
        }
        $conn->close();
        ?>

        <div class="DivDireita">
            <div class="table-inputs">
                <div class="txtCont">
                    <h1>Container</h1>
                </div>
                <div class="form">
                    <form action="">
                        <div class="inputs">
                            <div class="juntar">
                                <label for="">Placa do Caminhão:</label>
                                <input type="text" id="placa" name="placa" value="<?php if(!isset($placa))($placa = '');echo ($placa); ?>"
                                    readonly><br>
                            </div>
                            <div class="juntar">
                                <label for="">Nome do Motorista:</label>
                                <input type="text" name="NomeMotorista" value="<?php if(!isset($NomeMotorista))($NomeMotorista='');echo $NomeMotorista ?>"
                                    readonly>
                            </div>
                            <div class="juntar">
                                <label for="">Container:</label>
                                <input type="text" name="container" value="<?php if(!isset($container))($container='');echo ($container) ?>" readonly>
                            </div>
                            <div class="juntar">
                                <label for="">Navio:</label>
                                <input type="text" name="navio" value="<?php if(!isset($navio))($navio='');echo ($navio) ?>" readonly>
                            </div>
                            <div class="juntar">
                                <label for="">Cliente:</label>
                                <input type="text" name="cliente" value="<?php if(!isset($cliente))($cliente='');echo ($cliente) ?>" readonly>
                            </div>
                            <div class="juntar">
                                <label for="">Tipo:</label>
                                <input type="text" name="tipo" value="<?php if(!isset($tipo))($tipo='');echo ($tipo) ?>" readonly>
                            </div>
                            <div class="juntar">
                                <label for="">Lacre:</label>
                                <input type="text" name="lacre" value="<?php if(!isset($lacre))($lacre='');echo ($lacre) ?>" readonly>
                            </div>
                            <div class="juntar">
                                <label for="">Lacre SIF:</label>
                                <input type="text" name="LacreSif" value="<?php if(!isset($LacreSif))($LacreSif='');echo ($LacreSif) ?>" readonly>
                            </div>
                            <div class="juntar">
                                <label for="">Temperatura:</label>
                                <input type="text" name="Temperatura" value="<?php if(!isset($Temperatura))($Temperatura='');echo ($Temperatura) ?>"
                                    readonly>
                            </div>
                            <div class="juntar">
                                <label for="">IMO:</label>
                                <input type="text" name="IMD" value="<?php if(!isset($IMD))($IMD='');echo ($IMD) ?>" readonly>
                            </div>
                            <div class="juntar">
                                <label for="">N° ONU:</label>
                                <input type="text" name="NOnu" value="<?php if(!isset($Nonu))($NOnu='');echo ($NOnu) ?>" readonly>
                            </div>
                            <h1>Assinale se tiver algum problema</h1>
                            <div class="problema">
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="1" type="checkbox" name="">
                                        <label for="1">Sem lona</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="2" type="checkbox" name="">
                                        <label for="2">Avariana lateral direita</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="3" type="checkbox" name="">
                                        <label for="3">Sem cabo de energia</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="4" type="checkbox" name="">
                                        <label for="4">Avaria no teto</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="5" type="checkbox" name="">
                                        <label for="5">Avaria na frente</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="6" type="checkbox" name="">
                                        <label for="6">Sem lacre</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="7" type="checkbox" name="">
                                        <label for="7">Adesivos avariados</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="8" type="checkbox" name="">
                                        <label for="8">Excesso de altura</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="9" type="checkbox" name="">
                                        <label for="9">Excesso na direita</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="10" type="checkbox" name="">
                                        <label for="10">Excesso na esquerda</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="11" type="checkbox" name="">
                                        <label for="11">Excesso frontal</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="12" type="checkbox" name="">
                                        <label for="12">Painel avariado</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="13" type="checkbox" name="">
                                        <label class="ajeitarTxt" for="13">Avariana na lateral esquerda</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="14" type="checkbox" name="">
                                        <label for="14">Container bem desgastado</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>
                <?php
                if ($resultado_de_container != 'false')
                    echo '
                    <div class="enviar">
                        <input type="submit">
                    </div>
                    </form>';
                    elseif ($resultado_de_container == 'false')

                    echo '
                    <div class="enviar">
                        <text>Nenhum Container Selecionado.</text>
                    </div>
                    </form>';
                        ?>
                </div>
            </div>


        </main>



        <script src="js/sidebar.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
    </body>

    </html>