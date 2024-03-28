<!DOCTYPE html>

<html>
    <head>

        <title>ENTRAR e REGISTRAR</title>
        <link rel="stylesheet" href="estiloLogin">

    </head>
    <body>
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">Entrar</h2>
                <p class="description description-primary">Já tem uma conta?</p>
                <button id="signin" class="btn btn-primary"><h3>Entrar</h3></button>
            </div>    
            <div class="second-column">
                <h2 class="title title-second">Crie sua conta</h2>
                <p class="description description-second">Use seu email para o registro:</p>
                <form class="form">
                    <label class="label-input" for="">
                        <input type="text" placeholder="Nome">
                    </label>
                    
                    <label class="label-input" for="">
                        <input type="email" placeholder="Email">
                    </label>
                    
                    <label class="label-input" for="">
                        <input type="password" placeholder="Senha">
                    </label>

                    <label class="opcaoRadio" for="">
                    <input  type="radio" name="opcao" value="CLIENTE">
                        <h3>Cliente</h3>
                    <input  type="radio" name="opcao" value="FORNECEDOR">
                        <h3>Fornecedor</h3>
                    </label>
                    
                    <button class="btn btn-second"><h3 class="ajeitarcadastro">Cadastrar</h3></button>        
                </form>
            </div><!-- second column -->
        </div><!-- first content -->
        <div class="content second-content">
            <div class="first-column">
                <h2 class="title title-primary">Seja<br>bem-vindo!</h2>
                <p class="description description-primary">Não tem uma conta?</p>
                <button id="signup" class="btn btn-primary"><h3>Crie sua conta</h3></button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">entre na sua conta</h2>
                <p class="description description-second">Use sua conta do email:</p>
                <form class="form">
                
                    <label class="label-input" for="">
                        <input type="email" placeholder="Email">
                    </label>
                
                    <label class="label-input" for="">
                        <input type="password" placeholder="Senha">
                    </label>
                
                    <a class="password" href="#">Esqueceu sua senha?</a>
                    <button class="btn btn-second"><h3>Entrar</h3></button>
                </form>
            </div><!-- second column -->
        </div><!-- second-content -->
    </div>
    <script src="login.js"></script>
        
    </body>
</html>
<!-- TESTE-content -->