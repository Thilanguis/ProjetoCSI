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
    $id                       = $_POST["id_cliente"];
    $HpatologiaPregressa      = $_POST["HpatologiaPregressa"];
    $Hfamiliar                = $_POST["Hfamiliar"];
    $Halimentar               = $_POST["Halimentar"];
    $sinalClinico             = $_POST["sinalClinico"];
    $medicamentos             = $_POST["medicamentos"];
    $Hsocial                  = $_POST["Hsocial"];
    $recomendacoesOrientacoes = $_POST["recomendacoesOrientacoes"];
   
    
    include_once 'conexao.php';
        
     $ok = $HpatologiaPregressa != "" || $Hfamiliar != "" || $Halimentar != "" || $sinalClinico != "" || $medicamentos != "" || $Hsocial != "" || $recomendacoesOrientacoes != ""; 
    
    $sql = "insert into a_clinica_nutricional values(null, '".$HpatologiaPregressa."','".$Hfamiliar."','".$Halimentar."','".$Hsocial."','".$medicamentos."','".$sinalClinico."','".$recomendacoesOrientacoes."', '".$id."')";
    
        header('refresh:2,form-clinicaNutricional.php?id_cliente='.$id);
        if($ok)
{           header('refresh:2,form-clinicaNutricional.php?id_cliente='.$id);
            if(mysqli_query($con,$sql))  
    {           header('refresh:2,form-VetFao.php?id_cliente='.$id);
         ?>
        <div class="alert alert-success animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px; text-align: center;">
            Dados gravados com sucesso!
        </div>

        <!-- <div id="btnConfirmacao"> -->
        <?php //echo "<a href='form-VetFao.php?id_cliente=".$id."'><button id='btnVoltar1' type='button' class='btn btn-warning animated zoomIn' style='margin-left:48%;'>OK</button></a>" ?>
        <!-- </div> -->
        <?php
        }
        else
        {
                
         ?>
        <div class="alert alert-warning animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px; text-align: center;">
            Erro ao cadastrar contato!
        </div>

        <!-- <div id="btnConfirmacao"> -->
        <?php //echo "<a href='form-clinicaNutricional.php?id_cliente=".$id."'><button id='btnVoltar1' type='button' class='btn btn-warning animated zoomIn' style='margin-left:48%;'>OK</button></a>" ?>
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
        <?php //echo "<a href='form-clinicaNutricional.php?id_cliente=".$id."'><button id='btnVoltar1' type='button' class='btn btn-warning animated zoomIn' style='margin-left:48%;'>OK</button></a>" ?>
        <!-- </div> -->
        <?php
        }
        
            
            
    mysqli_close($con);
?>

    </div>
</body>

</html>
