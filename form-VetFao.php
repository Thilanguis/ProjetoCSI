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

    <!-- input para pegar nome do nutricionista logado -->
    <input id="nutricionistaLogado" type="hidden" value="<?php echo $_SESSION["login"];  ?>">

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
            <a href="#" class="list-group-item list-group-item-action">Vet FAO <i class="fas fa-check" style="font-size: 16px; color: #3b884d"></i> </a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" onclick="avisoNaoPodeAcessar()">Lista de alimentos<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" onclick="avisoNaoPodeAcessar()">Receituário <i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuAberto" href="#" class="list-group-item list-group-item-action" onclick="avisoAvancar()">Dietoterapia<i class="fas fa-lock-open" id="cadeadoAberto"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" onclick="avisoNaoPodeAcessar()">Lista de subs.<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuAberto" href="#" class="list-group-item list-group-item-action" onclick="avisoAvancar()">Impressão de dieta<i class="fas fa-lock-open" id="cadeadoAberto"></i></a>
        </div>

        <h4 id="menuNutricionista">Valor Energético total &nbsp; <img id="calculadora" src="img/icons8-calculadora-48.png" alt=""></h4>
        <h6 id="menuNutricionista1"><i>Fonte: FAO,WHO,UNU,1985</i></h6>

        <div id="tmb">
            <span id="TMB-Kcal" class="badge badge-pill badge-success">TMB/Kcal:</span>
            <input id="tmbPaciente" type="text" onchange="calcularNafTotal()" style="border-radius: 4px;" disabled value=" <?php
            
            include_once 'conexao.php';
                
            $sql = "select DT_NASCIMENTO, PESO, ALTURA, SEXO from cliente inner join a_antropometrica ON cliente.ID_CLIENTE = a_antropometrica.ID_CLIENTE where cliente.ID_CLIENTE =".$_GET["id_cliente"];
                
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
		echo number_format($resultadoTMB = (17.5 * $peso) + 651,2);
		}
		if($idade >= 18 && $idade < 30){
		echo number_format($resultadoTMB = (15.3 * $peso) + 679,2);
		}
		if($idade >= 30 && $idade < 60){
		echo number_format($resultadoTMB = (11.6 * $peso) + 879,2);
		}
		if($idade >= 60){
		echo number_format($resultadoTMB = (13.5 * $peso) + 487,2);
		}
	}
	if($sexo == "Feminino"){
		if($idade >= 10 && $idade < 18){
		echo number_format($resultadoTMB = (12.2 * $peso)+ 746,2);
		}
		if($idade >= 18 && $idade < 30){
		echo number_format($resultadoTMB = (14.7 * $peso) + 496,2);
		}
		if($idade >= 30 && $idade < 60){
		echo number_format($resultadoTMB = (8.5 * $peso) + 829,2);
		}
		if($idade >= 60){
		echo number_format($resultadoTMB = (10.5 * $peso) + 596,2);
		}
	
	}
                
            ?> ">
            <div id="vet">
                <span id="TMB-Kcal" class="badge badge-pill badge-success">VET/Kcal:</span>
                <p id="resultadoVet">

                </p>
            </div>
        </div>

        <div id="form-VET">
            <form action="cadastroVetFao.php" method="post">

                <!-- passando id do paciente -->
                <input type="hidden" name="id_cliente" value="<?php echo $_GET["id_cliente"] ?>">

                <h5 style="display: inline-block;">Atividade</h5>
                <h5 style="display: inline-block; margin-left: 12px; margin-bottom: 30px;">Horas/Dia</h5>
                <h5 style="display: inline-block; margin-left: 33px;" title="Nível atividade física">NAF</h5>

                <div class="form-row">
                    <label for="inputPassword" class="col-4 col-form-label">
                        <h6><i>Sono :</i></h6>
                    </label>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" step="0.01" class="form-control" id="sono" onchange="calcularNafTotal()" name="sono" value="0">
                    </div>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" step="0.01" class="form-control" id="NAF_sono" onchange="calcularNafTotal()" name="NAF_sono" value="0">
                    </div>
                </div>
                <div class="form-row">
                    <label for="inputPassword" class="col-4 col-form-label">
                        <h6><i>Trabalho :</i></h6>
                    </label>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" step="0.01" class="form-control" id="trabalho" onchange="calcularNafTotal()" name="trabalho" value="0">
                    </div>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" step="0.01" class="form-control" id="NAF_trabalho" onchange="calcularNafTotal()" name="NAF_trabalho" value="0">
                    </div>
                </div>
                <div class="form-row">
                    <label for="inputPassword" class="col-4 col-form-label">
                        <h6><i>Estudo :</i></h6>
                    </label>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" step="0.01" class="form-control" id="estudo" onchange="calcularNafTotal()" name="estudo" value="0">
                    </div>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" step="0.01" class="form-control" id="NAF_estudo" onchange="calcularNafTotal()" placeholder="" name="NAF_estudo" value="0">
                    </div>
                </div>
                <div class="form-row">
                    <label for="inputPassword" class="col-4 col-form-label">
                        <h6><i>Exer. físico :</i></h6>
                    </label>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" step="0.01" class="form-control" id="exerFisico" onchange="calcularNafTotal()" onchange="calcularNafTotal()" name="exerFisico" value="0">
                    </div>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" step="0.01" class="form-control" id="NAF_exerFisico" onchange="calcularNafTotal()" name="NAF_exerFisico" value="0">
                    </div>
                </div>
                <div class="form-row">
                    <label for="inputPassword" class="col-4 col-form-label">
                        <h6><i>À vontade :</i></h6>
                    </label>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" step="0.01" class="form-control" id="avontade" onchange="calcularNafTotal()" name="avontade" value="0">
                    </div>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" step="0.01" class="form-control" id="NAF_avontade" onchange="calcularNafTotal()" name="NAF_avontade" value="0">
                    </div>
                </div>
                <div class="form-row">
                    <label for="inputPassword" class="col-4 col-form-label">
                        <h6><i>Ativ. Física :</i></h6>
                    </label>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" step="0.01" class="form-control" id="ativFisica" onchange="calcularNafTotal()" onchange="calcularNafTotal()" name="ativFisica" value="0">
                    </div>
                    <div class="form-group col-sm-4">
                        <input style="text-align: center;" type="number" step="0.01" class="form-control" id="NAF_ativFisica" onchange="calcularNafTotal()" name="NAF_ativFisica" value="0">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <h6><i>24 horas/dia:</i></h6>
                    </div>
                    <div class="form-group" id="resultadoConta">

                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <h6><i>NAF total:</i></h6>
                    </div>
                    <div class="form-group" id="resultadoNAF">

                    </div>
                </div>


                <button style="margin-left: 280px; margin-bottom: 20px; margin-top:60px;" id="btnentrar" type="submit" class="btn btn-primary">Salvar/Gerar VET</button>
            </form>
        </div>

        <div id="tabelaAT">
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th></th>
                        <th style="text-align: center;" scope="col">
                            Nível de atividade física
                        </th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th scope="col-4"><img src="img/icons8-barbell-48.png" alt=""></th>
                        <th style="text-align: center;" scope="col-4">Masculino</th>
                        <th style="" scope="col-4">Feminino</th>
                        <th></th>
                    </tr>

                </thead>

                <tbody>
                    <tr>
                        <th>Sono</th>
                        <td style="text-align: center;">1,00</td>
                        <td style="text-align: center;">1,00</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>C. ao leito</th>
                        <td style="text-align: center;">1,27</td>
                        <td style="text-align: center;">1,27</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Leve</th>
                        <td style="text-align: center;">1,55</td>
                        <td style="text-align: center;">1,56</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Moderado</th>
                        <td style="text-align: center;;">1,78</td>
                        <td style="text-align: center;;">1,64</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Intenso</th>
                        <td style="text-align: center;;">2.1</td>
                        <td style="text-align: center;;">1,82</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Idoso</th>
                        <td style="text-align: center;;">1,51</td>
                        <td style="text-align: center;;">1,52</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <footer class="container" id="rodape">
            <?php include_once 'rodape.php'; ?>
        </footer>
    </div>

</body>

</html>