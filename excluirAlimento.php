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
        
            if(isset($_GET["id_alimento"]))
            {
                include_once 'conexao.php';
                
                $id = $_GET["id_cliente"];
                
                $sql = "delete from alimentos where ID=".$_GET["id_alimento"];
                
                if(mysqli_query($con, $sql))
        { header('Location:form-Dietoterapia.php?id_cliente='.$id);
                    ?>

        <!-- <div class="alert alert-success animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;">
            Alimento excluido com sucesso!
        </div> -->

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
