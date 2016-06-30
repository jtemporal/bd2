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
			    
				// Testar se o $_POST para data de atendimento é vazio
				if(! (empty($_POST['dta_atendimento']) ) )
				{
					$dta_atendimento = $_POST['dta_atendimento'];
					//Seleciona os atendimentos com data igual a recebida
					$result1 = pg_exec($con, "SELECT * FROM atendimento WHERE data='$dta_atendimento'");
					$tot_tuplas = pg_numrows($result1);
					echo "Para a data $dta_atendimento tivemos os seguintes atentimentos<br><br>";
					//mostra todos os atendimentos da data recebida
					for($tupla=0;$tupla<$tot_tuplas;$tupla++){
						$atendimento = pg_result($result1,$tupla,0);
						$horario = pg_result($result1,$tupla,1);
						$cliente = pg_result($result1,$tupla,5);
						printf("
							ID do Cliente: $cliente<br>
							ID do Atendimento: $atendimento<br>
							Horario: $horario<br><br>
						");
					}
				}
	
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
