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
    $id               = $_POST["id_cliente"];
    $altura           = $_POST["altura"];
    $pesoAtual        = $_POST["pesoAtual"];
    $bracoEsq         = $_POST["bracoEsq"];
    $bracoDir         = $_POST["bracoDir"];
    $tricipital       = $_POST["tricipital"];
    $subescapular     = $_POST["subescapular"];
    $cintura          = $_POST["cintura"];
    $quadril          = $_POST["quadril"];
    $suprailiaca      = $_POST["suprailiaca"];
    $abdominal        = $_POST["abdominal"];
    $torax            = $_POST["torax"];
    $abdominalCir     = $_POST["abdominalCir"];
    $quadriceps       = $_POST["quadriceps"];
    $coxaEsq          = $_POST["coxaEsq"];
    $coxaDir          = $_POST["coxaDir"];
    $panturrilhaEsq   = $_POST["panturrilhaEsq"];
    $panturrilhaDir   = $_POST["panturrilhaDir"];
    $antebracoEsq     = $_POST["antebracoEsq"];
    $antebracoDir     = $_POST["antebracoDir"];
    
    include_once 'conexao.php';
        
     $ok = $altura != "" && $altura != "0" && $pesoAtual != "" && $pesoAtual != "0"; 
    
    $sql = "insert into a_antropometrica values(null, '".$bracoDir."','".$altura."','".$torax."','".$subescapular."','".$coxaEsq."','".$coxaDir."','".$panturrilhaEsq."','".$panturrilhaDir."','".$cintura."','".$quadril."','".$abdominalCir."','".$quadriceps."','".$pesoAtual."','".$suprailiaca."','".$tricipital."','".$abdominal."','".$antebracoEsq."','".$antebracoDir."','".$bracoEsq."',  '".$id."')";
   
        
        if($ok)
{
            if(mysqli_query($con,$sql))  
    {
         ?>
        <div class="alert alert-success animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;">
            Dados gravados com sucesso!
        </div>

        <div id="btnConfirmacao">
            <?php echo "<a href='form-bioquiomica.php?id_cliente=".$id."'><button id='btnVoltar1' type='button' class='btn btn-warning animated zoomIn' style='margin-left:48%;'>OK</button></a>" ?>
        </div>
        <?php
        }
        else
        {
                
         ?>
        <div class="alert alert-warning animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;">
            Erro ao cadastrar contato!
        </div>

        <div id="btnConfirmacao">
            <?php echo "<a href='form-antropometria.php?id_cliente=".$id."'><button id='btnVoltar1' type='button' class='btn btn-warning animated zoomIn' style='margin-left:48%;'>OK</button></a>" ?>
        </div>
        <?php
        }
        }
        
        else
        {
    ?>
        <div class="alert alert-danger animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;">
            Favor preencher peso e altura!
        </div>

        <div id="btnConfirmacao">
            <?php echo "<a href='form-antropometria.php?id_cliente=".$id."'><button id='btnVoltar1' type='button' class='btn btn-warning animated zoomIn' style='margin-left:48%;'>OK</button></a>" ?>
        </div>
        <?php
        }
       
            

        mysqli_close($con);
        ?>

    </div>
</body>

</html>
