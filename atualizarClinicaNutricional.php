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
        
    $id                                      = $_GET["id_cliente"];    
    $ID_A_CLINICANUTRICIONAL                 = $_GET["ID_A_CLINICANUTRICIONAL"];  
    $bioquirecomendacoesOrientacoes          = $_GET["recomendacoesOrientacoes"];
    $Hsocial                                  = $_GET["Hsocial"];
    $medicamentos                             = $_GET["medicamentos"];
    $sinalClinico                             = $_GET["sinalClinico"];
    $Halimentar                               = $_GET["Halimentar"];
    $Hfamiliar                                = $_GET["Hfamiliar"];
    $HpatologiaPregressa                      = $_GET["HpatologiaPregressa"];
    
    include_once 'conexao.php';

    
    $sql = "update a_clinica_nutricional set OBSERVACOES_ADICIONAIS='".$bioquirecomendacoesOrientacoes."', H_SOCIAL='".$Hsocial."', H_MEDICAMENTOSO='".$medicamentos."', SINALCLINICO='".$sinalClinico."', H_ALIMENTAR='".$Halimentar."', H_FAMILIAR='".$Hfamiliar."', H_PATOLOGICO_PRE='".$HpatologiaPregressa."' where ID_A_CLINICANUTRICIONAL='".$ID_A_CLINICANUTRICIONAL."'";
  


            if(mysqli_query($con,$sql))  
    {
         ?>
        <div class="alert alert-success animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;">
            Clinica Nutricional atualizada com sucesso!
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
            Erro ao atualizar Clinica Nutricional!
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
