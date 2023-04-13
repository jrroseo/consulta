<?php 
require "principal.php";
?>
<body>
<section class="appointment" id="appointment">

<a href="usuario.php" class="btn"><i class="fa fa-reply"></i> <span >VOLTAR</span> </a>
                
<h1 class="heading"> <span>ACESSAR CONTA</span></h1>    

<div class="row">
<?php
	// session_start();
	
	$username=$_SESSION["username"];
	$email=$_POST["email"];
	$password=$_SESSION["password"];
	$old=md5($_POST["oldpassword"]);
	$new=md5($_POST["newpassword"]);
	
			
	//$conn = pg_connect('host=localhost dbname=healthcare user=postgres password=user'); 
	
	// $conn=mysql_connect("localhost","root","root")or die("can not connect");
	// mysql_select_db("healthcare",$conn) or die("can not select database");
	
	$query = "update patient set patient_email='$email' where patient_username='$username'";
				
				
	$result = mysqli_query($conn,$query); 
	if (!$result) { 
		echo "Problema com a consulta " . $query . "<br/>"; 
	//	echo pg_last_error(); 
		exit(); 
	} 
	else{
		echo "As informações do seu perfil foram editadas com sucesso.";
	}
	
	mysqli_close($conn);
?>


<?php
	session_start();
	
	$username=$_SESSION["username"];
	
	
	//$conn = _connect('host=localhost dbname=healthcare user=postgres password=user');
	
	$conn=mysqli_connect("localhost","root","")or die("can not connect");
	mysqli_select_db($conn,"healthcare") or die("can not select database");
	
	if ($old!=$password){
		echo "<h3>VOCÊ DIGITOU UMA SENHA INCORRETA.</h3>" ;
	}
	else{
		$query = "update patient set patient_password='$new' where patient_username='$username'"; 
		$result = mysqli_query($conn,$query); 
				if (!$result) { 
					echo "Problema com a consulta " . $query . "<br/>"; 
				//	echo pg_last_error(); 
					exit(); 
				} 
				else{
					$_SESSION["password"]=$new;
					echo "Senha editada com sucesso.";
				}
	}

	mysqli_close($conn);
	
?>

</section>

