<?php
require "principal.php";
?>

<body>

<section class="icons-container">

			<div class="icons">
				
				<?php

$characters = '0123456789';
$string = '';
for ($i = 0; $i < 6; $i++) {
	$string .= $characters[rand(0, strlen($characters) - 1)];
}
$patient_id = ($_POST['id']);
$patient_username = $_POST['username'];
$patient_lname = $_POST['lName'];
$patient_email = $_POST['email'];
$patient_password = md5($_POST['password']);
$patient_rstatus = 'Aprovado';
$a = 0;
$ctr = 0;
$patient_email = $patient_email;

$queryCheck1 = "select patient_id from patient where patient_id='{$patient_id}';";
$resultCheck1 = mysqli_query($conn, $queryCheck1) or die("pergunta errada");

$queryCheck2 = "select doctor_username from doctor where doctor_username='{$patient_username}';";
$resultCheck2 = mysqli_query($conn, $queryCheck2) or die("pergunta errada");

while ($myrow1 = mysqli_fetch_assoc($resultCheck1)) {
	$a = $a + 1;
}
while ($myrow2 = mysqli_fetch_assoc($resultCheck2)) {
	$a = $a + 1;
}
// echo $a;
if ($a == 0) {
	$query = "insert into patient (patient_id, patient_username, patient_lname, patient_email, patient_password, patient_deleted) values
('{$patient_id}','{$patient_username}','{$patient_lname}','{$patient_email}','{$patient_password}','n');";	

	$result = mysqli_query($conn, $query);
	if (!$result) {
		echo "Problema com consulta " . $query . "<br/>";

		echo mysqli_error($conn);
		exit();
	} else {
		echo "<i class='fa fa-check-circle'></i>
		<h3>CADASTRO REALIZOU COM SUCESSO</h3>
			
			<p>Acora você já pode ter o acesso ao sistema, informe um usuário e senha na tela ( ACESSAR CONTA ), após FECHAR esta tela.</p>
	  ";
	}
} else {

	echo "<i class='fa fa-user-times'></i>
	<h3>O NOME DO USUÁRIO JÁ EXISTE!</h3><p>Entre em contato com o Serviço de Atendimento ao Cliente (SAC)..</p>";
}
mysqli_close($conn);

?>
					<a href="index.php" class="btn"><i class="fa fa-reply"></i> <span >VOLTAR</span> </a>
                
				</div>
</div>

</section>
