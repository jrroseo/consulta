<?php
	require "principal.php";
	include('time_checker.php');
	
	//session_start();
	if ($_SESSION['login']==0) header('Location: login_page.php');
?>

<body>

<section class="home" id="home">

<div class="content">
<a href="usuario.php" class="btn"><i class="fa fa-reply"></i> <span >VOLTAR</span></a>
        <h3>ESPECIALIDADES MÉDICAS</h3>
        <p> Confira abaixo as especialidades com vagas disponíveisnos no hospital e nos Ambulatórios Descentralizados.<br>
		<?php

$username = $_SESSION['username'];
$query = "SELECT app_patientname, app_number, app_date, app_time, app_doctorname, h.name as hname, app_status FROM appointment a,hospitalinfo h WHERE h.hospitalID=app_hospital and  app_patientusername='$username' ORDER BY app_date";

$result = mysqli_query($conn, $query);

echo '<table class="table_doctors">
 
                 <tr>
			<th>App #</th>
			<th>Date</th>
			<th>Time</th>
			<th>Doctor</th>
			<th>Hospital</th>
			<th>Status</th>
			<th>Manage</th>
		</tr>';						
				               
$x = 1;
					while ($row = mysqli_fetch_row($result)) {
						echo '<tr>';

						$count = count($row);
						for ($datacounter = 0; $datacounter < $count; $datacounter++) {
							$c_row = current($row);
							if ($datacounter > 0) {
								echo '
			
			
			
			<td style="width:150px;text-align:center;">' . $c_row . '</td>';
							}
							if ($datacounter == 1) {
								$tableID = $c_row;
							}
							next($row);
						}

						/*Buttons*/
						echo '<td><form action="cancel_apprequest.php" method="post">';

						/*Get time difference in minutes*/
						$timestamp_query = mysqli_query($conn, "SELECT app_date, app_time FROM appointment WHERE app_number='$tableID'");
						$timestamp_array = mysqli_fetch_array($timestamp_query);
						$time_difference = check_time($timestamp_array[0], $timestamp_array[1]);

						/*If the time_difference is more than 24 hours*/
						if ($time_difference <= 1440) {
							echo '<a href="#" class="btn bg-danger-light trash"><i class="bi bi-trash-fill"></i></a> onclick="alert(\'Cannot cancel appointment!\');">Cancel</button>';
						} else {
							echo '<input type="hidden" name="cancelid" value="' . $tableID . '">
						<button type="submit" onclick="return confirm(\'você deseja cancelar esta? Esta consulta não poderá ser remarcada novamente\');">Cancel</button>';
						}

						echo '</form></td></tr>';
					}

					echo '</table> <tr class="text-center">
<td colspan="16"></td>
</tr>';

					mysqli_close($conn);
					?>
 </p></div>
    </section>
