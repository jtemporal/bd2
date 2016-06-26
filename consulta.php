<?php
    
    $dta_atendimento = $_POST['dta_atendimento'];
    $dta_nasc = $_POST['dta_nasc'];
    
    
    // Testar conexão
    $conex1 = pg_connecti("host=dcmshare.ffclrp.usp.br port=5432 dbname=secret user=ibm15g9 password=2130") or die ("Falha na conexão!".pg_last_error());
    // escrever os valores na ordem dentro do parentesis
    $sql_func = "INSERT INTO FUNCIONARIO VALUES()";

    function insert(){
        global $sql_func, $conex1;
        $insertion = pg_query($conex1, $sql_func) or die ("Falha na inserção dos dados!<br>".pg_last_error());
        if ($insertion){
            echo "Cadastro do novo Funcionário realizado com sucesso";
        } else {
            echo "Falha ao cadastrar novo Funcionário, entre em contato com o administrador";
        }
        insert($conex1)
    }
    pg_close($conex1);


?>
