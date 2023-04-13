<body>

<section class="icons-container">

			<div class="icons">

<?php
	require "dbconnect.php";
	// session_start();
	//if ($_SESSION['login']==0){

		$username = $_POST['input_uname'];
		$password = md5($_POST['input_pword']);
		$a=0;
		$b=0;
		$c=0;
		$d=0;
		
		//$conn = pg_connect('host=localhost dbname=healthcare user=postgres password=user');
		
		// $conn=mysqli_connect("localhost","root","root","healthcare")or die("can not connect");
	    // mysqli_select_db("healthcare",$conn) or die("can not select database");
		
		
		$resultCheck1=mysqli_query($conn,"select patient_username from patient where patient_username='{$username}' and patient_password!='{$password}'");
		$resultCheck2=mysqli_query($conn,"select patient_username from patient where patient_username='{$username}' and patient_password='{$password}'");
		$resultCheck3=mysqli_query($conn,"select doctor_username from doctor where doctor_username='{$username}' and doctor_password!='{$password}'");
		$resultCheck4=mysqli_query($conn,"select doctor_username from doctor where doctor_username='{$username}' and doctor_password='{$password}'");
		
		while($myrow = mysqli_fetch_assoc($resultCheck1)) {	//patient username
			$a=$a+1;
		}
		while($myrow = mysqli_fetch_assoc($resultCheck2)) {	//patient username and password
			$b=$b+1;
		}
		while($myrow = mysqli_fetch_assoc($resultCheck3)) {	//doctor username
			$c=$c+1;
		}
		while($myrow = mysqli_fetch_assoc($resultCheck4)) {	//doctor username and password
			$d=$d+1;
		}
		
		if (($a==0 && $b==0) && ($c==0 && $d==0)){
			echo "
			<i class='fa fa-user-circle'></i> 
			<h3>USÚARIO NÃO CADASTRADO</h3>
				
				<p>Informe um usuário valido, caso não seja cadastrado, realize para de o acesso</p>
			";
		}else if($a!=0 || $c!=0){
			echo "
			
			<i class='fa fa-unlock-alt'></i> 
			<h3>SENHA NÃO CONFERE</h3>
				
				<p>Informe a senha valida, caso não seja cadastrado, realize para de o acesso.</p>
			";
		}else if($b!=0){
		
			$result = mysqli_query($conn,"select patient_deleted from patient where patient_username='{$username}'");
			$status = mysqli_fetch_row($result);
			
			if($status[0] == "n"){
				$_SESSION["login"] = 1;
				$result = mysqli_query($conn,"select patient_id from patient where patient_username='{$username}'");
				$name = mysqli_fetch_row($result);
				$_SESSION["name"] = $name[0];
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
				header("Location: usuario.php");
				exit;
			}
			else{
				echo "Account Deleted, Please Contact administrator";
			}
		}else if($d!=0){
			$result = mysqli_query($conn,"select doctor_deleted from doctor where doctor_username='{$username}'");
			$status = mysqli_fetch_row($result);
			if($status[0] == "n"){
				$_SESSION["login"] = 2;
				$result = mysqli_query($conn,"select doctor_fname from doctor where doctor_username='{$username}'");
				$name = mysqli_fetch_row($result);
				$_SESSION["name"] = $name[0];
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
				header("Location: dboardDoctor.php");
				exit;
			}
			else{
				echo "Account Deleted, please contact the administrator";
			}
		}
		mysqli_close($conn);
	/*}
	else{
		header('Location: dBoardDoctor.php');
	}*/

?>
					
					<a href="index.php" class="btn"><i class="fa fa-reply"></i> <span >VOLTAR</span> </a>
                
				</div>
</div>

</section>
