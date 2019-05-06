<?php
    
            include_once 'head.php';
    
            if(isset($_GET["alimento"]))
            {
       
                $alimento = $_GET["alimento"]; 
                
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                $sql = "SELECT `ID`, `col 2`, `col 3`, `col 5`, `col 6`, `col 7`, `col 8`, `col 9` from tabelaalimentos WHERE `col 2` like '%".$alimento."%'";
                
                $result = mysqli_query($con, $sql);
                
                $totalRegistros = mysqli_num_rows($result);
                
                $quantidade = "<script>document.getElementByName('quantidade').value;</script>"; 
        
                if($totalRegistros > 0)
                { ?> <div class="table-overflow1">
    <table class="table table-striped container animated zoomIn">
        <tr>
            <th style="color: #E8850C">Alimento</th>
            <th style="color: #E8850C">M.C.</th>
            <th style="color: #E8850C">Grama</th>
            <th style="color: #E8850C">CHO</th>
            <th style="color: #E8850C">PTN</th>
            <th style="color: #E8850C">LIP</th>
            <th style="color: #E8850C">Kcal</th>
            <th style="color: #E8850C">Incluir</th>
        </tr>

        <?php
                    while($row = mysqli_fetch_array($result))
                    {  
                        echo "<tr>";
                        echo "<td>".$row["col 2"]."</td>";
                        echo "<td>".$row["col 3"]."</td>";
                        echo "<td>".$row["col 5"]."</td>";
                        echo "<td>".$row["col 6"]."</td>";
                        echo "<td>".$row["col 7"]."</td>";
                        echo "<td>".$row["col 8"]."</td>";
                        echo "<td>".$row["col 9"]."</td>";
                        ?> <?php
                        echo "<td><a href='cadastroAlimentos.php?idAlimento=".$row["ID"]."&quantidade={$quantidade}'><img id='alimentoadicionado' src='img/icons8-mais-48.png' alt=''></a></td>";
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
