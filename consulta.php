<?php
    
    $dta_atendimento = $_POST['dta_atendimento'];
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $nroPacote = $_POST['nroPacote'];
    
    // Testar conexão
    $con = pg_connecti("host=HOST port=PORTA dbname=SECRET user=USER password=PASSWORD") 
    or die ("Falha na conexão!".pg_last_error());
   
   
   // Mostra atendimento em determinada data
   
    pg_query($con, "BEGIN;");
    pg_query($con, "SELECT * FROM mostra_atendimentos(data_atendimento);");

    $result = pg_query($con, "FETCH ALL FROM a;");

    echo '<pre>';
    print_r(pg_fetch_all($result));
    echo '</pre>';

    pg_query($con, "COMMIT;");
    
    // Mostra o preço de um pacote.
    pg_query($con, "BEGIN;");
    pg_query($con, "SELECT * FROM mostra_valor_pacote(nroPacote);");

    $result = pg_query($con, "FETCH ALL FROM a;");

    echo '<pre>';
    print_r(pg_fetch_all($result));
    echo '</pre>';

    pg_query($con, "COMMIT;");
    
    // Mostra pacotes entre dois valores.
    pg_query($con, "BEGIN;");
    pg_query($con, "SELECT * FROM mostra_pacotes_entre_valores(valor1, valor2);");

    $result3 = pg_query($con, "FETCH ALL FROM a;");

    echo '<pre>';
    print_r(pg_fetch_all($result3));
    echo '</pre>';

    pg_query($con, "COMMIT;");
    
    }
    pg_close($con);

?>
