<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <title>Dietpro</title>
    <?php include_once 'head.php'; ?>

</head>

<body>
    <div class="">

        <?php
        
        include_once 'conexao.php';
        
        include_once 'funcoesProjeto.php';
    
    $id                     = $_GET["id_cliente"];
    $id_vet_fao             = $_GET["id_vet_fao"];
    $sono                   = $_GET["sono"];
    $NAF_sono               = $_GET["NAF_sono"];
    $trabalho               = $_GET["trabalho"];
    $NAF_trabalho           = $_GET["NAF_trabalho"];
    $estudo                 = $_GET["estudo"];
    $NAF_estudo             = $_GET["NAF_estudo"];
    $exerFisico             = $_GET["exerFisico"];
    $NAF_exerFisico         = $_GET["NAF_exerFisico"];
    $avontade               = $_GET["avontade"];
    $NAF_avontade           = $_GET["NAF_avontade"];
    $ativFisica             = $_GET["ativFisica"];
    $NAF_ativFisica         = $_GET["NAF_ativFisica"];
   
    $verifTotal = $sono != "" || $trabalho != "" || $estudo != "" || $exerFisico != "" || $avontade != "" || $ativFisica != "" || $NAF_sono != "" || $NAF_trabalho != "" || $NAF_estudo != "" || $NAF_exerFisico != "" || $NAF_avontade != "" || $NAF_ativFisica != "";
        
     $verifHoras = $sono != "" || $trabalho != "" || $estudo != "" || $exerFisico != "" || $avontade != "" || $ativFisica != ""; 
        
    $verifNAF = $NAF_sono != "" || $NAF_trabalho != "" || $NAF_estudo != "" || $NAF_exerFisico != "" || $NAF_avontade != "" || $NAF_ativFisica != ""; 
        
    $sql = "update vet_fao set sono='".$sono."', hora_sono='".$NAF_sono."', trabalho='".$trabalho."', hora_trabalho='".$NAF_trabalho."', estudo='".$estudo."', hora_estudo='".$NAF_estudo."', exer_fisico='".$exerFisico."', Hora_Exer_fisico='".$NAF_exerFisico."', a_vontade='".$avontade."', hora_a_vontade='".$NAF_avontade."', ativ_Fisica='".$ativFisica."', hora_ativ_Fisica='".$NAF_ativFisica."' where id_vet_fao='".$id_vet_fao."'";
        
header('refresh:2,form-Dietoterapia.php?id_cliente='.$id);      
if($verifTotal)
{
    header('refresh:2,form-Dietoterapia.php?id_cliente='.$id);
   if($verifNAF)
   {       header('refresh:2,form-Dietoterapia.php?id_cliente='.$id);
        if($verifHoras)
        {       header('refresh:2,form-Dietoterapia.php?id_cliente='.$id);
            if(mysqli_query($con,$sql))  
            {       header('refresh:2,form-Dietoterapia.php?id_cliente='.$id);
         ?>
        <div class="alert alert-success animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px; text-align: center;">
            NAF atualizado com sucesso!
        </div>

        <!-- <div id="btnConfirmacao"> -->
        <?php //echo "<a href='form-Dietoterapia.php?id_cliente=".$id."'><button id='btnVoltar1' type='button' class='btn btn-warning animated zoomIn' style='margin-left:48%;'>OK</button></a>" ?>
        <!-- </div> -->
        <?php
        }
        else
        {
                
         ?>
        <div class="alert alert-warning animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px; text-align: center;">
            Erro ao atualizar NAF!
            <?php echo mysqli_error($con); ?>
        </div>

        <!-- <div id="btnConfirmacao"> -->
        <?php //echo "<a href='form-VetFao.php?id_cliente=".$id."'><button id='btnVoltar1' type='button' class='btn btn-warning animated zoomIn' style='margin-left:48%;'>OK</button></a>" ?>
        <!-- </div> -->
        <?php
        }
        }
        
        else
        {
    ?>
        <div class="alert alert-danger animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px; text-align: center;">
            Preencha algum campo de horas!
        </div>

        <!-- <div id="btnConfirmacao"> -->
        <?php //echo "<a href='form-VetFao.php?id_cliente=".$id."'><button id='btnVoltar1' type='button' class='btn btn-warning animated zoomIn' style='margin-left:48%;'>OK</button></a>" ?>
        <!-- </div> -->
        <?php
                }
            }
        else
        {
    ?>
        <div class="alert alert-danger animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px; text-align: center;">
            Preencha algum campo de NAF!
        </div>

        <!-- <div id="btnConfirmacao"> -->
        <?php //echo "<a href='form-VetFao.php?id_cliente=".$id."'><button id='btnVoltar1' type='button' class='btn btn-warning animated zoomIn' style='margin-left:48%;'>OK</button></a>" ?>
        <!-- </div> -->
        <?php  
        }
    }
        else
        {
    ?>
        <div class="alert alert-danger animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px; text-align: center;">
            Nenhum campo preenchido!
        </div>

        <!-- <div id="btnConfirmacao"> -->
        <?php //echo "<a href='form-VetFao.php?id_cliente=".$id."'><button id='btnVoltar1' type='button' class='btn btn-warning animated zoomIn' style='margin-left:48%;'>OK</button></a>" ?>
        <!-- </div> -->
        <?php 
        
}
            
    mysqli_close($con);
?>

    </div>
</body>

</html>
