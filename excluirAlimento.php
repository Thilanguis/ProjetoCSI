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
        
            if(isset($_GET["excluirAlimento"]))
            {
                include_once 'conexao.php';
                
                $idAlimento = ["excluirAlimento"];
                
                $sql = "delete from alimentos where ID=".$_GET["excluirAlimento"];
                
                if(mysqli_query($con, $sql))
                {
                    ?>

        <div class="alert alert-success animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;">
            Alimento excluido com sucesso!
        </div>

        <div id="btnConfirmacao">
            <a href="form-Dietoterapia.php"><button id="btnVoltar1" type="button" class="btn btn-warning animated zoomIn" style="margin-left:48%;">OK</button> </a>
        </div>
        <?php
        }
                else
                { 
                    echo "Erro ao deletar Alimento.";
                }
                
                mysqli_close($con);
            }
    
?>

    </div>
</body>

</html>
