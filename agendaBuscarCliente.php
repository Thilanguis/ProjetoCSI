<?php
    
    include 'conexao.php';
    include 'banco.php';
    include 'head.php';

    $clientes = [];
    # Verifica o campo que está preechido e realiza o agendamento
    if(($_POST['inCliente'] != '') or ($_POST['inCPF'] != '')){
        if($_POST['inCliente'] != ''){
            
            $identificador = $_POST['inCliente'];
            $clientes = buscarCliente($con,$identificador, $idTipo = 'nome');
            
            if(!empty($clientes)){
                include 'agendarClienteTabela.php';      
            }else{
                header('refresh:2,nutricionistaMenu.php');
             ?>
<div class="alert alert-danger animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px; text-align: center;">
    Paciente não encontrado!
</div>
<?php
            }

        }elseif($_POST['inCPF'] != ''){          
            
            $identificador = $_POST['inCPF'];
            $clientes = buscarCliente($con,$identificador, $idTipo = 'CPF');

            if(!empty($clientes)){
                include 'agendarClienteTabela.php'; 
            }else{
                header('refresh:2,nutricionistaMenu.php');
         ?>
<div class="alert alert-danger animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px; text-align: center;">
    CPF não cadastrado!
</div>
<?php
            }
        }
 
    }else{
        header('refresh:2,nutricionistaMenu.php');
         ?>
<div class="alert alert-danger animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px; text-align: center;">
    Preencha algum campo!
</div>
<?php
        
    }
?>
