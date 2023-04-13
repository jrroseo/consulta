
<?php
require "principal.php";
?>


<body>
<section class="appointment" id="appointment">

<a href="usuario.php" class="btn"><i class="fa fa-reply"></i> <span >VOLTAR</span> </a>
                
<h1 class="heading"> <span>EDITAR SEU PERFIU</span></h1>    

<div class="row">

<?php

$username = $_SESSION["username"];

//$conn = pg_connec

//$conn = pg_connect('host=localhost dbname=healthcare user=postgres email=user'); 

// $conn=mysqli_connect('localhost','root','root')or die('can not connect');
//       mysqli_select_db('healthcare',$conn) or die('can not select database');


$query = "select patient_email from patient where patient_username='{$username}';";
$result = mysqli_query($conn, $query);

$rows = mysqli_num_rows($result);

for ($i = 0; $i < $rows; $i++) {
	$tuple = mysqli_fetch_array($result);
	$email = $tuple['patient_email'];
	
}
echo
"
<form action='process_editPatientProfile.php' method='post'>

<div class='form-control'>

<input type='email' name='email' required='required' id='email' value='$email' class='box'>

</div>
<input type='submit' name='submit' value='EDITAR' class='btn'>
				<div class='form-control'>

				<input type='password' name='password' required='required' id='password' value='' placeholder='Digite sua senha atual...' class='box'>
				
				</div>
				<div class='form-control'>

				<input type='password' name='newpassword' required='required' id='password' value='' placeholder='Digite sua novo senha...' class='box'>
				
				</div>
				 
			  <input type='submit' name='submit' value='ATUALIZAR' class='btn'>
				</form>";
				mysqli_close($conn);
?>
	 </section>
