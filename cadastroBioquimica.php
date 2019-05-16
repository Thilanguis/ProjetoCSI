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
    $id            = $_POST["id_cliente"];    
    $bioquimica    = $_POST["bioquimica"];

    
    include_once 'conexao.php';
        
     $ok = $bioquimica != ""; 
    
    $sql = "insert into a_bioquimica values(null, '".$bioquimica."')";
        

        if($ok)
{
            if(mysqli_query($con,$sql))  
    {
         ?>
        <div class="alert alert-success animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;" role="alert">
            Dados gravados com sucesso!
        </div>

        <div id="btnConfirmacao">
            <?php echo "<a href='form-clinicaNutricional.php?id_cliente=".$id."'><button id='btnVoltar1' type='button' class='btn btn-warning animated zoomIn' style='margin-left:48%;'>OK</button></a>" ?>
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
            <?php echo "<a href='form-bioquiomica.php?id_cliente=".$id."'><button id='btnVoltar1' type='button' class='btn btn-warning animated zoomIn' style='margin-left:48%;'>OK</button></a>" ?>
        </div>
        <?php
        }
        }
        
        else
        {
    ?>
        <div class="alert alert-danger animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;">
            Não há dados para salvar!
        </div>

        <div id="btnConfirmacao">
            <?php echo "<a href='form-bioquiomica.php?id_cliente=".$id."'><button id='btnVoltar1' type='button' class='btn btn-warning animated zoomIn' style='margin-left:48%;'>OK</button></a>" ?>
        </div>
        <?php
        }
       
            
            
    mysqli_close($con);
?>

    </div>
</body>

</html>
