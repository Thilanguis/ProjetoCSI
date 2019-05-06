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
   
    $verifTotal = $sono != "" || $trabalho != "" || $estudo != "" || $exerFisico != "" || $avontade != "" || $ativFisica != "" || $NAF_sono != "" || $NAF_trabalho != "" || $NAF_estudo != "" || $NAF_exerFisico != "" || $NAF_avontade != "" || $NAF_ativFisica != "";
        
     $verifHoras = $sono != "" || $trabalho != "" || $estudo != "" || $exerFisico != "" || $avontade != "" || $ativFisica != ""; 
        
    $verifNAF = $NAF_sono != "" || $NAF_trabalho != "" || $NAF_estudo != "" || $NAF_exerFisico != "" || $NAF_avontade != "" || $NAF_ativFisica != ""; 
    
    $sql = "insert into vet_fao (ID_VET_FAO, SONO, TRABALHO, ESTUDO, EXER_FISICO, A_VONTADE, ATIV_FISICA, Hora_Sono, Hora_trabalho, Hora_Estudo, Hora_Exer_Fisico, Hora_A_vontade, Hora_Ativ_fisica) values (null, '".$sono."','".$trabalho."','".$estudo."','".$exerFisico."','".$avontade."','".$ativFisica."','".$NAF_sono."','".$NAF_trabalho."','".$NAF_estudo."','".$NAF_exerFisico."','".$NAF_avontade."','".$NAF_ativFisica."')";
        
if($verifTotal)
{

   if($verifNAF)
   {
        if($verifHoras)
        {
            if(mysqli_query($con,$sql))  
            {
         ?>
        <div class="alert alert-success animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;">
            Dados gravados com sucesso!
        </div>

        <div id="btnConfirmacao">
            <a href="form-VetFao.php"><button id="btnVoltar1" type="button" class="btn btn-warning animated zoomIn" style="margin-left:48%;">OK</button> </a>
        </div>
        <?php
        }
        else
        {
                
         ?>
        <div class="alert alert-warning animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;">
            Erro ao cadastrar contato!
            <?php echo mysqli_error($con); ?>
        </div>

        <div id="btnConfirmacao">
            <a href="form-VetFao.php"><button id="btnVoltar1" type="button" class="btn btn-warning animated zoomIn" style="margin-left:48%;">OK</button></a>
        </div>
        <?php
        }
        }
        
        else
        {
    ?>
        <div class="alert alert-danger animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;">
            Preencha algum campo de horas!
        </div>

        <div id="btnConfirmacao">
            <a href="form-VetFao.php"><button id="btnVoltar1" type="button" class="btn btn-warning animated zoomIn" style="margin-left:48%;">OK</button></a>
        </div>
        <?php
                }
            }
        else
        {
    ?>
        <div class="alert alert-danger animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;">
            Preencha algum campo de NAF!
        </div>

        <div id="btnConfirmacao">
            <a href="form-VetFao.php"><button id="btnVoltar1" type="button" class="btn btn-warning animated zoomIn" style="margin-left:48%;">OK</button></a>
        </div>
        <?php  
        }
    }
        else
        {
    ?>
        <div class="alert alert-danger animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;">
            Nenhum campo preenchido!
        </div>

        <div id="btnConfirmacao">
            <a href="form-VetFao.php"><button id="btnVoltar1" type="button" class="btn btn-warning animated zoomIn" style="margin-left:48%;">OK</button></a>
        </div>
        <?php 
        
}
            
    mysqli_close($con);
?>

    </div>
</body>

</html>
