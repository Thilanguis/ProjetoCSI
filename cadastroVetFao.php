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
    
    $id                     = $_POST["id_cliente"];
    $sono                   = $_POST["sono"];
    $NAF_sono               = $_POST["NAF_sono"];
    $trabalho               = $_POST["trabalho"];
    $NAF_trabalho           = $_POST["NAF_trabalho"];
    $estudo                 = $_POST["estudo"];
    $NAF_estudo             = $_POST["NAF_estudo"];
    $exerFisico             = $_POST["exerFisico"];
    $NAF_exerFisico         = $_POST["NAF_exerFisico"];
    $avontade               = $_POST["avontade"];
    $NAF_avontade           = $_POST["NAF_avontade"];
    $ativFisica             = $_POST["ativFisica"];
    $NAF_ativFisica         = $_POST["NAF_ativFisica"];
   
    $verifTotal = $sono != "0" || $trabalho != "0" || $estudo != "0" || $exerFisico != "0" || $avontade != "0" || $ativFisica != "0" || $NAF_sono != "0" || $NAF_trabalho != "0" || $NAF_estudo != "0" || $NAF_exerFisico != "0" || $NAF_avontade != "0" || $NAF_ativFisica != "0";
        
     $verifHoras = $sono != "0" || $trabalho != "0" || $estudo != "0" || $exerFisico != "0" || $avontade != "0" || $ativFisica != "0"; 
        
    $verifNAF = $NAF_sono != "0" || $NAF_trabalho != "0" || $NAF_estudo != "0" || $NAF_exerFisico != "0" || $NAF_avontade != "0" || $NAF_ativFisica != "0"; 
    
    $sql = "insert into vet_fao (ID_VET_FAO, SONO, TRABALHO, ESTUDO, EXER_FISICO, A_VONTADE, ATIV_FISICA, Hora_Sono, Hora_trabalho, Hora_Estudo, Hora_Exer_Fisico, Hora_A_vontade, Hora_Ativ_fisica, ID_CLIENTE) values (null, '".$sono."','".$trabalho."','".$estudo."','".$exerFisico."','".$avontade."','".$ativFisica."','".$NAF_sono."','".$NAF_trabalho."','".$NAF_estudo."','".$NAF_exerFisico."','".$NAF_avontade."','".$NAF_ativFisica."', '".$id."')";
        
header('refresh:2,form-VetFao.php?id_cliente='.$id);      
if($verifTotal)
{
    header('refresh:2,form-VetFao.php?id_cliente='.$id);
   if($verifNAF)
   {       header('refresh:2,form-VetFao.php?id_cliente='.$id);
        if($verifHoras)
        {       header('refresh:2,form-VetFao.php?id_cliente='.$id);
            if(mysqli_query($con,$sql))  
            {       header('refresh:2,form-Dietoterapia.php?id_cliente='.$id);
         ?>
        <div class="alert alert-success animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px; text-align: center;">
            Dados gravados com sucesso!
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
            Erro ao cadastrar contato!
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
