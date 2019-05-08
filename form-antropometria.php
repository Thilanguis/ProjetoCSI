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

        <nav class="navbar navbar-dark container" style="background-color:#3b884d;">
            <button id="teste" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span> <i class="fas fa-carrot animated rubberBand" style="font-size: 30px; color: #c78713"></i> &nbsp; <i class="fas fa-apple-alt animated rubberBand" style="font-size: 30px; color: #d83838"></i> &nbsp; <i class="fas fa-cheese animated rubberBand" style="font-size: 30px; color: #ccc624"></i> </span>
            </button>
            <div> <img src="img/icons8-checked-user-male-26.png" alt=""> <b> Bem vindo(a):</b>
                <?php echo "<i>"  .$_SESSION["login"] . "</i>" ; ?> <a style="text-decoration: none;" href="logout.php">&nbsp;<img id="logout" src="img/icons8-exit-48.png" alt=""></a>
            </div>
        </nav>

        <div id="listNutri1" class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
                Menu
            </a>
            <a href="nutricionistaMenu.php" class="list-group-item list-group-item-action">Dados do paciente</a>
            <a href="#" class="list-group-item list-group-item-action">Av. Antropométrica <i class="fas fa-check" style="font-size: 10px; color: #3b884d"></i></a>
            <a href="form-bioquiomica.php" class="list-group-item list-group-item-action">Av. Bioquímica</a>
            <a href="form-clinicaNutricional.php" class="list-group-item list-group-item-action">Av. Clínica nutri.</a>
            <a href="form-VetFao.php" class="list-group-item list-group-item-action">Vet FAO</a>
            <a href="tabelaAlimentos.php" class="list-group-item list-group-item-action">Lista de alimentos</a>
            <a href="#" class="list-group-item list-group-item-action">Recordatório 24h</a>
            <a href="form-Dietoterapia.php" class="list-group-item list-group-item-action">Dietoterapia</a>
            <a href="listaSubstituicao.php" class="list-group-item list-group-item-action">Lista de subs.</a>
            <a href="impressaoDieta.php" class="list-group-item list-group-item-action">Impressão de dieta</a>
        </div>

        <h4 id="menuNutricionista">Avaliação Antropométrica &nbsp; <img id="balanca" src="img/icons8-balan%C3%A7a-industrial-48.png" alt=""></h4>

        <form action="cadastroAntropometria.php" method="post">

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

                <button style="margin-left: 52px; margin-top: 10%;" id="btnentrar" class="btn btn-primary">Gerar IMC</button>
            </div>

            <div id="graficoDinamico">
                <p>olá</p>
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
                        <input type="number" step="0.01" class="form-control" id="tricipital" placeholder="" name="tricipital" onchange="calculoPercentualGordura()">
                    </div>
                    <label style="margin-left: 60px;" for="subescapular">Subescapular :</label>
                    <div class="form-group col-md-1">
                        <input type="number" step="0.01" class="form-control" id="subescapular" placeholder="" name="subescapular" onchange="calculoPercentualGordura()">
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
                        <input type="number" step="0.01" class="form-control" id="suprailiaca" placeholder="" name="suprailiaca" onchange="calculoPercentualGordura()">
                    </div>
                    <label style="margin-left: 75px;" for="abdominal">Abdominal :</label>
                    <div class="form-group col-md-1">
                        <input type="number" step="0.01" class="form-control" id="abdominal" placeholder="" name="abdominal" onchange="calculoPercentualGordura()">
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
                        <input type="number" step="0.01" class="form-control" id="quadriceps" placeholder="" name="quadriceps" onchange="calculoPercentualGordura()">
                    </div>


                </div>

                <div class="form-row alturaAntro">
                    <label style="margin-left: 8px;" for="coxaEsq">Coxa Esq. :</label>
                    <div class="form-group col-md-1">
                        <input type="number" step="0.01" class="form-control" id="coxaEsq" placeholder="" name="coxaEsq">
                    </div>
                    <label style="margin-left: 66px;" for="coxaDir">Coxa Dir. :</label>
                    <div class="form-group col-md-1">
                        <input type="number" step="0.01" class="form-control" id="coxaDir" placeholder="" name="coxaDir">
                    </div>

                    <div class="form-group col-md-3 ">
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
                
                <div id="resultadoPercentualGordura">
                            
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
