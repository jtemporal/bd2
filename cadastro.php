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
    
    // testar campos obrigatorios
    $conex1 = pg_connecti("host=dcmshare.ffclrp.usp.br port=5432 dbname=secret user=ibm15g9 password=2130") or die ("Falha na conexão!".pg_last_error());
    // escrever os valores na ordem dentro do parentesis
    $sql_func = "INSERT INTO FUNCIONARIO VALUES()";

    function insert(){
        global $sql_func, $conex1;
        $insertion1 = pg_query($conex1, $sql_func) or die ("Falha na inserção dos dados!<br>".pg_last_error());
    }

?>
