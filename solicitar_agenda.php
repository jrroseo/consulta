<?php
	require "principal.php";
	//session_start();

	if ($_SESSION['login']==0) header('Location: login_page.php');
?>
<body>

<section class="home" id="home">

<div class="content">

<a href="usuario.php" class="btn"><i class="fa fa-reply"></i> <span >VOLTAR</span> </a>
<table class="table table-striped">
  <thead>
      <h1 class="heading"><span>ESPECIALIDADES MÉDICAS </span></h1>
   
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		
		//Receber o número da página
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		//Setar a quantidade de itens por pagina
		$qnt_result_pg = 3;
		
		//calcular o inicio visualização
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
		$result_specializationinfo = "SELECT * FROM specializationinfo LIMIT $inicio, $qnt_result_pg";
		$resultado_specializationinfo = mysqli_query($conn, $result_specializationinfo);
		while($linhas = mysqli_fetch_assoc($resultado_specializationinfo)){	 
			
			//if ($linhas['Name'] =="Area Administrativa" || $linhas['Name'] =="Professor" || $linhas['Name'] =="Estudante"){ 
				
					echo " <tbody>
					<tr>
					  <th scope='row'>".$linhas['SpecializationID']."</th>
					 ";
					echo "<td><h3><a href='usuario.php' >".$linhas['Name']."</a></h3></td>";			
					echo "</td>";
				echo "</tr>";
				
			}
		
		//Paginção - Somar a quantidade de usuários
		$result_pg = "SELECT COUNT(SpecializationID) AS num_result FROM specializationinfo";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		//echo $row_pg['num_result'];
		//Quantidade de pagina 
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
		echo "
		</tbody>
	  </table>";
		//Limitar os link antes depois
		$max_links = 2;
		echo "<a href='solicitar_agenda.php?pagina=1'class='btn'><span>Primeira</span></a> ";
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='solicitar_agenda.php?pagina=$pag_ant'><span>$pag_ant</span></a> ";
			}
		}
			
		echo "$pagina ";
		
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='solicitar_agenda.php?pagina=$pag_dep'class='btn'><span>$pag_dep</span></a> ";
			}
		}
		
		echo "<a href='solicitar_agenda.php?pagina=$quantidade_pg' class='btn'><span>Ultima</span></a>";
		
		?>		 
 
 
    </section>
