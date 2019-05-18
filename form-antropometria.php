<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <title>Dietpro</title>
    <?php include_once 'head.php';
    include_once 'verificaLogin.php';
    ?>
    <script src="js/graficoGoogle.js"></script>

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
                <?php echo "<i id='paciente'>"  .$_SESSION["login"] . "</i>" ; ?> <a style="text-decoration: none;" href="logout.php">&nbsp;<img id="logout" src="img/icons8-exit-48.png" alt=""></a>
            </div>
        </nav>

        <div id="listNutri1" class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
                Menu
            </a>
            <a id="menuAlerta" href="#" class="list-group-item list-group-item-action" onclick="terminarDieta()">Encerrar dieta <img id="cancelarDieta" src="img/icons8-cancelar-48.png" alt=""></a>
            <a href="#" class="list-group-item list-group-item-action">Av. Antropométrica <i class="fas fa-check" style="font-size: 10px; color: #3b884d"></i></a>
            <a id="menuAberto" href="#" class="list-group-item list-group-item-action" onclick="avisoAvancar()">Av. Bioquímica<i class="fas fa-lock-open" id="cadeadoAberto"></i></a>
            <a id="menuAberto" href="#" class="list-group-item list-group-item-action" onclick="avisoAvancar()">>Av. Clínica nutri.<i class="fas fa-lock-open" id="cadeadoAberto"></i></a>
            <a id="menuAberto" href="#" class="list-group-item list-group-item-action" onclick="avisoAvancar()">>Vet FAO<i class="fas fa-lock-open" id="cadeadoAberto"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" onclick="avisoNaoPodeAcessar()">Lista de alimentos<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuAberto" href="#" class="list-group-item list-group-item-action" onclick="avisoAvancar()">Recordatório 24h</a>
            <a id="menuAberto" href="#" class="list-group-item list-group-item-action" onclick="avisoAvancar()">Dietoterapia<i class="fas fa-lock-open" id="cadeadoAberto"></i></a>
            <a id="menuFechado" href="#" class="list-group-item list-group-item-action" onclick="avisoNaoPodeAcessar()">Lista de subs.<i class="fas fa-lock" id="cadeadoFechado"></i></a>
            <a id="menuAberto" href="#" class="list-group-item list-group-item-action" onclick="avisoAvancar()">Impressão de dieta<i class="fas fa-lock-open" id="cadeadoAberto"></i></a>
        </div>

        <h4 id="menuNutricionista">Avaliação Antropométrica &nbsp; <img id="balanca" src="img/icons8-balan%C3%A7a-industrial-48.png" alt=""></h4>

        <form action="cadastroAntropometria.php" method="post">

            <!-- passando id do paciente -->
            <input type="hidden" name="id_cliente" value="<?php echo $_GET["id_cliente"] ?>">

            <div id="gerarIMC">

                <div class="form-row">

                    <div class="col-8">
                        <h5 style="text-align: center;"><i>IMC</i></h5>
                        <div id="resultadoIMC">

                        </div>

                        <label style="margin-left: 70px;" for="altura">Altura (m) :</label>
                        <input style="text-align: center;" type="number" class="form-control" id="altura" placeholder="" name="altura" min="0" max="3" step="0.01" onchange="calculoIMC()" value="0">
                    </div>

                    <div class=" col-8">
                        <label style="margin-left: 50px;" for="pesoAtual">Peso Atual (kg)</label>
                        <input style="text-align: center;" type="number" class="form-control" id="pesoAtual" placeholder="" name="pesoAtual" min="0" max="300" step="0.01" onchange="calculoIMC()" value="0">

                    </div>
                </div>

            </div>

            <div id="graficoDinamico">

                <!--Div that will hold the pie chart-->
                <div id="chart_div">
                    <!-- gráfico do google -->
                </div>
                <button id="btnentrar" style="margin-left: 112px; margin-top: 5%;" type="button" class="btn btn-primary" onclick="drawChart()">Gráfico</button>
            </div>

            <div id="limpandoTelaParaDieta">
                <hr>
            </div>

            <div id="gerarMedidas">
                <div class="form-row alturaAntro">
                    <h5 class="col-md-5" style="text-align: center;"><i>Circunferências</i></h5>
                    <h5 class="col-md-5" style="text-align: center; margin-left: 80px;"><i>Dobras Cutâneas</i></h5>
                </div>



                <div class="form-row alturaAntro">
                    <label for="bracoEsq">Braço Esq. :</label>
                    <div class="form-group col-md-1">
                        <input type="number" step="0.01" class="form-control" id="bracoEsq" placeholder="" name="bracoEsq">
                    </div>
                    <label style="margin-left: 60px;" for="bracoDir">Braço Dir. :</label>
                    <div class="form-group col-md-1 ">
                        <input type="number" step="0.01" class="form-control" id="bracoDir" placeholder="" name="bracoDir">
                    </div>
                    <label style="margin-left: 120px;" for="tricipital">Tricipital :</label>
                    <div class="form-group col-md-1">
                        <input type="number" step="0.01" class="form-control" id="tricipital" placeholder="" name="tricipital" onchange="processar()" value="0">
                    </div>
                    <label style="margin-left: 60px;" for="subescapular">Subescapular :</label>
                    <div class="form-group col-md-1">
                        <input type="number" step="0.01" class="form-control" id="subescapular" placeholder="" name="subescapular" onchange="processar()" value="0">
                    </div>
                </div>

                <div class="form-row alturaAntro">
                    <label style="margin-left: 20px;" for="cintura">Cintura :</label>
                    <div class="form-group col-md-1">
                        <input type="number" step="0.01" class="form-control" id="cintura" placeholder="" name="cintura">
                    </div>
                    <label style="margin-left: 78px;" for="quadril">Quadril :</label>
                    <div class="form-group col-md-1">
                        <input type="number" step="0.01" class="form-control" id="quadril" placeholder="" name="quadril">
                    </div>
                    <label style="margin-left: 105px;" for="suprailiaca">Suprailíaca :</label>
                    <div class="form-group col-md-1">
                        <input type="number" step="0.01" class="form-control" id="suprailiaca" placeholder="" name="suprailiaca" onchange="processar()" value="0">
                    </div>
                    <label style="margin-left: 75px;" for="abdominal">Abdominal :</label>
                    <div class="form-group col-md-1">
                        <input type="number" step="0.01" class="form-control" id="abdominal" placeholder="" name="abdominal" onchange="processar()" value="0">
                    </div>
                </div>

                <div class="form-row alturaAntro">
                    <label style="margin-left: 33px;" for="torax">Torax :</label>
                    <div class="form-group col-md-1">
                        <input type="number" step="0.01" class="form-control" id="torax" placeholder="" name="torax">
                    </div>
                    <label style="margin-left: 53px;" for="abdominal">Abdominal :</label>
                    <div class="form-group col-md-1">
                        <input type="number" step="0.01" class="form-control" id="abdominal" placeholder="" name="abdominalCir">
                    </div>
                    <label style="margin-left: 220px;" for="quadriceps">Quadríceps :</label>
                    <div class="form-group col-md-1">
                        <input type="number" step="0.01" class="form-control" id="quadriceps" placeholder="" name="quadriceps" onchange="processar()" value="0" min="0">
                    </div>





                    <div id="cardPercentualDeGordura">
                        <div class="card bg-light mb-3" style="max-width: 50rem;">
                            <div class="card-header">
                                <h4 id="avisoPercentual"><img src="img/icons8-aviso-de-aviso-48.png" alt="">de gordura</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">- Detalhado</h5>
                                <p class="card-text">

                                    <div class="form-group" id="resultadoPercentualGordura">
                                    </div>
                                    <div class="form-group" id="calculoDiferencaPercentualGordura">
                                    </div>
                                    <div class="form-group" id="calculoPercentualGorduraEmKg">
                                    </div>
                                    <div class="form-group" id="calculoPercentualLivreGorduraEmKg">
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class=" form-row alturaAntro">
                    <label style="margin-left: 8px;" for="coxaEsq">Coxa Esq. :</label>
                    <div class="form-group col-md-1">
                        <input type="number" step="0.01" class="form-control" id="coxaEsq" placeholder="" name="coxaEsq">
                    </div>
                    <label style="margin-left: 66px;" for="coxaDir">Coxa Dir. :</label>
                    <div class="form-group col-md-1">
                        <input type="number" step="0.01" class="form-control" id="coxaDir" placeholder="" name="coxaDir">
                    </div>
                </div>

                <div class="form-row alturaAntro">
                    <label style="margin-left: 8px;" for="panturrilhaEsq">Pant. Esq. :</label>
                    <div class="form-group col-md-1">
                        <input type="number" step="0.01" class="form-control" id="panturrilhaEsq" placeholder="" name="panturrilhaEsq">
                    </div>
                    <label style="margin-left: 66px;" for="panturrilhaDir">Pant. Dir. :</label>
                    <div class="form-group col-md-1 linha-vertical">
                        <input type="number" step="0.01" class="form-control" id="panturrilhaDir" placeholder="" name="panturrilhaDir">
                    </div>



                </div>

                <div class="form-row ">
                    <label for="antebracoEsq">A.braço Esq.:</label>
                    <div class="form-group col-md-1">
                        <input type="number" step="0.01" class="form-control" id="antebracoEsq" placeholder="" name="antebracoEsq">
                    </div>
                    <label style="margin-left: 50px;" for="antebracoDir">A.braço Dir.:</label>
                    <div class="form-group col-md-1">
                        <input type="number" step="0.01" class="form-control" id="antebracoDir" placeholder="" name="antebracoDir">
                    </div>
                </div>

                <button style="margin-left: 340px; margin-bottom: 20px; margin-top: 30px;" id="btnentrar" type="submit" class="btn btn-primary">Salvar Antropometria</button>
            </div>
        </form>



        <footer class="container" id="rodape">
            <?php include_once 'rodape.php'; ?>
        </footer>

    </div>

</body>

</html>
