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


            <div> <i id="usuarioLogado" class="fas fa-user-check"></i> <b>Bem-vindo nutricionista:</b>
                <?php echo "<i id='paciente'>"  .$_SESSION["login"] . "</i>" ; ?> <a style="text-decoration: none;" href="logout.php">&nbsp;<img id="logout" src="img/icons8-exit-48.png" alt=""></a>
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
            <a href="#" class="list-group-item list-group-item-action">Dietoterapia <i class="fas fa-check" style="font-size: 10px; color: #3b884d"></i> </a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" onclick="avisoNaoPodeAcessar()">Lista de subs.<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuAberto" href="#" class="list-group-item list-group-item-action" onclick="avisoAvancar()">Impressão de dieta<i class="fas fa-lock-open" id="cadeadoAberto"></i></a>
        </div>

        <h4 id="menuNutricionista">Conduta Dietoterápica &nbsp; <img id="prancheta" src="img/icons8-lista-64.png" alt=""> </h4>

        <div id="secaoDietoterapia">
            <div>
                <span id="TMB-Kcal" class="badge badge-pill badge-success" style="margin-right: 132px;">IMC:</span>
                <input class="col-4" type="text" style="border-radius: 4px;" disabled="disabled">
            </div>
            <br>
            <div>
                <span id="TMB-Kcal" class="badge badge-pill badge-success" style="margin-right: 28px;">Peso Atual (kg):</span>
                <input class="col-4" type="text" style="border-radius: 4px;" disabled="disabled">
            </div>
            <br>
            <div>
                <span id="TMB-Kcal" class="badge badge-pill badge-success" style="margin-right: 78px;">TMB/Kcal:</span>
                <input class="col-4" type="text" style="border-radius: 4px;" disabled="disabled">
            </div>
            <br>
            <div>
                <span id="TMB-Kcal" class="badge badge-pill badge-success" style="margin-right: 38px;">VET Calculado:</span>
                <input class="col-4" type="text" style="border-radius: 4px;" disabled="disabled">
            </div>
            <br>
            <div>
                <span id="TMB-Kcal" class="badge badge-pill badge-success">VET Dietoterápico:</span>
                <input class="col-4" type="text" style="border-radius: 4px;" disabled="disabled" value=" <?php 
                            
                            include_once 'conexao.php';
                                                                                                        
                            $sql = "select sum(cast(KCAL as decimal(15,2))) KCAL from alimentos";                                     
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["KCAL"]. "  Kcal";
            
                                     ?>">
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
                    <?php echo "<a href='impressaoDieta.php?id_cliente=".$_GET["id_cliente"]."'><img class='impressoraImagem animated pulse' src='img/icons8-m%C3%A1quina-de-escrever-com-tablet-48.png' alt=''></a>" ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Quant.</label>
                <div class="col-sm-4">
                    <input type="number" step="0.05" class="form-control" id="quantidade" name="quantidade" placeholder="">
                </div>
            </div>
        </div>


        <div style="width: 800px; margin-left: 250px; margin-top: 20px;">

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Alimento</label>
                <div class="col-sm-8">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                        <input type="text" id="pesquisaDeAlimentos" placeholder="Pesquise um Alimento" class="form-control" name="alimento" required>
                        <button class="btn-success" type="" onclick="getDados();"><i class="fas fa-search"></i></button>
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
                        echo "<td>".$row["CHO"]."</td>";
                        echo "<td>".$row["PTN"]."</td>";
                        echo "<td>".$row["LIP"]."</td>";
                        echo "<td>".$row["KCAL"]."</td>";
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
                            
                            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO from alimentos where NOME_REFEICAO = 'Desjejum'";
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["CHO"]."  g";
            
                                     ?>">
                </div>
                <div class=" form-group col-sm-2"><i style="margin-left: 34%;">ptn</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(PTN as decimal(15,2)))*4 PTN from alimentos where NOME_REFEICAO = 'Desjejum'";
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["PTN"]."  g";
            
                                     ?>">
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 36%;">lip</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = 'Desjejum'";
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["LIP"]."  g";
            
                                     ?>">
                </div>

                <div class="form-group col-sm-2"><i style="margin-left: 35%;"><i>VET</i></i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO, sum(cast(PTN as decimal(15,2)))*4 PTN, sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = 'Desjejum'";
       
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $vetDesjejum =  $row["CHO"]+$row["PTN"]+$row["LIP"]."  Kcal";
            
                                     ?>">
                </div>
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
                        echo "<td>".$row["CHO"]."</td>";
                        echo "<td>".$row["PTN"]."</td>";
                        echo "<td>".$row["LIP"]."</td>";
                        echo "<td>".$row["KCAL"]."</td>";
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
                            
                            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO from alimentos where NOME_REFEICAO = 'Colação'";
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["CHO"]."  g";
            
                                     ?>">
                </div>
                <div class=" form-group col-sm-2"><i style="margin-left: 34%;">ptn</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(PTN as decimal(15,2)))*4 PTN from alimentos where NOME_REFEICAO = 'Colação'";
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["PTN"]."  g";
            
                                     ?>">
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 36%;">lip</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = 'Colação'";
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["LIP"]."  g";
            
                                     ?>">
                </div>

                <div class="form-group col-sm-2"><i style="margin-left: 35%;"><i>VET</i></i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO, sum(cast(PTN as decimal(15,2)))*4 PTN, sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = 'Colação'";
       
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $vetColacao = $row["CHO"]+$row["PTN"]+$row["LIP"]."  Kcal";
            
                                     ?>">
                </div>
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
                        echo "<td>".$row["CHO"]."</td>";
                        echo "<td>".$row["PTN"]."</td>";
                        echo "<td>".$row["LIP"]."</td>";
                        echo "<td>".$row["KCAL"]."</td>";
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
                            
                            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO from alimentos where NOME_REFEICAO = 'Almoço'";
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["CHO"]."  g";
            
                                     ?>">
                </div>
                <div class=" form-group col-sm-2"><i style="margin-left: 34%;">ptn</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(PTN as decimal(15,2)))*4 PTN from alimentos where NOME_REFEICAO = 'Almoço'";
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["PTN"]."  g";
            
                                     ?>">
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 36%;">lip</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = 'Almoço'";
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["LIP"]."  g";
            
                                     ?>">
                </div>

                <div class="form-group col-sm-2"><i style="margin-left: 35%;"><i>VETl</i></i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO, sum(cast(PTN as decimal(15,2)))*4 PTN, sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = 'Almoço'";
       
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["CHO"]+$row["PTN"]+$row["LIP"]."  Kcal";
            
                                     ?>">
                </div>
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
                        echo "<td>".$row["CHO"]."</td>";
                        echo "<td>".$row["PTN"]."</td>";
                        echo "<td>".$row["LIP"]."</td>";
                        echo "<td>".$row["KCAL"]."</td>";
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
                            
                            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO from alimentos where NOME_REFEICAO = 'Lanche'";
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["CHO"]."  g";
            
                                     ?>">
                </div>
                <div class=" form-group col-sm-2"><i style="margin-left: 34%;">ptn</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(PTN as decimal(15,2)))*4 PTN from alimentos where NOME_REFEICAO = 'Lanche'";
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["PTN"]."  g";
            
                                     ?>">
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 36%;">lip</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = 'Lanche'";
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["LIP"]."  g";
            
                                     ?>">
                </div>

                <div class="form-group col-sm-2"><i style="margin-left: 35%;"><i>VET</i></i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO, sum(cast(PTN as decimal(15,2)))*4 PTN, sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = 'Lanche'";
       
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["CHO"]+$row["PTN"]+$row["LIP"]."  Kcal";
            
                                     ?>">
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
                        echo "<td>".$row["CHO"]."</td>";
                        echo "<td>".$row["PTN"]."</td>";
                        echo "<td>".$row["LIP"]."</td>";
                        echo "<td>".$row["KCAL"]."</td>";
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
                            
                            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO from alimentos where NOME_REFEICAO = '1ºLanche'";
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["CHO"]."  g";
            
                                     ?>">
                </div>
                <div class=" form-group col-sm-2"><i style="margin-left: 34%;">ptn</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(PTN as decimal(15,2)))*4 PTN from alimentos where NOME_REFEICAO = '1ºLanche'";
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["PTN"]."  g";
            
                                     ?>">
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 36%;">lip</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = '1ºLanche'";
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["LIP"]."  g";
            
                                     ?>">
                </div>

                <div class="form-group col-sm-2"><i style="margin-left: 35%;"><i>VET</i></i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO, sum(cast(PTN as decimal(15,2)))*4 PTN, sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = '1ºLanche'";
       
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["CHO"]+$row["PTN"]+$row["LIP"]."  Kcal";
            
                                     ?>">
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
                        echo "<td>".$row["CHO"]."</td>";
                        echo "<td>".$row["PTN"]."</td>";
                        echo "<td>".$row["LIP"]."</td>";
                        echo "<td>".$row["KCAL"]."</td>";
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
                            
                            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO from alimentos where NOME_REFEICAO = '2ºLanche'";
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["CHO"]."  g";
            
                                     ?>">
                </div>
                <div class=" form-group col-sm-2"><i style="margin-left: 34%;">ptn</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(PTN as decimal(15,2)))*4 PTN from alimentos where NOME_REFEICAO = '2ºLanche'";
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["PTN"]."  g";
            
                                     ?>">
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 36%;">lip</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = '2ºLanche'";
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["LIP"]."  g";
            
                                     ?>">
                </div>

                <div class="form-group col-sm-2"><i style="margin-left: 35%;"><i>VET</i></i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO, sum(cast(PTN as decimal(15,2)))*4 PTN, sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = '2ºLanche'";
       
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["CHO"]+$row["PTN"]+$row["LIP"]."  Kcal";
            
                                     ?>">
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
                        echo "<td>".$row["CHO"]."</td>";
                        echo "<td>".$row["PTN"]."</td>";
                        echo "<td>".$row["LIP"]."</td>";
                        echo "<td>".$row["KCAL"]."</td>";
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
                            
                            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO from alimentos where NOME_REFEICAO = 'Jantar'";
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["CHO"]."  g";
            
                                     ?>">
                </div>
                <div class=" form-group col-sm-2"><i style="margin-left: 34%;">ptn</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(PTN as decimal(15,2)))*4 PTN from alimentos where NOME_REFEICAO = 'Jantar'";
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["PTN"]."  g";
            
                                     ?>">
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 36%;">lip</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = 'Jantar'";
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["LIP"]."  g";
            
                                     ?>">
                </div>

                <div class="form-group col-sm-2"><i style="margin-left: 35%;"><i>VET</i></i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO, sum(cast(PTN as decimal(15,2)))*4 PTN, sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = 'Jantar'";
       
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["CHO"]+$row["PTN"]+$row["LIP"]."  Kcal";
            
                                     ?>">
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
                        echo "<td>".$row["CHO"]."</td>";
                        echo "<td>".$row["PTN"]."</td>";
                        echo "<td>".$row["LIP"]."</td>";
                        echo "<td>".$row["KCAL"]."</td>";
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
                            
                            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO from alimentos where NOME_REFEICAO = 'Ceia'";
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["CHO"]."  g";
            
                                     ?>">
                </div>
                <div class=" form-group col-sm-2"><i style="margin-left: 34%;">ptn</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(PTN as decimal(15,2)))*4 PTN from alimentos where NOME_REFEICAO = 'Ceia'";
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["PTN"]."  g";
            
                                     ?>">
                </div>
                <div class="form-group col-sm-2"><i style="margin-left: 36%;">lip</i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
                            $sql = "select sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = 'Ceia'";
        
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["LIP"]."  g";
            
                                     ?>">
                </div>

                <div class="form-group col-sm-2"><i style="margin-left: 35%;"><i>VET / Kcal</i></i>
                    <input style="text-align: center;" type="text" class="form-control" id="bracoDir" placeholder="" name="" disabled value=" <?php 
                            
            $sql = "select sum(cast(CHO as decimal(15,2)))*4 CHO, sum(cast(PTN as decimal(15,2)))*4 PTN, sum(cast(LIP as decimal(15,2)))*9 LIP from alimentos where NOME_REFEICAO = 'Ceia'";
       
                            $result = mysqli_query($con, $sql);
            
                            $row = mysqli_fetch_array($result);
            
                            echo $row["CHO"]+$row["PTN"]+$row["LIP"]."  Kcal";
            
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
