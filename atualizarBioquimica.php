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
        
    $id                            = $_GET["id_cliente"];    
    $bioquimica                    = $_GET["id_bioquimica"];
    $LISTA_HEMOGRAMA_COMPLETO      = $_GET["LISTA_HEMOGRAMA_COMPLETO"];
    
    include_once 'conexao.php';

    
    $sql = "update a_bioquimica set LISTA_HEMOGRAMA_COMPLETO='".$LISTA_HEMOGRAMA_COMPLETO."' where id_bioquimica='".$bioquimica."'";
  


            if(mysqli_query($con,$sql))  
    {
         ?>
        <div class="alert alert-success animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;">
            Bioquimica atualizada com sucesso!
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
            Erro ao atualizar Bioquimica!
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
