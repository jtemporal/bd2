<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Consulta ClinEstet</title>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
	<body>
		<div>
		    <h1>Consulta ao banco de dados ClineTest:</h1>
		</div>
       	<div class="register">
			<?php  
	
				//Conexão com o banco
			    $con = pg_connect("host=143.107.137.62
					port=5432
					dbname=clinestet_new
					user=ibm15g9
					password=2130") 
			    or die ("Falha na conexão!".pg_last_error());
			    
				// Testar se o post para data de atendimento e para a sec nao estao
		    	if(!(empty($_POST['dta_atendimento'])) or !(empty($_POST['cod_sec'])) ){
			
					// consulta apenas se houver data
					if (!(empty($_POST['dta_atendimento'])) and (empty($_POST['cod_sec']))){
						$dta_atendimento = $_POST['dta_atendimento'];
						// Mostra atendimento em determinada data
						$result1 = pg_exec($con, "SELECT * FROM atendimento WHERE data='$dta_atendimento'");
						$tot_tuplas = pg_numrows($result1);
						echo "Para a data $dta_atendimento tivemos os seguintes atentimentos<br><br>";
						for($tupla=0;$tupla<$tot_tuplas;$tupla++){
							$atendimento = pg_result($result1,$tupla,0);
							$horario = pg_result($result1,$tupla,1);
							$cliente = pg_result($result1,$tupla,5);
							printf("
								ID do Cliente: $cliente<br>
								ID do Atendimento: $atendimento<br>
								Horario: $horario<br><br>
							  ");
						} // for
					} // if apenas atendimento por data

					// consulta apenas se houver o cod da secretaria
					if(!(empty($_POST['cod_sec'])) and (empty($_POST['dta_atendimento']))){
						$cod_sec = $_POST['cod_sec'];
						// Mostra atendimento em determinada data
						$result3 = pg_exec($con, "SELECT * FROM atendimento WHERE cliente_secretaria_funcionario_cpf='$cod_sec'");	
						$tot_tuplas = pg_numrows($result3);
						echo "A secretaria de ID $cod_sec cadastrou os seguintes atendimentos<br><br>";
						for($tupla=0;$tupla<$tot_tuplas;$tupla++){
							$atendimento = pg_result($result3,$tupla,0);
							$horario = pg_result($result3,$tupla,1);
							$cliente = pg_result($result3,$tupla,5);
							printf("
								ID do Cliente: $cliente<br>
								ID do Atendimento: $atendimento<br>
								Horario: $horario<br><br>
							");
						} // for
					} // if apenas sec
				
					// consulta casada secretaria e data do atendimento
					else {
						$cod_sec = $_POST['cod_sec'];
						$dta_atendimento = $_POST['dta_atendimento'];
						// Mostra atendimento em determinada data
						$result4 = pg_exec($con, "SELECT * FROM atendimento WHERE cliente_secretaria_funcionario_cpf='$cod_sec' AND data='$dta_atendimento'");
						$tot_tuplas = pg_numrows($result4);
						echo "A secretaria de ID $cod_sec cadastrou os seguintes atendimentos na data $dta_atendimento<br><br>";
						for($tupla=0;$tupla<$tot_tuplas;$tupla++){
							$atendimento = pg_result($result4,$tupla,0);
							$horario = pg_result($result4,$tupla,1);
							$cliente = pg_result($result4,$tupla,5);
							printf("
								ID do Cliente: $cliente<br>
								ID do Atendimento: $atendimento<br>
								Horario: $horario<br><br>
							  ");
						} // for
					} // else
				} // if consulta casada atendimento	
	
				// Testar se o $_POST para numero de pacote é vazio
				if(! (empty($_POST['nroPacote']) ) )
				{
					$nroPacote = $_POST['nroPacote'];
					//Selecionando infos do pacote com codigo igual ao recebido
					$result2 = pg_exec($con, "SELECT * FROM pacote WHERE codigo=$nroPacote"); 
					$tot_tuplas = pg_numrows($result2);
					echo "As informações para o pacote $nroPacote são:<br><br>";
					//mostra todas as infos do pacote
					for($tupla=0;$tupla<$tot_tuplas;$tupla++){
						$valor = pg_result($result2,$tupla,1);
						$desc = pg_result($result2,$tupla,2);
						printf("
							Valor: $valor<br>Descrição: $desc<br><br>
						");
					}
				}
				//fecha conexão com o banco
				pg_close($con);
			?>
		</div>
</html>
