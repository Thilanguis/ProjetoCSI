<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <script type="text/javascript" src="js/ajax.js"></script>
    <title>Dietpro</title>
    <?php include_once 'head.php';
    include_once 'verificaLogin.php';
    include_once 'consulta-antropometria.php';
    include_once 'consulta-bioquimica.php';
    include_once 'consulta-clinicaNutricional.php';
    include_once 'consulta-vetFao.php';
    ?>

</head>

<body>

    <!-- input para pegar nome do nutricionista logado -->
    <input id="nutricionistaLogado" type="hidden" value="<?php echo $_SESSION["login"];  ?>">

    <!-- passando id do paciente -->
    <input type="hidden" id="id_cliente" name="id_cliente" value="<?php echo $_GET["id_cliente"] ?>">

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


            <div> <i id="usuarioLogado" class="fas fa-user-check"></i> <b>Bem-vindo Nutricionista:</b>
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
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" onclick="avisoNaoPodeAcessar()">Receituário <i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a href="#" class="list-group-item list-group-item-action">Dietoterapia <i class="fas fa-check" style="font-size: 16px; color: #3b884d"></i> </a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" onclick="avisoNaoPodeAcessar()">Lista de subs.<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuAberto" href="#" class="list-group-item list-group-item-action" onclick="avisoAvancar()">Impressão de dieta<i class="fas fa-lock-open" id="cadeadoAberto"></i></a>
        </div>

        <h4 id="menuNutricionista">Conduta Dietoterápica &nbsp; <img id="prancheta" src="img/icons8-lista-64.png" alt=""> <!-- Example single danger button -->
        </h4>

        <div id="consultarDadosPaciente" class="btn-group">
            <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <h5 class="mb-0" id="textoImprimir"><img title="Consulta Avaliação" src="img/icons8-estante-de-livros-48.png" alt=""></h5>
            </button>

            <div class="dropdown-menu">

                <?php echo "<a class='dropdown-item' href='#'><button title='Av. Antropométrica' id='botaoConsulta' class='btn btn-link' data-toggle='modal' data-target='#antropometria'><img id='caixaConsulta' src='img/icons8-balan%C3%A7a-industrial-48.png' alt=''></button></a>" ?>
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="#"><button title="Av. Bioquímica" id="botaoConsulta" class="btn btn-link" data-toggle="modal" data-target="#bioquimica"><img id='caixaConsulta' style="width: 48px; height: 48px;" src="img/icons8-microsc%C3%B3pio-96.png" alt=""></button></a>
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="#"><button title="Av. Clínica Nutricional" id="botaoConsulta" class="btn btn-link" data-toggle="modal" data-target="#clinicaNutricional"><i id='caixaConsulta1' class="fas fa-book-medical" style="font-size: 40px; color: #d83838; text-shadow: none;"></i></button></a>
                <div class="dropdown-divider"></div>
                
                <a class="dropdown-item" href="#"><button title="Av. Vet-Fao" id="botaoConsulta" class="btn btn-link" data-toggle="modal" data-target="#vetfao"><img id="caixaConsulta" src="img/icons8-calculadora-48.png" alt=""></button></a>
                
            </div>

        </div>

        <div id="secaoDietoterapia">
            <div>
                <span id="TMB-Kcal" class="badge badge-pill badge-success" style="margin-right: 128px;">IMC:</span>
                <input class="col-5" type="text" style="border-radius: 4px;" disabled="disabled" value="<?php
                
                include_once 'conexao.php';
                                
                $sql = "select ALTURA, PESO from cliente inner join a_antropometrica ON cliente.ID_CLIENTE = a_antropometrica.ID_CLIENTE where cliente.ID_CLIENTE = ".$_GET["id_cliente"];                                    
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
            <br>
            <div>
                <span id="TMB-Kcal" class="badge badge-pill badge-success" style="margin-right: 66px;">Peso Atual:</span>
                <input class="col-5" type="text" style="border-radius: 4px;" disabled="disabled" value="<?php  
                                                                                                        
              include_once 'conexao.php';
            
            $sql = "select PESO from cliente inner join a_antropometrica ON cliente.ID_CLIENTE = a_antropometrica.ID_CLIENTE where cliente.ID_CLIENTE = ".$_GET["id_cliente"];
                
            $result = mysqli_query($con, $sql);
                
            $row = mysqli_fetch_array($result);
              
             echo number_format($row[0],2)." Kg";                                                                                           
             ?>">
            </div>
            <br>
            <div>
                <span id="TMB-Kcal" class="badge badge-pill badge-success" style="margin-right: 74px;">TMB/Kcal:</span>
                <input class="col-5" type="text" style="border-radius: 4px;" disabled="disabled" value="<?php            
            include_once 'conexao.php';
                
            $sql = "select DT_NASCIMENTO, PESO, ALTURA, SEXO from cliente  inner join a_antropometrica  ON cliente.ID_CLIENTE = a_antropometrica.ID_CLIENTE where cliente.ID_CLIENTE = ".$_GET["id_cliente"];
                
            $result = mysqli_query($con, $sql);
                
            $row = mysqli_fetch_array($result);
                
                $data = $row["DT_NASCIMENTO"];
                
                // separando yyyy, mm, ddd
            list($ano, $mes, $dia) = explode('-', $data);

            // data atual
            $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
            // Descobre a unix timestamp da data de nascimento do fulano
            $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

            // cálculo
            $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
                
            //declarando variáveis
            $peso = $row[1];   
            $altura = $row[2];   
            $sexo = $row[3];
                
            //calculando TMB
    if($sexo == "Masculino"){
		if($idade >= 10 && $idade < 18){
		echo number_format($resultadoTMB = (17.5 * $peso) + 651,2). " Kcal";
		}
		if($idade >= 18 && $idade < 30){
		echo number_format($resultadoTMB = (15.3 * $peso) + 679,2). " Kcal";
		}
		if($idade >= 30 && $idade < 60){
		echo number_format($resultadoTMB = (11.6 * $peso) + 879,2). " Kcal";
		}
		if($idade >= 60){
		echo number_format($resultadoTMB = (13.5 * $peso) + 487,2). " Kcal";
		}
	}
	if($sexo == "Feminino"){
		if($idade >= 10 && $idade < 18){
		echo number_format($resultadoTMB = (12.2 * $peso)+ 746,2). " Kcal";
		}
		if($idade >= 18 && $idade < 30){
		echo number_format($resultadoTMB = (14.7 * $peso) + 496,2). " Kcal";
		}
		if($idade >= 30 && $idade < 60){
		echo number_format($resultadoTMB = (8.5 * $peso) + 829,2). " Kcal";
		}
		if($idade >= 60){
		echo number_format($resultadoTMB = (10.5 * $peso) + 596,2). " Kcal";
		}
	
	}
                
            ?> 
                ">
            </div>
            <br>
            <div>
                <span id="TMB-Kcal" class="badge badge-pill badge-success" style="margin-right: 32px;">VET Calculado:</span>
                <input class="col-5" type="text" style="border-radius: 4px;" disabled value="<?php $resultadoTMB;
                    
                $sqlVET = "select * from vet_fao where ID_CLIENTE = ".$_GET["id_cliente"]; 
                    
                $resultVET = mysqli_query($con, $sqlVET);
                    
                $rowVET = mysqli_fetch_array($resultVET);
                
                //declarando variáveis
                $sono = $rowVET[1];
                $aVontade = $rowVET[2];
                $estudo = $rowVET[3];
                $exercicioFisico = $rowVET[4];
                $atividadeFisica = $rowVET[5];
                $trabalho = $rowVET[6];
                $sonoHora = $rowVET[7];
                $aVontadeHora = $rowVET[11];
                $estudoHora = $rowVET[9];
                $exercicioFisicoHora = $rowVET[10];
                $atividadeFisicaHora = $rowVET[12];
                $trabalhoHora = $rowVET[8];
                
                
                //calculando o VEt final    
                    
                echo number_format($resultadoTMB * ((($sono * $sonoHora) + ($aVontade * $aVontadeHora) + ($estudo * $estudoHora) + ($exercicioFisico * $exercicioFisicoHora) + ($atividadeFisica * $atividadeFisicaHora) + ($trabalho * $trabalhoHora)) / 24),2)." Kcal";
                    ?>
                ">
            </div>
            <br>
            <div>
                <span id="TMB-Kcal" class="badge badge-pill badge-success" style="margin-right: 6px;">VET Dietoterapia:</span>
                <input class="col-5" type="text" style="border-radius: 4px;" disabled="disabled" value=" <?php 
                            
                            include_once 'conexao.php';
                                                                                                    
                            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO, sum(cast(PTN as decimal(15,2)))*4 PTN, sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where ID_CLIENTE = ".$_GET["id_cliente"];
                                                                                                                                             
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo number_format($row["CHO"] + $row["PTN"] + $row["LIP"],2)."  Kcal";
            
                                     ?>">
            </div>
            
            <div>
                <span id="TMB-Kcal" class="badge badge-pill badge-success" style="margin-right: 8px; margin-top: 22px;">Macronutrientes:</span>
                <input id="macronutriente" name="macronutriente" class="col-6" type="text" style=" font-size: 14px;border-radius: 4px;" disabled="disabled" value=" <?php include_once 'conexao.php';                                           $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO, sum(cast(PTN as decimal(15,2)))*4 PTN, sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where ID_CLIENTE = ".$_GET["id_cliente"];                         $kcalTotal = $row["CHO"] + $row["PTN"] + $row["LIP"];
                                                                                                                                             
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
                            if($kcalTotal == 0){
                                echo "cho 0% ptn 0% lip 0%";
                            } 
                            else {

            
                            $kcalTotal = $row["CHO"] + $row["PTN"] + $row["LIP"];
            
                            echo "cho ".number_format((($row["CHO"]/4) * 400) / $kcalTotal,0) . "% ";
                            echo "ptn ".number_format((($row["PTN"]/4) * 400) / $kcalTotal,0) . "% ";
                            echo "lip ".number_format((($row["LIP"]/9) * 900) / $kcalTotal,0) . "% ";
                                     }?>">
            </div>
        </div>

        <div id="inclusaoAlimentos">
            <h5 style="text-align: center; padding-bottom: 20px;"><b><i>Montagem da dieta</i></b></h5>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Horário</label>
                <div class="col-sm-4">
                    <input type="time" class="form-control" id="horario" placeholder="Email" name="horario">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Refeição</label>
                <div class="col-sm-4">
                    <select class="custom-select my-1 mr-sm-2" id="refeicao" name="refeicao">
                        <option selected></option>
                        <option value="Desjejum">Desjejum</option>
                        <option value="Colação">Colação</option>
                        <option value="Almoço">Almoço</option>
                        <option value="Lanche">Lanche</option>
                        <option value="2ºLanche">2ºLanche</option>
                        <option value="3ºLanche">3ºLanche</option>
                        <option value="Jantar">Jantar</option>
                        <option value="Ceia">Ceia</option>
                    </select>
                </div>
                <div id="botaoIndoParaImpressao">
                    <?php echo "<a title='Imprimir dieta' href='impressaoDieta.php?id_cliente=".$_GET["id_cliente"]."'><img class='impressoraImagem animated pulse' src='img/icons8-m%C3%A1quina-de-escrever-com-tablet-48.png' alt=''></a>" ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Quant.</label>
                <div class="col-sm-4">
                    <input type="number" step="0.05" class="form-control" id="quantidade" name="quantidade" placeholder="" value="1">
                </div>
            </div>
        </div>


        <div style="width: 800px; margin-left: 250px; margin-top: 20px;">

            <div class="form-group row">
                <label style="margin-top: 9px;" for="inputEmail3" class="col-sm-2 col-form-label">Alimento</label>
                <div class="col-sm-8">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                        <input type="text" id="pesquisaDeAlimentos" placeholder="Pesquise um Alimento" class="form-control" name="alimento" required>
                        <button id="btnBuscaPaciente" class="btn btn-success" type="" onclick="getDados();"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group row">
                    <div class="col-sm-12" id="Resultado">



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
        
        include_once 'funcoesProjeto.php';
        
        include_once 'excluirAlimento.php';
        
        $sql = "select * from alimentos where NOME_REFEICAO = 'Desjejum' and ID_CLIENTE=".$_GET["id_cliente"];
        
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
                <input type="text" class="form-control col-7" disabled value=" <?php
      echo $row["NOME_REFEICAO"]; ?> ">
                <label>
                    <h6>horário</h6>
                </label>
                <input class="form-control col-7" type="text" disabled value=" <?php 
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
                            <th scope="col">Excluir</th>
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
                        echo "<td>".number_format($row["CHO"],2)." g</td>";
                        echo "<td>".number_format($row["PTN"],2)." g</td>";
                        echo "<td>".number_format($row["LIP"],2)." g</td>";
                        echo "<td>".number_format((($row["CHO"]*4)+($row["PTN"]*4)+($row["LIP"]*9)),2)." Kcal</td>";
                        echo "<td><a href='#' onclick='excluirAlimento(".$row["ID"].")'><i class='far fa-trash-alt' style='padding-left: 22px' id='delet'></i></td>";
                         ?>

                        <!-- exemplo de escrever código acima em html inserindo php -->
                        <!-- <td><a href="excluirAlimento.php?excluirAlimento=<?php //echo $row['ID'];?>"><i class="far fa-trash-alt"></i></a></td> -->
                        <?php
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
                    <input style="text-align: center;" type="text" class="form-control" id="bracoEsq" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO from alimentos where NOME_REFEICAO = 'Desjejum' and ID_CLIENTE=".$_GET["id_cliente"];
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["CHO"]."  Kcal";
            
                                     ?>">
                </div>
                <div class=" form-group col-sm-2"><i style="margin-left: 34%;">ptn</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(PTN as decimal(15,2)))*4 PTN from alimentos where NOME_REFEICAO = 'Desjejum' and ID_CLIENTE=".$_GET["id_cliente"];
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["PTN"]."  Kcal";
            
                                     ?>">
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 36%;">lip</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = 'Desjejum' and ID_CLIENTE=".$_GET["id_cliente"];
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["LIP"]."  Kcal";
            
                                     ?>">
                </div>

                <div class="form-group col-sm-2"><i style="margin-left: 35%;"><i>VET</i></i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO, sum(cast(PTN as decimal(15,2)))*4 PTN, sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = 'Desjejum' and ID_CLIENTE=".$_GET["id_cliente"];
       
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $vetDesjejum =  number_format($row["CHO"]+$row["PTN"]+$row["LIP"],2)."  Kcal";
            
                                     ?>">
                </div>
            </div>
        </div>
        <hr>
        <?php } ?>


        <!-- Tabela Colação -->

        <?php
        
        include_once 'conexao.php';
        
        $sql = "select * from alimentos where NOME_REFEICAO = 'Colação' and ID_CLIENTE=".$_GET["id_cliente"];
        
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
                <input type="text" class="form-control col-7" disabled value=" <?php
      echo $row["NOME_REFEICAO"]; ?> ">
                <label>
                    <h6>horário</h6>
                </label>
                <input class="form-control col-7" type="text" disabled value=" <?php 
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
                            <th scope="col">Excluir</th>
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
                        echo "<td>".number_format($row["CHO"],2)." g</td>";
                        echo "<td>".number_format($row["PTN"],2)." g</td>";
                        echo "<td>".number_format($row["LIP"],2)." g</td>";
                        echo "<td>".number_format((($row["CHO"]*4)+($row["PTN"]*4)+($row["LIP"]*9)),2)." Kcal</td>";
                        echo "<td><a href='#' onclick='excluirAlimento(".$row["ID"].")'><i class='far fa-trash-alt' style='padding-left: 22px' id='delet'></i></td>";
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
                    <input style="text-align: center;" type="text" class="form-control" id="bracoEsq" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO from alimentos where NOME_REFEICAO = 'Colação' and ID_CLIENTE=".$_GET["id_cliente"];
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["CHO"]."  Kcal";
            
                                     ?>">
                </div>
                <div class=" form-group col-sm-2"><i style="margin-left: 34%;">ptn</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(PTN as decimal(15,2)))*4 PTN from alimentos where NOME_REFEICAO = 'Colação' and ID_CLIENTE=".$_GET["id_cliente"];
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["PTN"]."  Kcal";
            
                                     ?>">
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 36%;">lip</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = 'Colação' and ID_CLIENTE=".$_GET["id_cliente"];
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["LIP"]."  Kcal";
            
                                     ?>">
                </div>

                <div class="form-group col-sm-2"><i style="margin-left: 35%;"><i>VET</i></i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO, sum(cast(PTN as decimal(15,2)))*4 PTN, sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = 'Colação' and ID_CLIENTE=".$_GET["id_cliente"];
       
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $vetColacao = number_format($row["CHO"]+$row["PTN"]+$row["LIP"],2)."  Kcal";
            
                                     ?>">
                </div>
            </div>
        </div>
        <hr>
        <?php } ?>


        <!-- Tabela Almoço -->

        <?php
        
        include_once 'conexao.php';
        
        $sql = "select * from alimentos where NOME_REFEICAO = 'Almoço' and ID_CLIENTE=".$_GET["id_cliente"];
        
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
                <input type="text" class="form-control col-7" disabled value=" <?php
      echo $row["NOME_REFEICAO"]; ?> ">
                <label>
                    <h6>horário</h6>
                </label>
                <input class="form-control col-7" type="text" disabled value=" <?php 
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
                            <th scope="col">Excluir</th>
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
                        echo "<td>".number_format($row["CHO"],2)." g</td>";
                        echo "<td>".number_format($row["PTN"],2)." g</td>";
                        echo "<td>".number_format($row["LIP"],2)." g</td>";
                        echo "<td>".number_format((($row["CHO"]*4)+($row["PTN"]*4)+($row["LIP"]*9)),2)." Kcal</td>";
                        echo "<td><a href='#' onclick='excluirAlimento(".$row["ID"].")'><i class='far fa-trash-alt' style='padding-left: 22px' id='delet'></i></td>";
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
                    <input style="text-align: center;" type="text" class="form-control" id="bracoEsq" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO from alimentos where NOME_REFEICAO = 'Almoço' and ID_CLIENTE=".$_GET["id_cliente"];
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["CHO"]."  Kcal";
            
                                     ?>">
                </div>
                <div class=" form-group col-sm-2"><i style="margin-left: 34%;">ptn</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(PTN as decimal(15,2)))*4 PTN from alimentos where NOME_REFEICAO = 'Almoço' and ID_CLIENTE=".$_GET["id_cliente"];
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["PTN"]."  Kcal";
            
                                     ?>">
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 36%;">lip</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = 'Almoço' and ID_CLIENTE=".$_GET["id_cliente"];
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["LIP"]."  Kcal";
            
                                     ?>">
                </div>

                <div class="form-group col-sm-2"><i style="margin-left: 35%;"><i>VETl</i></i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO, sum(cast(PTN as decimal(15,2)))*4 PTN, sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = 'Almoço' and ID_CLIENTE=".$_GET["id_cliente"];
       
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo number_format($row["CHO"]+$row["PTN"]+$row["LIP"],2)."  Kcal";
            
                                     ?>">
                </div>
            </div>
        </div>
        <hr>
        <?php } ?>


        <!-- Tabela lanche -->

        <?php
        
        include_once 'conexao.php';
        
        $sql = "select * from alimentos where NOME_REFEICAO = 'Lanche' and ID_CLIENTE=".$_GET["id_cliente"];
        
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
                <input type="text" class="form-control col-7" disabled value=" <?php
      echo $row["NOME_REFEICAO"]; ?> ">
                <label>
                    <h6>horário</h6>
                </label>
                <input class="form-control col-7" type="text" disabled value=" <?php 
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
                            <th scope="col">Excluir</th>
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
                        echo "<td>".number_format($row["CHO"],2)." g</td>";
                        echo "<td>".number_format($row["PTN"],2)." g</td>";
                        echo "<td>".number_format($row["LIP"],2)." g</td>";
                        echo "<td>".number_format((($row["CHO"]*4)+($row["PTN"]*4)+($row["LIP"]*9)),2)." Kcal</td>";
                        echo "<td><a href='#' onclick='excluirAlimento(".$row["ID"].")'><i class='far fa-trash-alt' style='padding-left: 22px' id='delet'></i></td>";
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
                    <input style="text-align: center;" type="text" class="form-control" id="bracoEsq" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO from alimentos where NOME_REFEICAO = 'Lanche' and ID_CLIENTE=".$_GET["id_cliente"];
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["CHO"]."  Kcal";
            
                                     ?>">
                </div>
                <div class=" form-group col-sm-2"><i style="margin-left: 34%;">ptn</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(PTN as decimal(15,2)))*4 PTN from alimentos where NOME_REFEICAO = 'Lanche' and ID_CLIENTE=".$_GET["id_cliente"];
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["PTN"]."  Kcal";
            
                                     ?>">
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 36%;">lip</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = 'Lanche' and ID_CLIENTE=".$_GET["id_cliente"];
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["LIP"]."  Kcal";
            
                                     ?>">
                </div>

                <div class="form-group col-sm-2"><i style="margin-left: 35%;"><i>VET</i></i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO, sum(cast(PTN as decimal(15,2)))*4 PTN, sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = 'Lanche' and ID_CLIENTE=".$_GET["id_cliente"];
       
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo number_format($row["CHO"]+$row["PTN"]+$row["LIP"],2)."  Kcal";
            
                                     ?>">
                </div>
            </div>
        </div>
        <hr>
        <?php } ?>


        <!-- Tabela 2ºLanche -->

        <?php
        
        include_once 'conexao.php';
        
        $sql = "select * from alimentos where NOME_REFEICAO = '2ºLanche' and ID_CLIENTE=".$_GET["id_cliente"];
        
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
                <input type="text" class="form-control col-7" disabled value=" <?php
      echo $row["NOME_REFEICAO"]; ?> ">
                <label>
                    <h6>horário</h6>
                </label>
                <input class="form-control col-7" type="text" disabled value=" <?php 
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
                            <th scope="col">Excluir</th>
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
                        echo "<td>".number_format($row["CHO"],2)." g</td>";
                        echo "<td>".number_format($row["PTN"],2)." g</td>";
                        echo "<td>".number_format($row["LIP"],2)." g</td>";
                        echo "<td>".number_format((($row["CHO"]*4)+($row["PTN"]*4)+($row["LIP"]*9)),2)." Kcal</td>";
                        echo "<td><a href='#' onclick='excluirAlimento(".$row["ID"].")'><i class='far fa-trash-alt' style='padding-left: 22px' id='delet'></i></td>";
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
                    <input style="text-align: center;" type="text" class="form-control" id="bracoEsq" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO from alimentos where NOME_REFEICAO = '2ºLanche' and ID_CLIENTE=".$_GET["id_cliente"];
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["CHO"]."  Kcal";
            
                                     ?>">
                </div>
                <div class=" form-group col-sm-2"><i style="margin-left: 34%;">ptn</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(PTN as decimal(15,2)))*4 PTN from alimentos where NOME_REFEICAO = '2ºLanche' and ID_CLIENTE=".$_GET["id_cliente"];
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["PTN"]."  Kcal";
            
                                     ?>">
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 36%;">lip</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = '2ºLanche' and ID_CLIENTE=".$_GET["id_cliente"];
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["LIP"]."  Kcal";
            
                                     ?>">
                </div>

                <div class="form-group col-sm-2"><i style="margin-left: 35%;"><i>VET</i></i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO, sum(cast(PTN as decimal(15,2)))*4 PTN, sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = '2ºLanche' and ID_CLIENTE=".$_GET["id_cliente"];
       
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo number_format($row["CHO"]+$row["PTN"]+$row["LIP"],2)."  Kcal";
            
                                     ?>">
                </div>
            </div>
        </div>
        <hr>
        <?php } ?>


        <!-- Tabela 3ºLanche -->

        <?php
        
        include_once 'conexao.php';
        
        $sql = "select * from alimentos where NOME_REFEICAO = '3ºLanche' and ID_CLIENTE=".$_GET["id_cliente"];
        
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
                <input type="text" class="form-control col-7" disabled value=" <?php
      echo $row["NOME_REFEICAO"]; ?> ">
                <label>
                    <h6>horário</h6>
                </label>
                <input class="form-control col-7" type="text" disabled value=" <?php 
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
                            <th scope="col">Excluir</th>
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
                        echo "<td>".number_format($row["CHO"],2)." g</td>";
                        echo "<td>".number_format($row["PTN"],2)." g</td>";
                        echo "<td>".number_format($row["LIP"],2)." g</td>";
                        echo "<td>".number_format((($row["CHO"]*4)+($row["PTN"]*4)+($row["LIP"]*9)),2)." Kcal</td>";
                        echo "<td><a href='#' onclick='excluirAlimento(".$row["ID"].")'><i class='far fa-trash-alt' style='padding-left: 22px' id='delet'></i></td>";
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
                    <input style="text-align: center;" type="text" class="form-control" id="bracoEsq" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO from alimentos where NOME_REFEICAO = '3ºLanche' and ID_CLIENTE=".$_GET["id_cliente"];
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["CHO"]."  Kcal";
            
                                     ?>">
                </div>
                <div class=" form-group col-sm-2"><i style="margin-left: 34%;">ptn</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(PTN as decimal(15,2)))*4 PTN from alimentos where NOME_REFEICAO = '3ºLanche' and ID_CLIENTE=".$_GET["id_cliente"];
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["PTN"]."  Kcal";
            
                                     ?>">
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 36%;">lip</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = '3ºLanche' and ID_CLIENTE=".$_GET["id_cliente"];
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["LIP"]."  Kcal";
            
                                     ?>">
                </div>

                <div class="form-group col-sm-2"><i style="margin-left: 35%;"><i>VET</i></i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO, sum(cast(PTN as decimal(15,2)))*4 PTN, sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = '3ºLanche' and ID_CLIENTE=".$_GET["id_cliente"];
       
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo number_format($row["CHO"]+$row["PTN"]+$row["LIP"],2)."  Kcal";
            
                                     ?>">
                </div>
            </div>
        </div>
        <hr>
        <?php } ?>


        <!-- Tabela Jantar -->

        <?php
        
        include_once 'conexao.php';
        
        $sql = "select * from alimentos where NOME_REFEICAO = 'Jantar' and ID_CLIENTE=".$_GET["id_cliente"];
        
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
                <input type="text" class="form-control col-7" disabled value=" <?php
      echo $row["NOME_REFEICAO"]; ?> ">
                <label>
                    <h6>horário</h6>
                </label>
                <input class="form-control col-7" type="text" disabled value=" <?php 
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
                            <th scope="col">Excluir</th>
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
                       echo "<td>".number_format($row["CHO"],2)." g</td>";
                        echo "<td>".number_format($row["PTN"],2)." g</td>";
                        echo "<td>".number_format($row["LIP"],2)." g</td>";
                        echo "<td>".number_format((($row["CHO"]*4)+($row["PTN"]*4)+($row["LIP"]*9)),2)." Kcal</td>";
                        echo "<td><a href='#' onclick='excluirAlimento(".$row["ID"].")'><i class='far fa-trash-alt' style='padding-left: 22px' id='delet'></i></td>";
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
                    <input style="text-align: center;" type="text" class="form-control" id="bracoEsq" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO from alimentos where NOME_REFEICAO = 'Jantar' and ID_CLIENTE=".$_GET["id_cliente"];
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["CHO"]."  Kcal";
            
                                     ?>">
                </div>
                <div class=" form-group col-sm-2"><i style="margin-left: 34%;">ptn</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(PTN as decimal(15,2)))*4 PTN from alimentos where NOME_REFEICAO = 'Jantar' and ID_CLIENTE=".$_GET["id_cliente"];
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["PTN"]."  Kcal";
            
                                     ?>">
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 36%;">lip</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = 'Jantar' and ID_CLIENTE=".$_GET["id_cliente"];
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["LIP"]."  Kcal";
            
                                     ?>">
                </div>

                <div class="form-group col-sm-2"><i style="margin-left: 35%;"><i>VET</i></i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO, sum(cast(PTN as decimal(15,2)))*4 PTN, sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = 'Jantar' and ID_CLIENTE=".$_GET["id_cliente"];
       
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo number_format($row["CHO"]+$row["PTN"]+$row["LIP"],2)."  Kcal";
            
                                     ?>">
                </div>
            </div>
        </div>
        <hr>
        <?php } ?>

        <!-- Tabela Ceia -->

        <?php
        
        include_once 'conexao.php';
        
        $sql = "select * from alimentos where NOME_REFEICAO = 'Ceia' and ID_CLIENTE=".$_GET["id_cliente"];
        
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
                <input type="text" class="form-control col-7" disabled value=" <?php
      echo $row["NOME_REFEICAO"]; ?> ">
                <label>
                    <h6>horário</h6>
                </label>
                <input class="form-control col-7" type="text" disabled value=" <?php 
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
                            <th scope="col">Excluir</th>
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
                        echo "<td>".number_format($row["CHO"],2)." g</td>";
                        echo "<td>".number_format($row["PTN"],2)." g</td>";
                        echo "<td>".number_format($row["LIP"],2)." g</td>";
                        echo "<td>".number_format((($row["CHO"]*4)+($row["PTN"]*4)+($row["LIP"]*9)),2)." Kcal</td>";
                        echo "<td><a href='#' onclick='excluirAlimento(".$row["ID"].")'><i class='far fa-trash-alt' style='padding-left: 22px' id='delet'></i></td>";
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
                    <input style="text-align: center;" type="text" class="form-control" id="bracoEsq" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO from alimentos where NOME_REFEICAO = 'Ceia' and ID_CLIENTE=".$_GET["id_cliente"];
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["CHO"]."  Kcal";
            
                                     ?>">
                </div>
                <div class=" form-group col-sm-2"><i style="margin-left: 34%;">ptn</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(PTN as decimal(15,2)))*4 PTN from alimentos where NOME_REFEICAO = 'Ceia' and ID_CLIENTE=".$_GET["id_cliente"];
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["PTN"]."  Kcal";
            
                                     ?>">
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 36%;">lip</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = 'Ceia' and ID_CLIENTE=".$_GET["id_cliente"];
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["LIP"]."  Kcal";
            
                                     ?>">
                </div>

                <div class="form-group col-sm-2"><i style="margin-left: 35%;"><i>VET / Kcal</i></i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO, sum(cast(PTN as decimal(15,2)))*4 PTN, sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = 'Ceia' and ID_CLIENTE=".$_GET["id_cliente"];
       
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo number_format($row["CHO"]+$row["PTN"]+$row["LIP"],2)."  Kcal";
            
                                     ?>">
                </div>
            </div>
        </div>
        <hr>
        <?php } ?>



        <footer class="container" id="rodape">
            <?php include_once 'rodape.php'; ?>
        </footer>

    </div>
</body>

</html>
