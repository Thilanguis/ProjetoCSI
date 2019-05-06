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
    $HpatologiaPregressa    = $_POST["HpatologiaPregressa"];
    $Hfamiliar              = $_POST["Hfamiliar"];
    $Halimentar             = $_POST["Halimentar"];
    $sinalClinico           = $_POST["sinalClinico"];
    $medicamentos           = $_POST["medicamentos"];
    $Hsocial                = $_POST["Hsocial"];
    $recomendacoesOrientacoes  = $_POST["recomendacoesOrientacoes"];
   
    
    include_once 'conexao.php';
        
     $ok = $HpatologiaPregressa != "" || $Hfamiliar != "" || $Halimentar != "" || $sinalClinico != "" || $medicamentos != "" || $Hsocial != "" || $recomendacoesOrientacoes != ""; 
    
    $sql = "insert into a_clinica_nutricional values(null, '".$HpatologiaPregressa."','".$Hfamiliar."','".$Halimentar."','".$Hsocial."','".$medicamentos."','".$sinalClinico."','".$recomendacoesOrientacoes."')";
    
   
        if($ok)
{
            if(mysqli_query($con,$sql))  
    {
         ?>
        <div class="alert alert-success animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;">
            Dados gravados com sucesso!
        </div>

        <div id="btnConfirmacao">
            <a href="form-clinicaNutricional.php"><button id="btnVoltar1" type="button" class="btn btn-warning animated zoomIn" style="margin-left:48%;">OK</button> </a>
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
            <a href="form-clinicaNutricional.php"><button id="btnVoltar1" type="button" class="btn btn-warning animated zoomIn" style="margin-left:48%;">OK</button></a>
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
            <a href="form-clinicaNutricional.php"><button id="btnVoltar1" type="button" class="btn btn-warning animated zoomIn" style="margin-left:48%;">OK</button></a>
        </div>
        <?php
        }
        
            
            
    mysqli_close($con);
?>

    </div>
</body>

</html>
