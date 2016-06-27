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
    $conex1 = pg_connecti("host=HOST port=PORTA dbname=BANCO user=SECRET password=PASSWORD") or die ("Falha na conexão!".pg_last_error());
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
