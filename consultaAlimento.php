<?php
    
            include_once 'head.php';
    
            if(isset($_GET["alimento"]))
            {
       
                $alimento = $_GET["alimento"]; 
                $quantidade = $_GET["quantidade"];
                
                
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `ID`, `col 2`, `col 3`, `col 5`, `col 6`, `col 7`, `col 8`, `col 9` from tabelaalimentos WHERE `col 2` like '%".$alimento."%'";
                
                $result = mysqli_query($con, $sql);
                
                $totalRegistros = mysqli_num_rows($result); 
        
                if($totalRegistros > 0)
                { ?>

<div class="table-overflow1">
    <table class="table table-striped animated flipInX" style="margin-bottom: 0px !important;">
        <tr>
            <th style="color: #E8850C; padding-left: 55px;">Alimento</th>
            <th style="color: #E8850C; padding-left: 120px;">M.C.</th>
            <th style="color: #E8850C; padding-left: 60px;">Grama</th>
            <th style="color: #E8850C">CHO</th>
            <th style="color: #E8850C">PTN</th>
            <th style="color: #E8850C">LIP</th>
            <th style="color: #E8850C">Kcal</th>
            <th style="color: #E8850C">&nbsp;&nbsp;&nbsp;&nbsp;Incluir&nbsp;&nbsp;&nbsp;</th>
        </tr>
    </table> 
</div>
<div class="table-overflow3">
    <table class="table table-striped container animated zoomIn" style="width: 750px;">

        <?php
                    while($row = mysqli_fetch_array($result))
                    {  
                        $grama = str_replace (',', '.', $row["col 5"]);
                        $cho = str_replace (',', '.', $row["col 6"]);
                        $ptn = str_replace (',', '.', $row["col 7"]);
                        $lip = str_replace (',', '.', $row["col 8"]);
                        $kcal = str_replace (',', '.', $row["col 9"]);
                        
                        echo "<tr>";
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
                        echo "<td>".$grama*$quantidade."</td>";
                        echo "<td>".number_format($cho*$quantidade,2)."</td>";
                        echo "<td>".number_format($ptn*$quantidade,2)."</td>";
                        echo "<td>".number_format($lip*$quantidade,2)."</td>";
                        echo "<td>".number_format((($cho*$quantidade*4) + ($ptn*$quantidade*4) + ($lip*$quantidade*9)),2)."</td>";
                        ?> <?php
                        echo "<td><a href='cadastroAlimentos.php?idAlimento=".$row["ID"]."&quantidade=".$_GET["quantidade"]."&refeicao=".$_GET["refeicao"]."&horario=".$_GET["horario"]."&id_cliente=".$_GET["id_cliente"]."'><img id='alimentoadicionado' src='img/icons8-mais-48.png' alt=''></a></td>";
                        echo "</tr>";
             } 
        ?>
    </table>
</div>

<?php } 
                else
                {
                ?>
<div id="msgErro" class="alert alert-danger" role="alert">
    Nenhum registro encontrado
</div>
<?php  
                }
            }
        ?>
