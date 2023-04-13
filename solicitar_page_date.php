<?php
require "principal.php";
// session_start();
if ($_SESSION['login'] == 0) header('Location: login_page.php');
include('calender_function.php');
$month = date("n");
$year = date("Y");
?>

<body>
	<main>
		
			<div class="p-5 mb-4 bg-light rounded-3">
				
						<h3 class="fs-2">SELECIONE A DATA</h3><br>
						<?php
			 $doctor_user = $_POST['username'];
			 $_SESSION['docuser']=$doctor_user;
					 
			 $doctor_query = mysqli_query($conn,"SELECT doctor_lname, doctor_fname, s.Name as sname,h.name as hname
			 FROM doctor d,specializationinfo s, hospitalinfo h WHERE s.SpecializationID=doctor_specialization and doctor_hospital=h.HospitalID and doctor_username='$doctor_user'") ;
			 $doctor_result = mysqli_fetch_array($doctor_query);
							
			 echo "Detalhes do médico";
			 echo '<p>' .'Nome:'. $doctor_result['doctor_fname'] . ' ' . $doctor_result['doctor_lname'] . ' <br/>' ;				
			 echo 'Specialisation:'. $doctor_result['sname'] . ' <br/>' ;
			 echo 'Hospital:'. $doctor_result['hname'] . ' <br/>' ;	
			 echo "Por favor, selecione a data para o agendamento<br/>";
 echo'*Dias indicados em vermelho não são possíveis</br>*Dias indicados em verde são possíveis</br><a href="solicitar_page_date2.php"><button type="button" class="btn btn-primary btn-lg">PROXIMO MÊS</button></a>';	
			 mysqli_error($conn);
					 
			 echo draw_calendar($month,$year);	
			
			 mysqli_close($conn);
		 ?><br>
		 
		 <a href="paginaUsuario.php"><button type="button" class="btn btn-danger btn-primary btn-lg">SAIR</button></a>
	
		</div>
			</main>
	
		