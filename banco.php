<?php 
  
    function calcularIdade($con, $idCliente){
        /* Calcula a idade do cliente */
        $query = "
            SELECT dt_nascimento FROM cliente
            WHERE id_cliente = '$idCliente';
        ";
        $resultado = mysqli_query($con, $query);

        $dtNascimento = new DateTime(mysqli_fetch_assoc($resultado)['dt_nascimento']);
        
        $hoje = new DateTime(getdate()['year']."-".getdate()['mon']."-".getdate()['mday']);

        $idade = date_diff($hoje, $dtNascimento);

        return ($idade->format('%y')." anos");
    }

    function buscarAgendados($con, $dataConsulta){
    /* Buscar os clientes que possuem agendamento para o dia selecionado   */
        $sqlBusca = "SELECT * FROM consultas NATURAL JOIN cliente WHERE dataConsulta = '$dataConsulta'";
        
        // Data selecionada na agenda    
        $resultado = mysqli_query($con,$sqlBusca);        
        $agendados = array();    // Cria um vetor vazios onde serão incluídos os cliente agendados na data
        
        while ($cliente = mysqli_fetch_assoc($resultado)){ 
            //fetch associative array - busca matriz associativa, retorna uma matriz representando a próxima linha no conjunto de resultados
            // A cada rodada associa um vetor tarefa ao vetor tarefas, retorna NULL quando não houver mais linhas
            $agendados[] = $cliente;
        }      
        return $agendados;
    }

    function agendarCliente($con, $idNutricionista, $idCliente, $dataAgendada, $horaAgendada){
        $query = "INSERT INTO consultas(idNutricionista, ID_CLIENTE, dataConsulta, hora, confirmada)
            VALUES ($idNutricionista, $idCliente, '$dataAgendada', '$horaAgendada', 0)
        ";

        if(mysqli_query($con, $query)){
            return TRUE;
        }else{
            echo mysqli_error($con);
            return FALSE;
        }
        
    }

    
    function   buscarCliente($con, $identificador, $idTipo){
    /* Agenda o cliente específicado */
        $query = "
            SELECT * FROM cliente
            WHERE $idTipo LIKE '$identificador%'
        ";
        $resultado = mysqli_query($con, $query);

        $clientes = array();
        while($cliente = mysqli_fetch_assoc($resultado)){
            $clientes[] = $cliente;
        }
        
        return $clientes;
    }

?>
