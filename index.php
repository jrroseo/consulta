
<?php
require "principal.php";
?>

<body>
<section class="appointment" id="appointment">

<a href="home.html" class="btn"><i class="fa fa-reply"></i> <span >VOLTAR</span> </a>
                
<h1 class="heading"> <span>ACESSAR CONTA</span></h1>    

<div class="row">

  <form action="login.php" method="post" class="form" >
   
            <input type="text"name="input_uname"  required=" required" id="input_uname" placeholder="Digite seu nome de usuário..." class="box">

            <input type="input_pword" name="input_pword" id="input_pword" placeholder="Digite sua senha..." class="box">
            
            <input type="submit" name="submit" value="ENTRAR" class="btn">
  
  </form>
  </section>
