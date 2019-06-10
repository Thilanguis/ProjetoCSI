<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>DietPro</title>
    <link rel="stylesheet" href="css/estilo.css">


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <?php include_once 'head.php' ?>
</head>

<body>
    <div class="">
        <?php if(isset($_POST['idCliente'])): ?>
        <!-- Recebe os dados de Novo Agendamento e grava no banco -->
        <?php
                $idCliente      = $_POST['idCliente'];
                $dataAgendada   = $_POST['dataAgendada']; ### Não deve ser possível agendar uma data anterior ao dia
                $horaAgendada   = $_POST['horaAgendada'];
                ### $idNutricionista = $_SESSION['idUser'];
                $idNutricionista = 1; ###

                if($idCliente != '' and $dataAgendada != '' and $horaAgendada != '' ){
                    
                    include 'conexao.php';
                    include 'banco.php';
                                
                    if(agendarCliente($con, $idNutricionista, $idCliente, $dataAgendada, $horaAgendada)){  header('Refresh: 2, nutricionistaMenu.php');
                        ?>
        <div class="alert alert-success animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px; text-align: center;">
            Agendamento realizado!
        </div>
        <?php
                       
                    }else{ header('Refresh: 2, nutricionistaMenu.php');
                        echo "<div class='alert alert-danger' role='alert'> Agendamento não realizado! Tente novamente. </div>";
                    }
                    
                }else{  header('Refresh: 2, agendaBuscarCliente.php?idCliente='.$idCliente);
                    echo "<div class='alert alert-danger' role='alert'> Preencha todos os campos! </div>";
                }
            ?>
        <?php else: ?>



        <!-- (Btn) Novo Agendamento - Buscar Cliente -->
        <h4 id="menuNutricionista">Agendamento de Consulta &nbsp; <img id="microscopio" src="img/icons8-planejador-48.png" alt=""></h4>
        <div class=" card-group justify-content-center">
            <?php foreach($clientes as $cliente): ?>
            <form action="agendarClienteTabela.php" method="POST">
                <div class="card border-info mb-3 mx-1 container" style="max-width: 18rem; margin-top: 80px;">
                    <div class="card-body text-info">
                        <input type="hidden" name="idCliente" value="<?php echo $cliente['ID_CLIENTE'] ?>">
                        <h5 class="card-title"><?php echo $cliente['NOME'].'<br><span>'.calcularIdade($con, $cliente['ID_CLIENTE']).'</span>'?></h5>
                        <p class="card-text form-group"><input type="date" class="form-control  text-center" name="dataAgendada" id="dataAgendada" required>
                            <input type="time" class="form-control my-1  text-center" name="horaAgendada" id="horaAgendada" required>
                        </p>
                    </div>
                
                    <div class="card-footer text-right">
                       <a class="btn btn-secondary btn-sm v" href="nutricionistaMenu.php">Cancelar</a>
                        <button type="submit" class="btn btn-info btn-sm" v>Agendar</button>
                    </div>
                </div>
            </form>
            <?php endforeach;?>
        </div>
        <?php endif; ?>

    </div>

</body>

</html>
