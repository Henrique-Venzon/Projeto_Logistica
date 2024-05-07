<!DOCTYPE html>

<html>

<head>

    <title>Projetos</title>
    <link rel="stylesheet" href="css/projetosCSS.css">
    <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">Criar projeto</h2>
                <p class="description description-primary">Crie um novo projeto</p>
                <button id="signin" class="btn btn-primary">
                    <h3>Criar</h3>
                </button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">Lista de projetos</h2>
                <p class="description description-second">Exclua, edite ou continue no projeto</p>
                <form class="form" action='processamento/processarlogin.php' method="POST">
                    <label class="label-input" for=""></label>
                        <input type="text" placeholder="Nome" name="Usuario">
                    
                    <label class="label-input" for=""></label>
                        <input type="password" placeholder="Senha" name='Senha'>
                    
                    <label class="label-input" for=""></label>
                        <input type="text" placeholder="Turma" name='turma'>
                    

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
                        <input type="text" placeholder="Nome" name='Usuario'>
                    

                    <label class="label-input" for=""></label>
                        <input type="password" placeholder="Senha" name='Senha'>
                    

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