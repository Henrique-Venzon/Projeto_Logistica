<!DOCTYPE html>

<html lang="br">

<head>

    <title>LOGIN</title>
    <link rel="stylesheet" href="css/estiloLogin.css">
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap"
          rel="stylesheet">
    <link rel="shortcut icon" href="img/amem.svg">

</head>

<body>
<img class="imgSenai" src="img/logo-senai03.png" alt="">
<div class="container">
    <div class="content first-content">
        <div class="first-column">
            <h2 class="title title-primary">Professor</h2>
            <p class="description description-primary">Conta do professor</p>
            <button id="signin" class="btn btn-primary">
                <h3>Entrar</h3>
            </button>
        </div>
        <div class="second-column">
            <h2 class="title title-second">Aluno</h2>
            <p class="description description-second">Entre com seu registro de aluno:</p>
            <form class="form" action='processamento/processarlogin.php' method="POST">
                <label class="label-input" for=""></label>
                <label>
                    <input type="text" placeholder="Nome" name="Usuario">
                </label>

                <label class="label-input" for=""></label>
                <label>
                    <input type="password" placeholder="Senha" name='Senha'>
                </label>

                <label class="label-input" for=""></label>
                <label>
                    <input min=1 type="number" placeholder="Turma" name='turma'>
                </label>


                <button class="btn btn-second" value="aluno" type='submit' name='action'>
                    <h3 class="ajeitarcadastro">Entrar</h3>
                </button>
            </form>
        </div><!-- second column -->
    </div><!-- first content -->
    <div class="content second-content">
        <div class="first-column">
            <h2 class="title title-primary">Aluno</h2>
            <p class="description description-primary">Conta do aluno</p>
            <button id="signup" class="btn btn-primary">
                <h3>entrar</h3>
            </button>
        </div>
        <div class="second-column">
            <h2 class="title title-second">Professor</h2>
            <p class="description description-second">Entre com seu registro de professor:</p>
            <form class="form" action='processamento/processarlogin.php' method="POST">

                <label class="label-input" for=""></label>
                <label>
                    <input type="text" placeholder="Nome" name='Usuario'>
                </label>

                <label class="label-input" for=""></label>
                <label>
                    <input type="password" placeholder="Senha" name='Senha'>
                </label>


                <button class="btn btn-second" value="professor" name="action" type='submit'>
                    <h3>Entrar</h3>
                </button>
            </form>
        </div>
    </div>
</div>

<script src="js/login.js"></script>

</body>

</html>