<style>
    header{
    width: 100%;
    background-color: #1c1c1c;
    display: flex;
    align-items: center;
    height:7.95vh;

}

.nomeLogin{
    left: 82%;
    display: flex;
    position: absolute;
    align-items: center;
    text-shadow: 2px 2px 10px #000000;
}
.nomeLogin h1{
    color: #FFF;
    font-size: 200%;
}

.senai{
    height: 5%;
    display: flex;
    left: 52%; 
    transform: translateX(-50%); 
    position: absolute;
    box-shadow: 0 0 5px #fff;

}

.imagemDec{
    margin-left: 25px;
    height: 65px;
    width: 65px; 
    display: flex;
}
.logo{
    align-items: center;
    display: flex;
    margin-left: 0.2%;
}
.logo h1{
    margin-left: 5.3%;
    color: #FFF;
    font-size: 200%;
    text-shadow: 2px 2px 10px #000000; 
}
.logo img{
    margin-left: 3%;
    height: 5%;
    width: 7%;
}
.sair{
    position: absolute;
    left: 96%; 
    transform: translateX(-50%);
}

.sair i{
    font-size: 45px;
    color: white;
    padding: 7px;
}
</style>



<header>
    <div class="logo">
            <img src="img/logo.png" alt="">
            <h1>LogConnect</h1>
        </div>
         
        <div class="senai">
            <img src="img/logo-senai03.png" alt="">
        </div>
        
        <div class="nomeLogin">  
        <?php
				print '<h1>'.$_SESSION['username'].'</h1>';
                            ?>
        </div>
        <div class="sair">
        <a href="processamento/sair.php"><i class="fa-solid fa-person-running"></i></a>
        </div> 

        
   
    </header>