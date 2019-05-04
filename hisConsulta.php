<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <title>Dietpro</title>
    <?php include_once 'head.php';
    include_once 'verificaLogin.php';
    ?>

 
</head>

<body>

    <div id="fundoSistemaInterno" class="container">


         <nav id="teste" class="navbar navbar-dark" style="background-color:#3b884d;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span> <i class="fas fa-carrot animated rubberBand" style="font-size: 30px; color: #c78713"></i> &nbsp; <i class="fas fa-apple-alt animated rubberBand" style="font-size: 30px; color: #d83838"></i> &nbsp; <i class="fas fa-cheese animated rubberBand" style="font-size: 30px; color: #ccc624"></i> </span>
            </button>
            <div> <img src="img/icons8-checked-user-male-26.png" alt=""> <b> Bem vindo(a):</b>
                <?php echo "<i>"  .$_SESSION["login"] . "</i>" ; ?> <a style="text-decoration: none;" href="logout.php">&nbsp;<img id="logout" src="img/icons8-exit-48.png" alt=""></a>
            </div>
        </nav>

        <div id="listNutri" class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
                Menu
            </a>
            <a href="nutricionistaMenu.php" class="list-group-item list-group-item-action">Dados do paciente  </a>
            <a href="form-antropometria.php" class="list-group-item list-group-item-action">Av. Antropométrica</a>
            <a href="form-bioquiomica.php" class="list-group-item list-group-item-action">Av. Bioquímica</a>
            <a href="form-clinicaNutricional.php" class="list-group-item list-group-item-action">Av. Clínica nutri.</a>
            <a href="form-VetFao.php" class="list-group-item list-group-item-action">Vet FAO</a>
            <a href="tabelaAlimentos.php" class="list-group-item list-group-item-action">Lista de alimentos</a>
            <a href="#" class="list-group-item list-group-item-action">Recordatório 24h</a>
            <a href="form-Dietoterapia.php" class="list-group-item list-group-item-action">Dietoterapia</a>
            <a href="#" class="list-group-item list-group-item-action">Lista de substituições</a>
            <a href="#" class="list-group-item list-group-item-action">Impressão de dieta</a>
            <a href="hisConsulta.php" class="list-group-item list-group-item-action">historicodConsulta <i class="fas fa-check" style="font-size: 10px; color: #3b884d"></i></a>
        </div>

        <h4 id="menuNutricionista"> histórico de consulta &nbsp;<img src="img/icons8-plano-de-sa%C3%BAde-48.png" alt=""></h4>

     
         
      
       
        <form action="hisConsulta.php" method="get" style="margin: 50px 0px 0px 500px;">
   
               <div>
                   <label >Nome:</label>
                   <input type="text" name="name"> 
                   <input type="submit" class="btn btn-success" value="pesquisar">
               
               
                </div>
               
           </form>

    
       
  <?php
            
            if(isset($_GET["name"]))
            {
                $nome = $_GET["name"]; 
                
                include_once 'conexao.php';
                
                include_once 'funcoesProjeto.php';
                
                include_once 'excluirCliente.php';
                
                $sql = "select nome,telefone,endereco,cidade,estado_civil,dt_nascimento,sexo,id_cliente from cliente where nome like '".$nome."%'";
                
                $result = mysqli_query($con, $sql);
                
                $totalRegistros = mysqli_num_rows($result);
                
                if($totalRegistros > 0)
                { ?>
        <div class="table-overflow">
            <table id="tabelaConsultaPaciente" class="table  table-striped container">
                <tr>
                    <th><i class="fas fa-address-card" style="color: #28a745"></i></th>
                    <th style="color: #28a745">Nome</th>
                    <th style="color: #28a745">Telefone</th>
                    <th style="color: #28a745">Endereço</th>
                    <th style="color: #28a745">Cidade</th>
                    <th style="color: #28a745">Data de nascimento</th>
                </tr>



                <?php
                    while($row = mysqli_fetch_array($result))
                    {  
                        
                        echo "<tr>"; ?>
                <td><a href="Testmodal.php?mat=<?php echo $row["id_cliente"]?>"><i class="fas fa-book-open" style="color: #28a745"></i></a></td>
                <?php
                        echo "<td>".$row["nome"]."</td>";
                        echo "<td>".$row["telefone"]."</td>";
                        echo "<td>".$row["endereco"]."</td>";
                        echo "<td>".$row["cidade"]."</td>";
                        echo "<td>".date('d-m-Y', strtotime($row["dt_nascimento"]))."</td>";  
            
                        echo "</tr>";
                        
                    } ?>
            </table>
        </div>
        <?php } 
                else
                {
                    ?>
        <div id="msgErro1" class="alert alert-danger" role="alert">
            Nenhum registro encontrado
        </div>
        <?php  
                }
            }
        ?>

       
    
        
     
        

        <footer class="container" id="rodape">
             <?php include_once 'rodape.php'; ?>
        </footer>
    </div>

</body>

</html>
