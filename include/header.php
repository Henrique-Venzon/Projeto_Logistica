<style>
    img {
    -webkit-user-select: none; 
    -moz-user-select: none;   
    -ms-user-select: none;    
    user-select: none;        
  }
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
    margin-left: 7.7%;
    height: 60px;
    width: 62px;
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
@media only screen and (max-width: 600px) {
    .sair{
    position: absolute;
    left: 94%; 
    transform: translateX(-50%);
}
    .logo h1{
    margin-top: 3%;
    margin-left: 5.3%;
    font-size: 100%;

}
.logo img{
    margin-left: 18%;
    height: 40px;
    width: 42px;
}

.sair i{
    font-size: 20px;
    color: white;
    padding: 7px;
}
.senai{
    display: none;
}
.nomeLogin{
    left: 67%;
}
.nomeLogin h1{
    font-size: 100%;
}
}
  
  @media only screen and (min-width: 601px) and (max-width: 1024px) {
    .logo img{
    margin-left: 10%;
    height: 45px;
    width: 45px;
}
  }
  
  @media only screen and (min-width: 1025px) and (max-width: 1440px) {
    .logo img{
    margin-left: 10%;
    height: 45px;
    width: 45px;
}
   
  }
  @media only screen and (min-width: 1440px) {
    .logo img{
    margin-left: 9%;
    height: 55px;
    width: 55px;
}
  }
  
  
</style>



<header>
    <div class="logo">
            <img src="img/amem.png" alt="">
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