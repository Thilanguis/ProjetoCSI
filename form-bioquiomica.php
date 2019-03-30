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
        <div> <img src="img/icons8-checked-user-male-26.png" alt=""> <b> Bem vindo(a):</b> <?php echo "<i>"  .$_SESSION["login"] . "</i>" ; ?> <a style="text-decoration: none;" href="logout.php">&nbsp;<img id="logout" src="img/icons8-exit-48.png" alt=""></a> 
        </div>
        </nav>
        
        <div id="listNutri" class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
                Menu
            </a>
            <a href="nutricionistaMenu.php" class="list-group-item list-group-item-action">Dados do paciente</a>
            <a href="form-antropometria.php" class="list-group-item list-group-item-action">Av. Antropométrica</a>
            <a href="#" class="list-group-item list-group-item-action">Av. Bioquímica <i class="fas fa-check" style="font-size: 10px; color: #3b884d"></i> </a>
            <a href="form-clinicaNutricional.php" class="list-group-item list-group-item-action">Av. Clínica nutri.</a>
            <a href="form-VetFao.php" class="list-group-item list-group-item-action">Vet FAO</a>
            <a href="tabelaAlimentos.php" class="list-group-item list-group-item-action">Lista de alimentos</a>
            <a href="#" class="list-group-item list-group-item-action">Recordatório 24h</a>
            <a href="form-Dietoterapia.php" class="list-group-item list-group-item-action">Dietoterapia</a>
            <a href="#" class="list-group-item list-group-item-action">Lista de substituições</a>
            <a href="#" class="list-group-item list-group-item-action">Impressão de dieta</a>
        </div>

        <h4 id="menuNutricionista">Avaliação Bioquímica &nbsp; <img id="microscopio" src="img/icons8-microsc%C3%B3pio-96.png" alt=""></h4>


        <div id="form-Bio">
            <form method="post" action="cadastroBioquimica.php">
                <div class="form-row">
                    <div id="form-Bio1" class="form-group col-md-3">
                        <h5>Dados &nbsp; <img id="serginga" src="img/icons8-seringa-96.png" alt=""> <br> Bioquímicos : <img id="gotaDeSangue" src="img/icons8-gota-de-sangue-96.png" alt=""></h5> <img id="tuboDeEnsaio" src="img/icons8-tubo-de-ensaio-96.png" alt="">
                    </div>
                    <div id="form-Bio2" class="form-group col-md-9">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="14" placeholder="" name="bioquimica"></textarea>
                    </div>
                </div>
                <button style="margin-left: 315px; margin-top: 25px;" id="btnentrar" type="submit" class="btn btn-primary">Salvar Bioquímica</button>
            </form>

        </div>

        <footer class="container" id="rodape">
             <?php include_once 'rodape.php'; ?>
        </footer>
    </div>

</body>

</html>
