<!DOCTYPE html>

<html>
    <head>

        <title>ENTRAR e REGISTRAR</title>
        <link rel="stylesheet" href="estiloLogin.css">

    </head>
    <body>
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">Professor</h2>
                <p class="description description-primary">Conta do professor</p>
                <button id="signin" class="btn btn-primary"><h3>Entrar</h3></button>
            </div>    
            <div class="second-column">
                <h2 class="title title-second">Aluno</h2>
                <p class="description description-second">Entre com seu registro de aluno:</p>
                <form class="form">
                    <label class="label-input" for="">
                        <input type="text" placeholder="Nome">
                    </label>
                    
                    <label class="label-input" for="">
                        <input type="password" placeholder="Senha">
                    </label>
                    
                    <button class="btn btn-second"><h3 class="ajeitarcadastro">Entrar</h3></button>        
                </form>
            </div><!-- second column -->
        </div><!-- first content -->
        <div class="content second-content">
            <div class="first-column">
                <h2 class="title title-primary">Aluno</h2>
                <p class="description description-primary">Conta do aluno</p>
                <button id="signup" class="btn btn-primary"><h3>entar</h3></button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">Professor</h2>
                <p class="description description-second">Entre com seu registro de professor:</p>
                <form class="form">
                
                    <label class="label-input" for="">
                        <input type="text" placeholder="nome">
                    </label>
                
                    <label class="label-input" for="">
                        <input type="password" placeholder="Senha">
                    </label>
                
                    <button class="btn btn-second"><h3>Entrar</h3></button>
                </form>
            </div>
        </div>
    </div>
    <script src="login.js"></script>
        
    </body>
</html>
