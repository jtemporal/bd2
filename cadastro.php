<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Cadastro ClinEstet</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
        <div>
            <h1>Cadastro efetuado com sucesso!</h1>
        </div>
        <div class="register">
            <h2>É NOIS JOCA</h2>

	<?php
	    
		$dta_admissao = $_POST['dta_admissao'];
		$dta_demissao = $_POST['dta_demissao'];
		$dta_nasc = $_POST['dta_nasc'];
		$nro_mat = $_POST['nro_mat'];
		$cod_sec = $_POST['cod_sec'];
		$cidade = $_POST['cidade'];
		$estado = $_POST['estado'];
		$bairro = $_POST['bairro'];
		$fone = $_POST['fone'];
		$cargo = $_POST['cargo'];
		$nome = $_POST['nome'];
		$sexo = $_POST['sexo'];
		$cep = $_POST['cep'];
		$cpf = $_POST['cpf'];
		$rua = $_POST['rua'];
		$rg = $_POST['rg'];

		//print_r($_POST);
	    
		$conex1 = pg_connect("host = 143.107.137.62  
					port = 5432  
					dbname = clinestet_new  
					user = ibm15g9  
					password = 2130")
			or die ("Falha na conexão!".pg_last_error()); 

		$result1 = pg_exec($conex1, "INSERT INTO funcionario
						VALUES ('$cpf','$dta_nasc','$sexo','$nome','$nro_mat','$rg','$dta_admissao','$cargo','$rua','$bairro','$cep','$cidade','$estado','$fone','$cod_sec','$dta_demissao');");
	
		pg_close($conex1);
	
	?>
	</div>
	</body>
</html>
