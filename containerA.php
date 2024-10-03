<?php
$id_aluno = 1;
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/amem.svg">

    <meta charset="utf-8">
    <title><?php
        $tituloPag = 'Container';
        echo "$tituloPag";
        ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="css/containerA.css">
    <link rel="stylesheet" href="css/responsividade/containerResponsivo.css">
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
    include_once('include/conexao.php');
    // Verifica a conexão
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if ($_SESSION['tipo_login'] != 'professor') {
        if (isset($_SESSION['id_aluno'])) {
            $id_aluno = $_SESSION['id_aluno'];
        } else {
        }
    }
    $sql = "SELECT id_container, placa, nome_motorista, container, navio, Cliente, tipo, lacre, `Lacre Sif`, Temperatura, IMO, NOnu, situacao FROM container WHERE turma_id='" . $_SESSION['turma'] . "' AND situacao = 'enviado' AND id_container NOT IN (SELECT id_transporte FROM atividade_concluida WHERE id_aluno = '" . $id_aluno . "');";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id_container = $row["id_container"];
            $placa = $row["placa"];
            $NomeMotorista = $row["nome_motorista"];
            $container = $row["container"];
            $navio = $row["navio"];
            $cliente = $row["Cliente"];
            $tipo = $row["tipo"];
            $lacre = $row["lacre"];
            $LacreSif = $row["Lacre Sif"];
            $Temperatura = $row["Temperatura"];
            $IMO = $row["IMO"];
            $NOnu = $row["NOnu"];
            $situacao = $row["situacao"];
            $resultado_de_container = 'True';

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

            <div class="tabela-scroll">
                <div class="form">
                    <form action="processamento/processarcontaineraluno.php" method="POST">
                        <div class="inputs">
                            <div class="juntar">
                                <label for="">Placa do Caminhão:</label>
                                <input type="text" id="placa" name="placa" value="<?php if (!isset($placa))
                                    ($placa = '');
                                echo($placa); ?>" readonly>
                                <!-- Tags escondidas para o form! NÂO EXCLUIR VENZON! -->
                                <input type="hidden" name="id_atividade" value="<?php if (!isset($id_container))
                                    ($id_container = '');
                                echo $id_container; ?>">
                            </div>
                            <div class="juntar">
                                <label for="">Nome do Motorista:</label>
                                <input type="text" name="NomeMotorista" value="<?php if (!isset($NomeMotorista))
                                    ($NomeMotorista = '');
                                echo $NomeMotorista ?>" readonly>
                            </div>
                            <div class="juntar">
                                <label for="">Container:</label>
                                <input type="text" name="container" value="<?php if (!isset($container))
                                    ($container = '');
                                echo($container) ?>" readonly>
                            </div>
                            <div class="juntar">
                                <label for="">Navio:</label>
                                <input type="text" name="navio" value="<?php if (!isset($navio))
                                    ($navio = '');
                                echo($navio) ?>" readonly>
                            </div>
                            <div class="juntar">
                                <label for="">Cliente:</label>
                                <input type="text" name="cliente" value="<?php if (!isset($cliente))
                                    ($cliente = '');
                                echo($cliente) ?>" readonly>
                            </div>
                            <div class="juntar">
                                <label for="">Tipo:</label>
                                <input type="text" name="tipo" value="<?php if (!isset($tipo))
                                    ($tipo = '');
                                echo($tipo) ?>" readonly>
                            </div>
                            <div class="juntar">
                                <label for="">Lacre:</label>
                                <input type="text" name="lacre" value="<?php if (!isset($lacre))
                                    ($lacre = '');
                                echo($lacre) ?>" readonly>
                            </div>
                            <div class="juntar">
                                <label for="">Lacre SIF:</label>
                                <input type="text" name="LacreSif" value="<?php if (!isset($LacreSif))
                                    ($LacreSif = '');
                                echo($LacreSif) ?>" readonly>
                            </div>
                            <div class="juntar">
                                <label for="">Temperatura:</label>
                                <input type="text" name="Temperatura" value="<?php if (!isset($Temperatura))
                                    ($Temperatura = '');
                                echo($Temperatura) ?>" readonly>
                            </div>
                            <div class="juntar">
                                <label for="">IMO:</label>
                                <input type="text" name="IMD" value="<?php if (!isset($IMO))
                                    ($IMO = '');
                                echo($IMO) ?>" readonly>
                            </div>
                            <div class="juntar">
                                <label for="">N° ONU:</label>
                                <input type="text" name="NOnu" value="<?php if (!isset($NOnu))
                                    ($NOnu = '');
                                echo($NOnu) ?>" readonly>
                            </div>
                            <h1>Assinale se tiver algum problema</h1>
                            <div class="problema">
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="1" type="checkbox" name="sem_lona">
                                        <label for="1">Sem lona</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="2" type="checkbox" name="avariana_lateral_direita">
                                        <label for="2">Avariana lateral direita</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="3" type="checkbox" name="sem_cabo_de_energia">
                                        <label for="3">Sem cabo de energia</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="4" type="checkbox" name="avaria_no_teto">
                                        <label for="4">Avaria no teto</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="5" type="checkbox" name="avaria_na_frente">
                                        <label for="5">Avaria na frente</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="6" type="checkbox" name="sem_lacre">
                                        <label for="6">Sem lacre</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="7" type="checkbox" name="adesivos_avariados">
                                        <label for="7">Adesivos avariados</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="8" type="checkbox" name="excesso_de_altura">
                                        <label for="8">Excesso de altura</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="9" type="checkbox" name="excesso_na_direita">
                                        <label for="9">Excesso na direita</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="10" type="checkbox" name="excesso_na_esquerda">
                                        <label for="10">Excesso na esquerda</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="11" type="checkbox" name="excesso_na_frente">
                                        <label for="11">Excesso frontal</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="12" type="checkbox" name="painel_avariado">
                                        <label for="12">Painel avariado</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="13" type="checkbox" name="avariana_na_lateral_esquerda">
                                        <label class="ajeitarTxt" for="13">Avariana na lateral esquerda</label>
                                    </div>
                                </div>
                                <div class="juntar2">
                                    <div class="input-group">
                                        <input id="14" type="checkbox" name="container_bem_desgastado">
                                        <label for="14">Container bem desgastado</label>
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
                        <text>Nenhum Container disponível</text>
                    </div>
                    </form>';
                            ?>
                        </div>
                </div>
            </div>
        </div>
    </div>

</main>


<script src="js/sidebar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>