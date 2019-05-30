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
        $quantidade = $_GET["quantidade"];
       
        $sqlTabelaAlimentos = "select  `ID`, `col 2`, `col 3`, `col 5`, `col 6`, `col 7`, `col 8`, `col 9` from tabelaalimentos where `ID`=".$_GET["idAlimento"];
    
       
        $result = mysqli_query($con, $sqlTabelaAlimentos);
       
       
        $row = mysqli_fetch_array($result); 
        
        $id              = $_GET["id_cliente"];
        $quantidade      = $_GET["quantidade"];
        $refeicao        = $_GET["refeicao"];
        $horario         = $_GET["horario"];
        $col2            = $row["col 2"]; 
        $col3            = $row["col 3"];
        $col5            = str_replace(',', '.',$row["col 5"])*$quantidade;
        $col6            = str_replace(',', '.',$row["col 6"])*$quantidade;
        $col7            = str_replace(',', '.',$row["col 7"])*$quantidade;
        $col8            = str_replace(',', '.',$row["col 8"])*$quantidade;
        $col9            = str_replace(',', '.',$row["col 9"])*$quantidade;

        $sqlDadosDaRefeicao = "insert into alimentos (ID, NOME_ALIMENTO, MEDIDA_CASEIRA, GRAMA, CHO, PTN, LIP, KCAL, NUM_MC, HORA, NOME_REFEICAO, ID_CLIENTE) values (null, '".$col2."','".$col3."','".$col5."','".$col6."','".$col7."','".$col8."','".$col9."', '".$quantidade."','".$horario."','".$refeicao."','".$id."')";

            if(mysqli_query($con,$sqlDadosDaRefeicao))  
    { header('Location:form-Dietoterapia.php?id_cliente='.$id);
         ?>
        <!-- <div class="alert alert-success animated zoomIn container" role="alert" style="width: 300px; margin-top: 100px;">
            Alimento gravados com sucesso!
        </div>
        
        <div id="btnConfirmacao">
            <a href="form-Dietoterapia.php"><button id="btnVoltar1" type="button" class="btn btn-warning animated zoomIn" style="margin-left:48%;">OK</button> </a>
        </div> -->
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
