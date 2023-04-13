<?php
require "principal.php";
?>

  <section class="appointment" id="appointment">

  <a href="home.html" class="btn"><i class="fa fa-reply"></i> <span >VOLTAR</span> </a>
  
    <h1 class="heading"> <span>CADASTRAR CONTA</span></h1>

    <div class="row">

      <form action="process_cadastrar_patient.php" method="post" class="form">
        <div class="form-control">

          <input type='text' name='id' required='required' id="id" placeholder="Digite seu R.H..." class="box">

        </div>

        <div class="form-control">

          <input type='text' name='username' required='required' id="username" placeholder="Digite seu nome de usuário" class="box">

        </div>

        <div class="form-control">

          <input type='text' name='lName' required='required' id="lname" placeholder="Digite seu soprenome" class="box">

        </div>

        <div class="form-control">

          <input type='text' name='eadd' required='required' id="eadd" placeholder="Digite seu E-mail.." class="box">

        </div>

        <div class="form-control">

          <input type='password' name='password' required='required' id="password" placeholder="Digite sua senha..." class="box">

        </div>
        <div class="continue-button">
                    <input type="checkbox" required name="termos">
                    <label for="termos" class="labelTermos"> Li e concordo com os <a href="termospdf/TermosOrthoHand.pdf" target="_blank">Termos e Condições</a> do site. </label><br><br>
                    
                </div>
        <input type="submit" name="submit" value="CADASTAR" class="btn">
      </form>

    </div>

  </section>
