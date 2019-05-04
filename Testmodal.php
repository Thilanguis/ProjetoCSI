<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
    <title>Dietpro</title>
    <?php include_once 'head.php';
    include_once 'verificaLogin.php';
    ?>

</head>
<body>
    <?php
       $test = $_GET["mat"];
        
   
        
  if(isset($_GET["mat"])) {
       include_once 'conexao.php';
       include_once 'funcoesProjeto.php';
            
       $sql= "SELECT * FROM consulta WHERE idCliente = $test";
       $result=  mysqli_query($con,$sql);    
       $totalregistro=  mysqli_num_rows($result);
             
            if($totalregistro >0){ ?>
               
               <table id="tabelaConsultaPaciente" class="table  table-striped container">
                 <tr>
                     <th>idConsulta</th>
                     <th>hora</th>
                     <th>data</th>
                     <th>idcliente</th>
                 </tr>
                   
             <?php
                    while($row = mysqli_fetch_array($result))
                    {     
              echo "<tr>";
                    echo "<td>".$row["idConsulta"]."</td>";
                     echo "<td>".$row["hora"]."</td>";
                    echo "<td>".$row["data"]."</td>";
                    echo "<td>".$row["idCliente"]."</td>";
              echo "</tr>";    
                        
   
                 
                
            
                      }
                    echo "</table>";

    }
   }else{
      echo "deu merda";
  }
    ?>
            
            
<!--  CREATE TABLE consulta(
          idConsulta
          hora hour not null,
          data not null,
          idCliente, 
          foreign key(idCliente) references cliente(ID_CLIENTE) ON UPDATE SET cascade  ON DELETE SET cascade
          );-->
           
    
</body>
</html>