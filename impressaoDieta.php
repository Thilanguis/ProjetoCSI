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

            <!-- Nome do paciente em consulta! -->
            <div>
                <?php
                
                include_once 'conexao.php';
                
                $sql = "select nome from cliente where id_cliente =".$_GET["id_cliente"];
                
                $result = mysqli_query ($con, $sql);
                
                $row = mysqli_fetch_array($result);
                
                echo "<h6 id='divTotalPaciente'><b><img id='hipertensao' src='img/icons8-hipertens%C3%A3o-64.png' alt=''>Paciente em consulta:</b></h6>"; echo "<div id='paciente'>" .$row[0]."</div>";
                ?>

                <!-- script terminar dieta do paciente  -->
                <script>
                    function terminarDieta() {

                        var nomePaciente = "<?php echo $row[0]; ?>"

                        if (confirm('Realmente deseja encerrar a dieta do Paciente ' + nomePaciente + "?")) {
                            location.href = 'nutricionistaMenu.php';
                        }
                    }

                </script>
            </div>


            <div> <i id="usuarioLogado" class="fas fa-user-check"></i> <b>Bem-vindo nutricionista:</b>
                <?php echo "<i id='paciente'>"  .$_SESSION["login"] . "</i>" ; ?> <a style="text-decoration: none;" href="#" onclick="deslogar();">&nbsp;<img id="logout" src="img/icons8-exit-48.png" alt=""></a>
            </div>
        </nav>

        <div id="listNutri" class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
                Menu
            </a>
            <a id="menuAlerta" href="#" class="list-group-item list-group-item-action" onclick="terminarDieta()">Encerrar dieta <img id="cancelarDieta" src="img/icons8-cancelar-48.png" alt=""></a>
            <a href="#" class="list-group-item list-group-item-action" style="background-color: rgba(134, 214, 143, 0.72);">Av. Antropométrica</a>
            <a href="#" class="list-group-item list-group-item-action" style="background-color: rgba(134, 214, 143, 0.72);">Av. Bioquímica</a>
            <a href="#" class="list-group-item list-group-item-action" style="background-color: rgba(134, 214, 143, 0.72);">Av. Clínica nutri.</a>
            <a href="#" class="list-group-item list-group-item-action" style="background-color: rgba(134, 214, 143, 0.72);">Vet FAO</a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" onclick="avisoNaoPodeAcessar()">Lista de alimentos<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a href="#" class="list-group-item list-group-item-action" style="background-color: rgba(134, 214, 143, 0.72);">Recordatório 24h</a>
            <a href="#" class="list-group-item list-group-item-action" style="background-color: rgba(134, 214, 143, 0.72);">Dietotarapia</a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" onclick="avisoNaoPodeAcessar()">Lista de subs.<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a href="#" class="list-group-item list-group-item-action">Impressão de dieta<i class="fas fa-check" style="font-size: 10px; color: #3b884d"></i></a>
        </div>

        <h4 id="menuNutricionista">Impressão da dieta <img src="img/icons8-impress%C3%A3o-48.png" alt=""></h4>
        <h4 id="menuNutricionista2">Dieta do paciente&nbsp; <img id="sacolaDeCompras" src="img/icons8-ma%C3%A7%C3%A3-48.png" alt=""></h4>

        <div id="secaoImpressao">
            <div>
                <span id="TMB-Kcal" class="badge badge-pill badge-success" style="margin-right: 130px;">Nome:</span>
                <input class="col-5" type="text" style="border-radius: 4px;" disabled="disabled" value=" <?php
                include_once 'conexao.php';               
               
               $sql = "select nome from cliente where ID_CLIENTE=".$_GET["id_cliente"];
               
               $result = mysqli_query($con, $sql);
               
               $row = mysqli_fetch_array($result);

               echo $row["nome"];
               
               ?> ">

            </div>
            <br>
            <div>
                <span id="TMB-Kcal" class="badge badge-pill badge-success" style="margin-right: 28px;">Data da consulta:</span>
                <input class="col-5" type="text" style="border-radius: 4px;" disabled="disabled" value=" <?php date_default_timezone_set('America/Sao_Paulo');           
              echo $data = date('d/m/Y');               

            ?> ">
            </div>
            <br>
            <div>
                <span id="TMB-Kcal" class="badge badge-pill badge-success" style="margin-right: 87px;">Altura (m):</span>
                <input class="col-5" type="text" style="border-radius: 4px;" disabled="disabled" value=" <?php
                
                include_once 'conexao.php';
                                
                $sql = "select ALTURA from a_antropometrica";                                     
                $result = mysqli_query($con, $sql);
            
                $row = mysqli_fetch_array($result);
                                              
                echo $row["ALTURA"] . " m";          

                ?> ">
            </div>
            <br>
            <div>
                <span id="TMB-Kcal" class="badge badge-pill badge-success" style="margin-right: 40px;">Peso Atual (kg):</span>
                <input class="col-5" type="text" style="border-radius: 4px;" disabled="disabled" value=" <?php
                
                include_once 'conexao.php';
                                
                $sql = "select PESO from a_antropometrica";                                     
                $result = mysqli_query($con, $sql);
            
                $row = mysqli_fetch_array($result);
                                              
                echo $row["PESO"] . " Kg";          

                ?> ">
            </div>
            <br>
            <div>
                <span id="TMB-Kcal" class="badge badge-pill badge-success" style="margin-right: 143px;">IMC:</span>
                <input class="col-5" type="text" style="border-radius: 4px;" disabled="disabled" value=" <?php
                
                include_once 'conexao.php';
                                
                $sql = "select ALTURA, PESO from a_antropometrica";                                     
                $result = mysqli_query($con, $sql);
            
                $row = mysqli_fetch_array($result);            

                $altura = $row["ALTURA"];          
                $peso = $row["PESO"];                                                    
                $resultadoIMC = $peso / ($altura * $altura);
            
            if ($resultadoIMC < 16.00) {
                echo "Magreza Grau 3";
            } else if ($resultadoIMC >= 16.00 && $resultadoIMC < 17.00) {
               echo "Magreza Grau 2";
            } else if ($resultadoIMC >= 17.00 && $resultadoIMC < 18.50) {
                echo "Magreza Grau 1";
            } else if ($resultadoIMC >= 18.50 && $resultadoIMC < 25.00) {
               echo "Eutrofia";
            } else if ($resultadoIMC >= 25.00 && $resultadoIMC < 30.00) {
               echo "Pre-Obesidade";
            } else if ($resultadoIMC >= 30.00 && $resultadoIMC < 35.00) {
                echo "Obesidade Grau 1";
            } else if ($resultadoIMC >= 35.00 && $resultadoIMC < 40.00) {
                echo "Obesidade Grau 2";
            } else if ($resultadoIMC > 40.00) {
                echo "Obesidade Grau 3";
            }

                ?> ">
            </div>
        </div>

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
                            $result = mysqli_query($con, $sql);

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
            
                            $result = mysqli_query($con, $sql);
            
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
            
                            $result = mysqli_query($con, $sql);
            
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
            
                            $result = mysqli_query($con, $sql);
            
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
            
                            $result = mysqli_query($con, $sql);
            
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
            
                            $result = mysqli_query($con, $sql);
            
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
            
                            $result = mysqli_query($con, $sql);
            
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
