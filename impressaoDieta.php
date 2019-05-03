<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <script type="text/javascript" src="js/ajax.js"></script>
    <title>Dietpro</title>
    <?php include_once 'head.php';
    include_once 'verificaLogin.php';
    ?>


</head>

<body>

    <div id="fundoSistemaInterno" class="container">

        <nav class="navbar navbar-dark container" style="background-color:#3b884d;">
            <button id="teste" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span> <i class="fas fa-carrot animated rubberBand" style="font-size: 30px; color: #c78713"></i> &nbsp; <i class="fas fa-apple-alt animated rubberBand" style="font-size: 30px; color: #d83838"></i> &nbsp; <i class="fas fa-cheese animated rubberBand" style="font-size: 30px; color: #ccc624"></i> </span>
            </button>
            <div>
                <img src="img/icons8-checked-user-male-26.png" alt=""> <b> Bem vindo(a):</b>
                <?php echo "<i>"  .$_SESSION["login"] . "</i>" ; ?> <a style="text-decoration: none;" href="logout.php">&nbsp;<img id="logout" src="img/icons8-exit-48.png" alt=""></a>
            </div>
        </nav>

        <div id="listNutri" class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
                Menu
            </a>
            <a href="nutricionistaMenu.php" class="list-group-item list-group-item-action">Dados do paciente</a>
            <a href="form-antropometria.php" class="list-group-item list-group-item-action">Av. Antropométrica</a>
            <a href="form-bioquiomica.php" class="list-group-item list-group-item-action">Av. Bioquímica</a>
            <a href="form-clinicaNutricional.php" class="list-group-item list-group-item-action">Av. Clínica nutri.</a>
            <a href="form-VetFao.php" class="list-group-item list-group-item-action">Vet FAO</a>
            <a href="tabelaAlimentos.php" class="list-group-item list-group-item-action">Lista de alimentos</a>
            <a href="#" class="list-group-item list-group-item-action">Recordatório 24h</a>
            <a href="form-Dietoterapia.php" class="list-group-item list-group-item-action">Dietoterapia</a>
            <a href="listaSubstituicao.php" class="list-group-item list-group-item-action">Lista de subs.</a>
            <a href="#" class="list-group-item list-group-item-action">Impressão de dieta<i class="fas fa-check" style="font-size: 10px; color: #3b884d"></i></a>
        </div>

        <h4 id="menuNutricionista">Impressão da dieta <img src="img/icons8-impress%C3%A3o-48.png" alt=""></h4>

        <!-- card de impressao para imprimir -->

        <div id="tabelaImpressao">
            <div class="accordion">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0" id="textoImprimir">Imprimir</h5>
                    </div>
                    <div id="divDoBotao">
                        <img class="impressoraImagem animated pulse" onclick="print()" src="img/icons8-m%C3%A1quina-de-escrever-com-tablet-48.png" alt="">
                    </div>
                </div>
            </div>
        </div>


        <div id="limpandoTelaParaDieta">
            <p></p>
        </div>

        <hr>
        <!-- Título resultado da dieta -->

        <div style="display: inline-block; margin-left: 23%;">
            <img id="brasaoNutricao" src="img/simbolo%20de%20nutri%C3%A7%C3%A3o-800x800.png" alt="">
        </div>
        <div id="tituloConduta">
            <h2><i>Conduta Dietoterápica</i></h2>
        </div>

        <!-- Primeira tabela -->
        <div style="display: inline-block; margin-left: 3%;">
            <img id="brasaoNutricao" src="img/simbolo%20de%20nutri%C3%A7%C3%A3o-800x800.png" alt="">
        </div>
        <hr>


        <!-- Tabela Desjejum -->

        <?php
        
        include_once 'conexao.php';
        
        $sql = "select * from alimentos where NOME_REFEICAO = 'Desjejum'";
        
        $result = mysqli_query($con, $sql);
        
        $totalRegistros = mysqli_num_rows($result);
        
        $row = mysqli_fetch_array($result);
   
        if($totalRegistros > 0)  { ?>

        <div style="margin-top: 1%;" class="row">
            <div style="margin-left: 2%; margin-top: 3px; display; inline-block;" class="col-2">
                <div>
                    <img id="brasaoNutricao2" src="img/nutricao-falculdade-universidade-plotter-recorte-logo-1F9AF53657-seeklogo.com.png">
                </div>
                <label>
                    <h6>Refeição</h6>
                </label>
                <input type="text" class="form-control col-8" disabled value=" <?php
      echo $row["NOME_REFEICAO"]; ?> ">
                <label>
                    <h6>horário</h6>
                </label>
                <input class="form-control col-8" type="text" disabled value=" <?php 
      echo $row["HORA"]; ?> ">
            </div>

            <div class="col-9 table-overflow2">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Alimento</th>
                            <th scope="col">Nº</th>
                            <th scope="col">M.C.</th>
                            <th scope="col">Grama</th>
                            <th scope="col">CHO</th>
                            <th scope="col">PTN</th>
                            <th scope="col">LIP</th>
                            <th scope="col">Kcal</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            while($row = mysqli_fetch_array($result)){
                        echo "<tr>";   
                        echo "<th scope='row'>".$row["NOME_ALIMENTO"]."</th>";
                        echo "<td>".$row["NUM_MC"]."</td>";
                        echo "<td>".$row["MEDIDA_CASEIRA"]."</td>";
                        echo "<td>".$row["GRAMA"]."</td>";
                        echo "<td>".$row["CHO"]."</td>";
                        echo "<td>".$row["PTN"]."</td>";
                        echo "<td>".$row["LIP"]."</td>";
                        echo "<td>".$row["KCAL"]."</td>";
                        echo "</tr>";
                         }
                           ?>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <?php } ?>


        <!-- Tabela Colação -->

        <?php
        
        include_once 'conexao.php';
        
        $sql = "select * from alimentos where NOME_REFEICAO = 'Colação'";
        
        $result = mysqli_query($con, $sql);
        
        $totalRegistros = mysqli_num_rows($result);
        
        $row = mysqli_fetch_array($result);
     
        if($totalRegistros > 0)  { ?>

        <div style="margin-top: 1%;" class="row">
            <div style="margin-left: 2%; margin-top: 3px; display; inline-block;" class="col-2">
                <div>
                    <img id="brasaoNutricao2" src="img/nutricao-falculdade-universidade-plotter-recorte-logo-1F9AF53657-seeklogo.com.png">
                </div>
                <label>
                    <h6>Refeição</h6>
                </label>
                <input type="text" class="form-control col-8" disabled value=" <?php
      echo $row["NOME_REFEICAO"]; ?> ">
                <label>
                    <h6>horário</h6>
                </label>
                <input class="form-control col-8" type="text" disabled value=" <?php 
      echo $row["HORA"]; ?> ">
            </div>

            <div class="col-9 table-overflow2">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Alimento</th>
                            <th scope="col">Nº</th>
                            <th scope="col">M.C.</th>
                            <th scope="col">Grama</th>
                            <th scope="col">CHO</th>
                            <th scope="col">PTN</th>
                            <th scope="col">LIP</th>
                            <th scope="col">Kcal</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                            while($row = mysqli_fetch_array($result)){
                        echo "<tr>";   
                        echo "<th scope='row'>".$row["NOME_ALIMENTO"]."</th>";
                        echo "<td>".$row["NUM_MC"]."</td>";
                        echo "<td>".$row["MEDIDA_CASEIRA"]."</td>";
                        echo "<td>".$row["GRAMA"]."</td>";
                        echo "<td>".$row["CHO"]."</td>";
                        echo "<td>".$row["PTN"]."</td>";
                        echo "<td>".$row["LIP"]."</td>";
                        echo "<td>".$row["KCAL"]."</td>";
                        echo "</tr>";
                         }
                           ?>
                    </tbody>
                </table>
            </div>
        </div>

        <hr>
        <?php } ?>


        <!-- Tabela Almoço -->

        <?php
        
        include_once 'conexao.php';
        
        $sql = "select * from alimentos where NOME_REFEICAO = 'Almoço'";
        
        $result = mysqli_query($con, $sql);
        
        $totalRegistros = mysqli_num_rows($result);
        
        $row = mysqli_fetch_array($result);
     
        if($totalRegistros > 0)  { ?>

        <div style="margin-top: 1%;" class="row">
            <div style="margin-left: 2%; margin-top: 3px; display; inline-block;" class="col-2">
                <div>
                    <img id="brasaoNutricao2" src="img/nutricao-falculdade-universidade-plotter-recorte-logo-1F9AF53657-seeklogo.com.png">
                </div>
                <label>
                    <h6>Refeição</h6>
                </label>
                <input type="text" class="form-control col-8" disabled value=" <?php
      echo $row["NOME_REFEICAO"]; ?> ">
                <label>
                    <h6>horário</h6>
                </label>
                <input class="form-control col-8" type="text" disabled value=" <?php 
      echo $row["HORA"]; ?> ">
            </div>

            <div class="col-9 table-overflow2">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Alimento</th>
                            <th scope="col">Nº</th>
                            <th scope="col">M.C.</th>
                            <th scope="col">Grama</th>
                            <th scope="col">CHO</th>
                            <th scope="col">PTN</th>
                            <th scope="col">LIP</th>
                            <th scope="col">Kcal</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                            while($row = mysqli_fetch_array($result)){
                        echo "<tr>";   
                        echo "<th scope='row'>".$row["NOME_ALIMENTO"]."</th>";
                        echo "<td>".$row["NUM_MC"]."</td>";
                        echo "<td>".$row["MEDIDA_CASEIRA"]."</td>";
                        echo "<td>".$row["GRAMA"]."</td>";
                        echo "<td>".$row["CHO"]."</td>";
                        echo "<td>".$row["PTN"]."</td>";
                        echo "<td>".$row["LIP"]."</td>";
                        echo "<td>".$row["KCAL"]."</td>";
                        echo "</tr>";
                         }
                           ?>
                    </tbody>
                </table>
            </div>
        </div>

        <hr>
        <?php } ?>


        <!-- Tabela lanche -->

        <?php
        
        include_once 'conexao.php';
        
        $sql = "select * from alimentos where NOME_REFEICAO = 'Lanche'";
        
        $result = mysqli_query($con, $sql);
        
        $totalRegistros = mysqli_num_rows($result);
        
        $row = mysqli_fetch_array($result);
     
        if($totalRegistros > 0)  { ?>

        <div style="margin-top: 1%;" class="row">
            <div style="margin-left: 2%; margin-top: 3px; display; inline-block;" class="col-2">
                <div>
                    <img id="brasaoNutricao2" src="img/nutricao-falculdade-universidade-plotter-recorte-logo-1F9AF53657-seeklogo.com.png">
                </div>
                <label>
                    <h6>Refeição</h6>
                </label>
                <input type="text" class="form-control col-8" disabled value=" <?php
      echo $row["NOME_REFEICAO"]; ?> ">
                <label>
                    <h6>horário</h6>
                </label>
                <input class="form-control col-8" type="text" disabled value=" <?php 
      echo $row["HORA"]; ?> ">
            </div>

            <div class="col-9 table-overflow2">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Alimento</th>
                            <th scope="col">Nº</th>
                            <th scope="col">M.C.</th>
                            <th scope="col">Grama</th>
                            <th scope="col">CHO</th>
                            <th scope="col">PTN</th>
                            <th scope="col">LIP</th>
                            <th scope="col">Kcal</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                            while($row = mysqli_fetch_array($result)){
                        echo "<tr>";   
                        echo "<th scope='row'>".$row["NOME_ALIMENTO"]."</th>";
                        echo "<td>".$row["NUM_MC"]."</td>";
                        echo "<td>".$row["MEDIDA_CASEIRA"]."</td>";
                        echo "<td>".$row["GRAMA"]."</td>";
                        echo "<td>".$row["CHO"]."</td>";
                        echo "<td>".$row["PTN"]."</td>";
                        echo "<td>".$row["LIP"]."</td>";
                        echo "<td>".$row["KCAL"]."</td>";
                        echo "</tr>";
                         }
                           ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="form-VET1">
            <div class="form-row">
                <div style="margin-top: 20px;" class="col-2">
                    <label for="inputPassword" class="col-sm-10">
                        <h6>Total :</h6>
                    </label>
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 35%;">cho</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoEsq" placeholder="" name="" disabled>
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 34%;">ptn</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled>
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 36%;">lip</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled>
                </div>

                <div class="form-group col-sm-2"><i style="margin-left: 20%;"><i>VET / Kcal</i></i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled>
                </div>
            </div>
        </div>
        <hr>
        <?php } ?>


        <!-- Tabela 1ºLanche -->

        <?php
        
        include_once 'conexao.php';
        
        $sql = "select * from alimentos where NOME_REFEICAO = '1ºLanche'";
        
        $result = mysqli_query($con, $sql);
        
        $totalRegistros = mysqli_num_rows($result);
        
        $row = mysqli_fetch_array($result);
     
        if($totalRegistros > 0)  { ?>

        <div style="margin-top: 1%;" class="row">
            <div style="margin-left: 2%; margin-top: 3px; display; inline-block;" class="col-2">
                <div>
                    <img id="brasaoNutricao2" src="img/nutricao-falculdade-universidade-plotter-recorte-logo-1F9AF53657-seeklogo.com.png">
                </div>
                <label>
                    <h6>Refeição</h6>
                </label>
                <input type="text" class="form-control col-8" disabled value=" <?php
      echo $row["NOME_REFEICAO"]; ?> ">
                <label>
                    <h6>horário</h6>
                </label>
                <input class="form-control col-8" type="text" disabled value=" <?php 
      echo $row["HORA"]; ?> ">
            </div>

            <div class="col-9 table-overflow2">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Alimento</th>
                            <th scope="col">Nº</th>
                            <th scope="col">M.C.</th>
                            <th scope="col">Grama</th>
                            <th scope="col">CHO</th>
                            <th scope="col">PTN</th>
                            <th scope="col">LIP</th>
                            <th scope="col">Kcal</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                            while($row = mysqli_fetch_array($result)){
                        echo "<tr>";   
                        echo "<th scope='row'>".$row["NOME_ALIMENTO"]."</th>";
                        echo "<td>".$row["NUM_MC"]."</td>";
                        echo "<td>".$row["MEDIDA_CASEIRA"]."</td>";
                        echo "<td>".$row["GRAMA"]."</td>";
                        echo "<td>".$row["CHO"]."</td>";
                        echo "<td>".$row["PTN"]."</td>";
                        echo "<td>".$row["LIP"]."</td>";
                        echo "<td>".$row["KCAL"]."</td>";
                        echo "</tr>";
                         }
                           ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="form-VET1">
            <div class="form-row">
                <div style="margin-top: 20px;" class="col-2">
                    <label for="inputPassword" class="col-sm-10">
                        <h6>Total :</h6>
                    </label>
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 35%;">cho</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoEsq" placeholder="" name="" disabled>
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 34%;">ptn</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled>
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 36%;">lip</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled>
                </div>

                <div class="form-group col-sm-2"><i style="margin-left: 20%;"><i>VET / Kcal</i></i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled>
                </div>
            </div>
        </div>
        <hr>
        <?php } ?>


        <!-- Tabela 2ºLanche -->

        <?php
        
        include_once 'conexao.php';
        
        $sql = "select * from alimentos where NOME_REFEICAO = '2ºLanche'";
        
        $result = mysqli_query($con, $sql);
        
        $totalRegistros = mysqli_num_rows($result);
        
        $row = mysqli_fetch_array($result);
     
        if($totalRegistros > 0)  { ?>

        <div style="margin-top: 1%;" class="row">
            <div style="margin-left: 2%; margin-top: 3px; display; inline-block;" class="col-2">
                <div>
                    <img id="brasaoNutricao2" src="img/nutricao-falculdade-universidade-plotter-recorte-logo-1F9AF53657-seeklogo.com.png">
                </div>
                <label>
                    <h6>Refeição</h6>
                </label>
                <input type="text" class="form-control col-8" disabled value=" <?php
      echo $row["NOME_REFEICAO"]; ?> ">
                <label>
                    <h6>horário</h6>
                </label>
                <input class="form-control col-8" type="text" disabled value=" <?php 
      echo $row["HORA"]; ?> ">
            </div>

            <div class="col-9 table-overflow2">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Alimento</th>
                            <th scope="col">Nº</th>
                            <th scope="col">M.C.</th>
                            <th scope="col">Grama</th>
                            <th scope="col">CHO</th>
                            <th scope="col">PTN</th>
                            <th scope="col">LIP</th>
                            <th scope="col">Kcal</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                            while($row = mysqli_fetch_array($result)){
                        echo "<tr>";   
                        echo "<th scope='row'>".$row["NOME_ALIMENTO"]."</th>";
                        echo "<td>".$row["NUM_MC"]."</td>";
                        echo "<td>".$row["MEDIDA_CASEIRA"]."</td>";
                        echo "<td>".$row["GRAMA"]."</td>";
                        echo "<td>".$row["CHO"]."</td>";
                        echo "<td>".$row["PTN"]."</td>";
                        echo "<td>".$row["LIP"]."</td>";
                        echo "<td>".$row["KCAL"]."</td>";
                        echo "</tr>";
                         }
                           ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="form-VET1">
            <div class="form-row">
                <div style="margin-top: 20px;" class="col-2">
                    <label for="inputPassword" class="col-sm-10">
                        <h6>Total :</h6>
                    </label>
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 35%;">cho</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoEsq" placeholder="" name="" disabled>
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 34%;">ptn</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled>
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 36%;">lip</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled>
                </div>

                <div class="form-group col-sm-2"><i style="margin-left: 20%;"><i>VET / Kcal</i></i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled>
                </div>
            </div>
        </div>
        <hr>
        <?php } ?>


        <!-- Tabela Jantar -->

        <?php
        
        include_once 'conexao.php';
        
        $sql = "select * from alimentos where NOME_REFEICAO = 'Jantar'";
        
        $result = mysqli_query($con, $sql);
        
        $totalRegistros = mysqli_num_rows($result);
        
        $row = mysqli_fetch_array($result);
     
        if($totalRegistros > 0)  { ?>

        <div style="margin-top: 1%;" class="row">
            <div style="margin-left: 2%; margin-top: 3px; display; inline-block;" class="col-2">
                <div>
                    <img id="brasaoNutricao2" src="img/nutricao-falculdade-universidade-plotter-recorte-logo-1F9AF53657-seeklogo.com.png">
                </div>
                <label>
                    <h6>Refeição</h6>
                </label>
                <input type="text" class="form-control col-8" disabled value=" <?php
      echo $row["NOME_REFEICAO"]; ?> ">
                <label>
                    <h6>horário</h6>
                </label>
                <input class="form-control col-8" type="text" disabled value=" <?php 
      echo $row["HORA"]; ?> ">
            </div>

            <div class="col-9 table-overflow2">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Alimento</th>
                            <th scope="col">Nº</th>
                            <th scope="col">M.C.</th>
                            <th scope="col">Grama</th>
                            <th scope="col">CHO</th>
                            <th scope="col">PTN</th>
                            <th scope="col">LIP</th>
                            <th scope="col">Kcal</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                            while($row = mysqli_fetch_array($result)){
                        echo "<tr>";   
                        echo "<th scope='row'>".$row["NOME_ALIMENTO"]."</th>";
                        echo "<td>".$row["NUM_MC"]."</td>";
                        echo "<td>".$row["MEDIDA_CASEIRA"]."</td>";
                        echo "<td>".$row["GRAMA"]."</td>";
                        echo "<td>".$row["CHO"]."</td>";
                        echo "<td>".$row["PTN"]."</td>";
                        echo "<td>".$row["LIP"]."</td>";
                        echo "<td>".$row["KCAL"]."</td>";
                        echo "</tr>";
                         }
                           ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="form-VET1">
            <div class="form-row">
                <div style="margin-top: 20px;" class="col-2">
                    <label for="inputPassword" class="col-sm-10">
                        <h6>Total :</h6>
                    </label>
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 35%;">cho</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoEsq" placeholder="" name="" disabled>
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 34%;">ptn</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled>
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 36%;">lip</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled>
                </div>

                <div class="form-group col-sm-2"><i style="margin-left: 20%;"><i>VET / Kcal</i></i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled>
                </div>
            </div>
        </div>
        <hr>
        <?php } ?>

        <!-- Tabela Ceia -->

        <?php
        
        include_once 'conexao.php';
        
        $sql = "select * from alimentos where NOME_REFEICAO = 'Ceia'";
        
        $result = mysqli_query($con, $sql);
        
        $totalRegistros = mysqli_num_rows($result);
        
        $row = mysqli_fetch_array($result);
     
        if($totalRegistros > 0)  { ?>

        <div style="margin-top: 1%;" class="row">
            <div style="margin-left: 2%; margin-top: 3px; display; inline-block;" class="col-2">
                <div>
                    <img id="brasaoNutricao2" src="img/nutricao-falculdade-universidade-plotter-recorte-logo-1F9AF53657-seeklogo.com.png">
                </div>
                <label>
                    <h6>Refeição</h6>
                </label>
                <input type="text" class="form-control col-8" disabled value=" <?php
      echo $row["NOME_REFEICAO"]; ?> ">
                <label>
                    <h6>horário</h6>
                </label>
                <input class="form-control col-8" type="text" disabled value=" <?php 
      echo $row["HORA"]; ?> ">
            </div>

            <div class="col-9 table-overflow2">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Alimento</th>
                            <th scope="col">Nº</th>
                            <th scope="col">M.C.</th>
                            <th scope="col">Grama</th>
                            <th scope="col">CHO</th>
                            <th scope="col">PTN</th>
                            <th scope="col">LIP</th>
                            <th scope="col">Kcal</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                            while($row = mysqli_fetch_array($result)){
                        echo "<tr>";   
                        echo "<th scope='row'>".$row["NOME_ALIMENTO"]."</th>";
                        echo "<td>".$row["NUM_MC"]."</td>";
                        echo "<td>".$row["MEDIDA_CASEIRA"]."</td>";
                        echo "<td>".$row["GRAMA"]."</td>";
                        echo "<td>".$row["CHO"]."</td>";
                        echo "<td>".$row["PTN"]."</td>";
                        echo "<td>".$row["LIP"]."</td>";
                        echo "<td>".$row["KCAL"]."</td>";
                        echo "</tr>";
                         }
                           ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="form-VET1">
            <div class="form-row">
                <div style="margin-top: 20px;" class="col-2">
                    <label for="inputPassword" class="col-sm-10">
                        <h6>Total :</h6>
                    </label>
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 35%;">cho</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoEsq" placeholder="" name="" disabled>
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 34%;">ptn</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled>
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 36%;">lip</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled>
                </div>

                <div class="form-group col-sm-2"><i style="margin-left: 20%;"><i>VET / Kcal</i></i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled>
                </div>
            </div>
        </div>
        <hr>
        <?php } ?>


        <!-- Título Recomendação e Orientação -->
        <div id="totalRecomendacao">
            <div style="display: inline-block; margin-left: 21%;">
                <img id="brasaoNutricao" src="img/simbolo%20de%20nutri%C3%A7%C3%A3o-800x800.png" alt="">
            </div>
            <div id="tituloRecomendacoes">
                <h2><i>Recomendações e Orientações</i></h2>
            </div>
            <div style="display: inline-block; margin-left: 2%;">
                <img id="brasaoNutricao" src="img/simbolo%20de%20nutri%C3%A7%C3%A3o-800x800.png" alt="">
            </div>

            <!-- card de recomendações e orientacoes -->
            <div id="cardRecomendacoesOrientacoes">
                <div class="card bg-light mb-3" style="max-width: 50rem;">
                    <div class="card-header">
                        <h4 id="avisoRecomendacao"><img src="img/icons8-aviso-de-aviso-48.png" alt="">Atenção <img src="img/icons8-aviso-de-aviso-48.png" alt=""></h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">- Prescrição Nutricional</h5>
                        <p class="card-text"> <?php
                            
                    include_once 'conexao.php';

                    $sql = "select OBSERVACOES_ADICIONAIS from  a_clinica_nutricional";

                    $result = mysqli_query($con, $sql);

                    $totalRegistros = mysqli_num_rows($result);

                    $row = mysqli_fetch_array($result);

                    if($totalRegistros > 0)  { 
                        echo $row["OBSERVACOES_ADICIONAIS"];
                    }

                            ?></p>
                    </div>
                </div>
            </div>
        </div>


        <footer class="container" id="rodape">
            <?php include_once 'rodape.php'; ?>
        </footer>

    </div>
</body>

</html>
