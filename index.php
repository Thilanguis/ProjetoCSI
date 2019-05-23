<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <title>Dietpro</title>
    <?php include_once 'head.php';
    include_once 'form-cadastroUsuarioNovo.php';
    ?>



</head>

<body id="body">

    <div class="container">

        <div class="pos-f-t">
            <div class="collapse" id="navbarToggleExternalContent">
                <div class="bg-secondary navbar-dark p-1">
                    <a class="btn btn-secondary navbar-brand" href="index.php">HOME</a>
                    <a class="btn btn-secondary navbar-brand" href="quem_somos.php">QUEM SOMOS</a>

                    <a class="btn btn-secondary dropdown-toggle navbar-brand" href="#" role="button" id="<dropdownMenuL></dropdownMenuL>ink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        LOGIN
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                        <div id="menuDropDown">
                            <form action="session.php" method="post" class="px-4 py-3">
                                <div class="form-group">
                                    <label for="exampleDropdownFormEmail1"><i class="fab fa-nutritionix" style="font-size: 30px; color:#3b884d; "></i> &nbsp; Login</label>
                                    <input type="text" class="form-control" id="exampleDropdownFormEmail1" placeholder="digite seu CRN" name="login" re>
                                </div>
                                <div class="form-group">
                                    <label for="exampleDropdownFormPassword1">Senha</label>
                                    <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="******" onkeypress="capLock()" name="senha">
                                </div> 
                                
                                <div id="avisoCapslock" class="alert alert-warning animated zoomIn container" role="alert" style="visibility:hidden; display: inline-block; text-align: center; font-size: 13px; margin: 0 auto; padding: 0 auto; margin-bottom: 8px;">
                                  Caps lock ligado ou Shift pressionado!
                                </div>
                                
                                <div class="form-check">
                                </div>
                                <button id="btnentrar" type="submit" class="btn btn-primary">Entrar</button>
                            </form>
                            <div class="dropdown-divider"></div>
                            <h6 style="margin-left: 48px;">
                                Novo por aqui? <a href="#" data-toggle="modal" data-target="#exampleModalScrollable" style="text-decoration: none;">Cadastre-se</a>
                            </h6>
                        </div>


                    </div>
                </div>

            </div>
        </div>
        <nav class="navbar navbar-dark container" style="background-color:#3b884d;">
           
            <button id="teste" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span> <i class="fas fa-carrot animated rubberBand" style="font-size: 30px; color: #c78713"></i> &nbsp; <i class="fas fa-apple-alt animated rubberBand" style="font-size: 30px; color: #d83838"></i> &nbsp; <i class="fas fa-cheese animated rubberBand" style="font-size: 30px; color: #ccc624"></i> </span>
            </button>
            <div id="divMenuDeslogado">&nbsp; <i id="usuarioDeslogado" class="fas fa-user-times"></i> <b>Nutricionista:</b>
                <?php echo "<i id='paciente'>" ."Deslogado" . "</i>" ; ?>
            </div>
        </nav>

        <div id="carouselExampleControls" class="carousel slide container" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 " src="img/estilo-de-vida-saud%C3%A1vel.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 " src="img/Menos-temperos-industrializados-e-mais-especiarias-naturais-1875806289.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 " src="img/shutterstock_593903873.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div id="cardsIndex" class="card-deck">
            <div id="cardsDivulgacaoPacientes" class="card container" style="width: 18rem;">
                <img class="card-img-top" src="img/10818780_745065035576255_818146252_n.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">- 54Kg</h5>
                    <p class="card-text">O paciente perdeu 54Kg em acompanhamento nutricional saindo dos 124Kg para os 70kg, no espaço de 1 ano e 2 meses e exercício físico supervisionado.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Paciente: Victor Scavarda Valentim</small>
                </div>
            </div>
            <div id="cardsDivulgacaoPacientes" class="card container" style="width: 18rem;">
                <img class="card-img-top" src="img/evolu%C3%A7%C3%A3o.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">- 26Kg</h5>
                    <p class="card-text">A paciente perdeu 26Kg em acompanhamento nutricional saindo dos 96Kg para os 70kg, no espaço de 8 meses e exercício físico supervisionado.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Paciente: Yasmin Zouphi</small>
                </div>
            </div>
            <div id="cardsDivulgacaoPacientes" class="card container" style="width: 18rem;">
                <img class="card-img-top" src="img/11695955_1034079559960031_707333758800032261_n.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">- 9Kg</h5>
                    <p class="card-text">>O paciente perdeu 9Kg em acompanhamento nutricional saindo dos 77,5Kg para os 68,5kg, no espaço de 2 meses e exercício físico supervisionado.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Paciente: Caio Herszenhaut</small>
                </div>
            </div>
        </div>






        <div id="portaretrato" class="card container" style="width: 18rem;">
            <div data-brackets-id="3125" class="ts-item-content">
                <div data-brackets-id="3126" class="ts-item-header">
                    <figure data-brackets-id="3127" class="icon">
                        <i class="fas fa-heartbeat animated pulse" style="font-size: 260px; color: #c72e2e"></i>
                    </figure>

                </div>

                <div data-brackets-id="3129" class="ts-item-body">

                    <p id="nomeNutricionista">
                        <i class="fas fa-user-md" style="font-size: 50px; color: #404dac"></i> &nbsp; <i><b style="font-size: 15px;">Nutricionista Daniele Guimarães Peres</b></i>
                    </p>
                </div>

            </div>
        </div>


        <aside>
            <div class="container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3673.600633349344!2d-43.18404308583432!3d-22.96493064571997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9bd556fdce472f%3A0x76e6a6f8ed076ddc!2sCondom%C3%ADnio+do+Edif%C3%ADcio+Belmonte+-+Rua+Tonelero%2C+25+-+Copacabana%2C+Rio+de+Janeiro+-+RJ%2C+22030-030!5e0!3m2!1spt-BR!2sbr!4v1548547849808" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </aside>

        <footer class="container" id="rodape">
            <?php include_once 'rodape.php'; ?>
        </footer>
    </div>

</body>

</html>
