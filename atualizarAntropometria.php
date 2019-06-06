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
    $id_antropometria            = $_GET["id_antropometria"];  
    $altura                      = $_GET["altura"];
    $pesoAtual                   = $_GET["pesoAtual"];
    $bracoEsq                    = $_GET["bracoEsq"];
    $bracoDir                    = $_GET["bracoDir"];
    $cintura                     = $_GET["cintura"];
    $quadril                     = $_GET["quadril"];
    $torax                       = $_GET["torax"];
    $abdominal                   = $_GET["abdominal"];
    $coxaEsq                     = $_GET["coxaEsq"];
    $coxaDir                     = $_GET["coxaDir"];
    $panturrilhaEsq              = $_GET["panturrilhaEsq"];
    $panturrilhaDir              = $_GET["panturrilhaDir"];
    $antebracoEsq                = $_GET["antebracoEsq"];
    $antebracoDir                = $_GET["antebracoDir"];
    $tricipital                  = $_GET["tricipital"];
    $subescapular                = $_GET["subescapular"];
    $suprailiaca                 = $_GET["suprailiaca"];
    $abdominal                   = $_GET["abdominal"];
    $quadriceps                  = $_GET["quadriceps"];
    
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
