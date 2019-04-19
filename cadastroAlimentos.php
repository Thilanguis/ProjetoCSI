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
       
       $result = mysqli_query($con, $sqlTabelaAlimentos);
       
       $totalResgistros = mysqli_num_rows($result);
       
       $row = mysqli_fetch_array($result); 
        
    $horario         = $_POST["horario"];
    $refeicao        = $_POST["refeicao"];
    $quantidade      = $_POST["quantidade"];
    $col2            = $row($_POST["col 2"]);
    $col3            = $row($_POST["col 3"]);
    $col5            = $row($_POST["col 5"]);
    $col6            = $row($_POST["col 6"]);
    $col7            = $row($_POST["col 7"]);
    $col8            = $row($_POST["col 8"]);
    $col9            = $row($_POST["col 9"]);

    
    include_once 'conexao.php';
        
    
    
    $sqlDadosDaRefeicao = "insert into alimentos values ('".$refeicao."','".$quantidade."','".$horario."','".$col2."','".$col3."','".$col5."','".$col6."','".$col7."','".$col8."','".$col9."')";
    
        
   

            if(mysqli_query($con,$sqlDadosDaRefeicao))  
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
