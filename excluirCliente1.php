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
        
            if(isset($_GET["id_cliente"]))
            {
                include_once 'conexao.php';
                
                $sql = "delete from cliente where id_cliente=".$_GET["id_cliente"];
                
                if(mysqli_query($con, $sql))
                { header('Location:nutricionistaMenu.php');
                 
                    ?>

        <div class="alert alert-success animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px; text-align: center;">
            Contato excluido com sucesso!
        </div>

        <!--  <div id="btnConfirmacao">
            <a href="nutricionistaMenu.php"><button id="btnVoltar1" type="button" class="btn btn-warning animated zoomIn" style="margin-left:48%;">OK</button> </a>
        </div> -->
        <?php
        }
                else
                { 
                    echo "Erro ao deletar contato.";
                }
                
                mysqli_close($con);
            }
    
?>

    </div>
</body>

</html>
