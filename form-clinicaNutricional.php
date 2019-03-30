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
            <a href="form-bioquiomica.php" class="list-group-item list-group-item-action">Av. Bioquímica</a>
            <a href="#" class="list-group-item list-group-item-action">Av. Clínica nutri. <i class="fas fa-check" style="font-size: 10px; color: #3b884d"></i> </a>
            <a href="form-VetFao.php" class="list-group-item list-group-item-action">Vet FAO</a>
            <a href="tabelaAlimentos.php" class="list-group-item list-group-item-action">Lista de alimentos</a>
            <a href="#" class="list-group-item list-group-item-action">Recordatório 24h</a>
            <a href="form-Dietoterapia.php" class="list-group-item list-group-item-action">Dietoterapia</a>
            <a href="#" class="list-group-item list-group-item-action">Lista de substituições</a>
            <a href="#" class="list-group-item list-group-item-action">Impressão de dieta</a>
        </div>

        <h4 id="menuNutricionista">Avaliação Clínica Nutricional &nbsp; <i class="fas fa-book-medical" style="font-size: 40px; color: #d83838;"></i> </h4>


        <div id="form-Clinico">
            <form action="cadastroClinicaNutricional.php" method="post">
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">
                        <h6><i>H. Patológica pregressa :</i></h6>
                    </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputPassword" placeholder="" name="HpatologiaPregressa">
                    </div>
                    <img id="virus" src="img/icons8-v%C3%ADrus-48.png" alt="">
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">
                        <h6><i>Histórico familiar :</i></h6>
                    </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputPassword" placeholder="" name="Hfamiliar">
                    </div>
                    <img id="familia" src="img/icons8-fam%C3%ADlia-homem-mulher-48.png" alt="">
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">
                        <h6><i>Histórico alimentar :</i></h6>
                    </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputPassword" placeholder="" name="Halimentar" ;>
                    </div>
                    <img id="maca" src="img/icons8-ma%C3%A7%C3%A3-48.png" alt="">
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">
                        <h6><i>Sinal clínico :</i></h6>
                    </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputPassword" placeholder="" name="sinalClinico">
                    </div>
                    <img id="exameSaude" src="img/icons8-exame-de-sa%C3%BAde-48.png" alt="">
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">
                        <h6><i>Medicamentos :</i></h6>
                    </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputPassword" placeholder="" name="medicamentos">
                    </div>
                    <img id="comprimidos" src="img/icons8-comprimidos-48.png" alt="">
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">
                        <h6><i>Histórico social :</i></h6>
                    </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputPassword" placeholder="" name="Hsocial">
                    </div>
                    <img id="dinheiroNaMão" src="img/icons8-dinheiro-na-m%C3%A3o-48.png" alt="">
                </div>
                <div id="">

                    <div class="form-row">
                        <div id="form-Bio1" class="form-group col-md-3">
                            <h6><i>Observações <br> adicionais :</i></h6>
                        </div>
                        <div id="form-Bio2" class="form-group col-md-5">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" placeholder="" name="observacoesAdicionais"></textarea>
                        </div>
                    </div>

                </div>
                <button style="margin-left: 270px; margin-bottom: 20px;" id="btnentrar" type="submit" class="btn btn-primary">Salvar Av. Clínica nutri.</button>
            </form>

        </div>


        <footer class="container" id="rodape">
             <?php include_once 'rodape.php'; ?>
        </footer>
    </div>

</body>

</html>
