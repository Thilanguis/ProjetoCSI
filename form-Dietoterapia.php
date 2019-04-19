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


        <nav id="teste" class="navbar navbar-dark" style="background-color:#3b884d;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <a href="#" class="list-group-item list-group-item-action">Dietoterapia <i class="fas fa-check" style="font-size: 10px; color: #3b884d"></i> </a>
            <a href="#" class="list-group-item list-group-item-action">Lista de substituições</a>
            <a href="#" class="list-group-item list-group-item-action">Impressão de dieta</a>
        </div>

        <h4 id="menuNutricionista">Conduta Dietoterápica &nbsp; <img id="prancheta" src="img/icons8-colar-40.png" alt=""> </h4>
        <h6 id="menuNutricionista1"><i>Fonte: FAO,WHO,UNU,1985</i></h6>

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
                <input class="col-4" type="text" style="border-radius: 4px;" disabled="disabled">
            </div>
        </div>

        <div id="inclusaoAlimentos">
            <h5 style="text-align: center; padding-bottom: 20px;"><b><i>Montagem da dieta</i></b></h5>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Horário</label>
                <div class="col-sm-4">
                    <input type="time" class="form-control" id="inputEmail3" placeholder="Email" name="horario">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Refeição</label>
                <div class="col-sm-4">
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="refeicao">
                        <option selected></option>
                        <option value="1">Desjejum</option>
                        <option value="2">Colação</option>
                        <option value="3">Almoço</option>
                        <option value="4">Lanche</option>
                        <option value="5">Jantar</option>
                        <option value="6">Ceia</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Quant.</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="inputEmail3" name="quantidade" placeholder="">
                </div>
            </div>

        </div>


        <div style="width: 800px; margin-left: 250px; margin-top: 20px;">

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Alimento</label>
                <div class="col-sm-8">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                        <input type="text" id="txtnome" placeholder="Pesquise um Alimento" class="form-control" name="alimento" required>
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

        <footer class="container" id="rodape">
            <?php include_once 'rodape.php'; ?>
        </footer>
    </div>
</body>

</html>
