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
        
     if(isset($_GET["col 1"]))
   {
       include_once 'conexao.php';
       
       $sqlTabelaAlimentos = "select * from tabelaalimentos where `COL 1`=".$_GET["COL 1"];
       
       $result = mysqli_query($con, $sql);
       
       $totalResgistros = mysqli_num_rows($result);
       
       $row = mysqli_fetch_array($result); 
        
    $horario         = $_POST["horario"];
    $refeicao        = $_POST["refeicao"];
    $quantidade      = $_POST["quantidade"];

    
    include_once 'conexao.php';
        
    
    
    $sqlDadosDaRefeicao = "insert into alimentos values ('".$refeicao."','".$quantidade."','".$horario."','".$row['col 2']."','".$row['col 3']."','".$row['col 5']."','".$row['col 6']."','".$row['col 7']."','".$row['col 8']."','".$row['col 9']."')";
    
        
   

            if(mysqli_query($con,$sqlTabelaAlimentos,$sqlDadosDaRefeicao))  
    {
         ?>
        <div class="alert alert-success animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;">
            Contato cadastrado com sucesso!
        </div>

        <div id="btnConfirmacao">
            <a href="index.php"><button id="btnVoltar1" type="button" class="btn btn-warning animated zoomIn" style="margin-left:48%;">OK</button> </a>
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
            <a href="index.php"><button id="btnVoltar1" type="button" class="btn btn-warning animated zoomIn" style="margin-left:48%;">OK</button></a>
        </div>
        <?php
        }
       
            
            
    mysqli_close($con);
?>

    </div>
</body>

</html>
