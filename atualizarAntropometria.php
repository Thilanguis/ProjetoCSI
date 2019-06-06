<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <title>Dietpro</title>
    <?php include_once 'head.php'; 
    ?>

</head>

<body>
    <div class="">

        <?php
        
         include_once 'funcoesProjeto.php';
        
    $id                          = $_GET["id_cliente"];    
    $id_antropometria            = str_replace(',', '.',$_GET["id_antropometria"]);  
    $altura                      = str_replace(',', '.',$_GET["altura"]);
    $pesoAtual                   = str_replace(',', '.',$_GET["pesoAtual"]);
    $bracoEsq                    = str_replace(',', '.',$_GET["bracoEsq"]);
    $bracoDir                    = str_replace(',', '.',$_GET["bracoDir"]);
    $cintura                     = str_replace(',', '.',$_GET["cintura"]);
    $quadril                     = str_replace(',', '.',$_GET["quadril"]);
    $torax                       = str_replace(',', '.',$_GET["torax"]);
    $abdominal                   = str_replace(',', '.',$_GET["abdominal"]);
    $coxaEsq                     = str_replace(',', '.',$_GET["coxaEsq"]);
    $coxaDir                     = str_replace(',', '.',$_GET["coxaDir"]);
    $panturrilhaEsq              = str_replace(',', '.',$_GET["panturrilhaEsq"]);
    $panturrilhaDir              = str_replace(',', '.',$_GET["panturrilhaDir"]);
    $antebracoEsq                = str_replace(',', '.',$_GET["antebracoEsq"]);
    $antebracoDir                = str_replace(',', '.',$_GET["antebracoDir"]);
    $tricipital                  = str_replace(',', '.',$_GET["tricipital"]);
    $subescapular                = str_replace(',', '.',$_GET["subescapular"]);
    $suprailiaca                 = str_replace(',', '.',$_GET["suprailiaca"]);
    $abdominal                   = str_replace(',', '.',$_GET["abdominal"]);
    $quadriceps                  = str_replace(',', '.',$_GET["quadriceps"]);
    
    include_once 'conexao.php';

    
    $sql = "update a_antropometrica set altura='".$altura."', peso='".$pesoAtual."', CIR_BRACO_ESQ='".$bracoEsq."', CIR_BRACO_DIR='".$bracoDir."', CIR_CINTURA='".$cintura."', CIR_QUADRIL='".$quadril."', CIR_TORAX='".$torax."', CIR_ABDOMINAL='".$abdominal."', CIR_COXA_ESQ='".$coxaEsq."', CIR_COXA_DIR='".$coxaDir."', CIR_PANTURRILHA_ESQ='".$panturrilhaEsq."', CIR_PANTURRILHA_DIR='".$panturrilhaDir."', CIR_ANTEBRACO_ESQ='".$antebracoEsq."', CIR_ANTEBRACO_DIR='".$antebracoDir."', dc_tricipital='".$tricipital."', DC_SUBESCAPULAR_AXILAR='".$subescapular."', DC_SUPRAILIACA='".$suprailiaca."', DC_ABDOMINAL='".$abdominal."', DC_QUADRICEPS='".$quadriceps."' where id_antropometria='".$id_antropometria."'";
  


            if(mysqli_query($con,$sql))  
    {
         ?>
        <div class="alert alert-success animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;">
            Antropometria atualizada com sucesso!
        </div>

        <div id="btnConfirmacao">
            <?php echo "<a href='form-Dietoterapia.php?id_cliente=".$id."'><button id='btnVoltar1' type='button' class='btn btn-warning animated zoomIn' style='margin-left:48%;'>OK</button></a>" ?>
        </div>
        <?php
        }
        else
        {
            
         ?>
        <div class="alert alert-warning animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;">
            Erro ao atualizar Antropometria!
        </div>

        <div id="btnConfirmacao">
            <?php echo "<a href='form-Dietoterapia.php?id_cliente=".$id."'><button id='btnVoltar1' type='button' class='btn btn-warning animated zoomIn' style='margin-left:48%;'>OK</button></a>" ; echo mysqli_error($con);?>
        </div>
        <?php
        }
        
            
    mysqli_close($con);
?>

    </div>
</body>

</html>
