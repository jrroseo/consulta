<?php
//	include('notification.php');
require "principal.php";
	// session_start();
	if ($_SESSION['login']==0)
		header('Location: index.php');
	else if($_SESSION['login']==2)
		header('Location: dBoardDoctor.php');
?>

<body>
    <!-- services section starts  -->
   
    <section class="services" id="services">

    <a href="home.html"><button type="button" class="btn btn-lg btn-primary mt-5 w-50" data-bs-dismiss="modal"><i class="fa fa-power-off"></i>  SAIR</button></a>
    <h1 class="heading"><?php
                                echo "Seja bem-vindo(a) " . $_SESSION["name"];
                                '<br />';
                                ?><br></h1><span><h2>A solicitação do agendamento de consultas novas acontece através do botão (ESPECIALIDADE MÉDICA). <br>Consultas de retorno e exames são agendados pessoalmente, no guichê de atendimento da própria clínica, de acordo com a solicitação médica.<br> Os atendimentos nos Prontos-Socorros permanecem inalterados.<br> Em casos de dúvidas, entre em contato através dos telefones (11) 1111-8000 / 8001, de segunda a sexta-feira, das 7h às 16h.
 </h2></span>  
    <div class="box-container">
        
            <div class="box">
            <h4><p><i class="fas fa-user-md"></i> ESPECIALIDADE MÉDICA</p></h4>
                
                <p>Selecione o médico especializado, para o seu tratamento.</p>
                <a href="solicitar_agenda.php" class="btn"> Especialidades médicas <span class="fas fa-chevron-right"></span> </a>
            </div>
            <div class="box">
            <h4><p>  <i class="fas fa-calendar"></i>CONSULDA AGENDADA</p></h4>
                
                <p>Visualize sua consulta agendada.</p>
                <a href="appointments_patient.php" class="btn"> AGENDA <span class="fas fa-chevron-right"></span> </a>
                
            </div>
            <div class="box">
            <h4><p><i class="fas fa-user"></i> PERFIL</p></h4>
            <?php
            if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		
		$username = $_SESSION["username"];
		$result_usuarios = "select * from patient where patient_username='{$username}';";
		$resultado_usuarios = mysqli_query($conn, $result_usuarios);
		while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
			echo "ID: " . $row_usuario['patient_id'] . "<br>";
			echo "Nome: " . $row_usuario['patient_lname'] . "<br>";
			echo "E-mail: " . $row_usuario['patient_email'] . "<br>";
			
		}
		
		//Paginção - Somar a quantidade de usuários
		$result_pg = "SELECT patient_id, patient_lname, patient_email FROM patient";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		
        ?>	
                <p>Altere seu perfil clicando no botão abaixo.</p>
                <a href="edit_patientProfile.php" class="btn"> Editar perfil <span class="fas fa-chevron-right"></span> </a>
            </div>

        </div>

    </section>
