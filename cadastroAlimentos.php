<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <title>Dietpro</title>
    <?php include_once 'head.php'; 
    include_once 'conexao.php';
    ?>

</head>

<body>
    <div class="">

        <?php
        
        
    include_once 'funcoesProjeto.php';
        
     if(isset($_GET["idAlimento"]))
   {
       
       
       $sqlTabelaAlimentos = "select  `col 1`, `col 2`, `col 3`, `col 5`, `col 6`, `col 7`, `col 8`, `col 9` from tabelaalimentos where `col 1`=".$_GET["idAlimento"];
    
       
       $result = mysqli_query($con, $sqlTabelaAlimentos);
       
       
       $row = mysqli_fetch_array($result); 
        
  // $horario         = $_POST["horario"];
  //  $refeicao        = $_POST["refeicao"];
  // $quantidade      = $_POST["quantidade"];
    $col2            = $row["col 2"]; 
    $col3            = $row["col 3"];
    $col5            = $row["col 5"];
    $col6            = $row["col 6"];
    $col7            = $row["col 7"];
    $col8            = $row["col 8"];
    $col9            = $row["col 9"];
         
    $sqlDadosDaRefeicao = "insert into alimentos (NOME_ALIMENTO, MEDIDA_CASEIRA, GRAMA, CHO, PTN, LIP, KCAL) values ('".$col2."','".$col3."','".$col5."','".$col6."','".$col7."','".$col8."','".$col9."')";
  
   

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
       
     }
         mysqli_close($con);
?>

    </div>
</body>

</html>
