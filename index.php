<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <title>Dietpro</title>
    <?php include_once 'head.php';?>

</head>

<script>
    
$(document).ready(function() {
    $('.addTel1').hide();
    $('#whatsapp').click(function () {
        $('.addTel1').toggle();
    });
});
    </script>

<body id="body">

    <div class="container">

        <div class="pos-f-t">
            <div class="collapse" id="navbarToggleExternalContent">
                <div class="bg-secondary navbar-dark p-1">
                    <a class="btn btn-secondary navbar-brand" href="index.php">HOME</a>
                    <a class="btn btn-secondary navbar-brand" href="#">QUEM SOMOS</a>

                    <a class="btn btn-secondary dropdown-toggle navbar-brand" href="#" role="button" id="<dropdownMenuL></dropdownMenuL>ink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        LOGIN
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">
                            <div class="">
                                <form action="session.php" method="post" class="px-4 py-3">
                                    <div class="form-group">
                                        <label for="exampleDropdownFormEmail1"><i class="fab fa-nutritionix" style="font-size: 30px; color:#3b884d; "></i> &nbsp; Endereço E-mail</label>
                                        <input type="text" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@email.com" name="login" re>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleDropdownFormPassword1">Senha</label>
                                        <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Senha" name="senha">
                                    </div>
                                    <div class="form-check">
                                    </div>
                                    <button id="btnentrar" type="submit" class="btn btn-primary">Entrar</button>
                                </form>
                                <div class="dropdown-divider"></div>
                                <button id="btnentrar" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
                                    Novo por aqui? Cadastre-se
                                </button>

                            </div>
                        </a>

                    </div>
                </div>

            </div>
        </div>
        <nav id="teste" class="navbar navbar-dark container" style="background-color:#3b884d;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span> <i class="fas fa-carrot animated rubberBand" style="font-size: 30px; color: #c78713"></i> &nbsp; <i class="fas fa-apple-alt animated rubberBand" style="font-size: 30px; color: #d83838"></i> &nbsp; <i class="fas fa-cheese animated rubberBand" style="font-size: 30px; color: #ccc624"></i> </span>
            </button>
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
            <div class="card container" style="width: 18rem;">
                <img class="card-img-top" src="img/10818780_745065035576255_818146252_n.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">- 54Kg</h5>
                    <p class="card-text">O paciente perdeu 54Kg em acompanhamento nutricional saindo dos 124Kg para os 70kg, no espaço de 1 ano e 2 meses e exercício físico supervisionado.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Paciente: Victor Scavarda Valentim</small>
                </div>
            </div>
            <div class="card container" style="width: 18rem;">
                <img class="card-img-top" src="img/evolu%C3%A7%C3%A3o.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">- 26Kg</h5>
                    <p class="card-text">A paciente perdeu 26Kg em acompanhamento nutricional saindo dos 96Kg para os 70kg, no espaço de 8 meses e exercício físico supervisionado.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Paciente: Yasmin Zouphi</small>
                </div>
            </div>
            <div class="card container" style="width: 18rem;">
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






        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="margin-left: 220px;">
                            <h3><b>Realize seu cadastro! &nbsp; <i class="fas fa-user-plus" style=" font-size: 30px; color: #4c89e3"></i></b></h3>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <form action="cadastroCliente.php" method="post">


                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label style="margin-left: 185px;" for="nome">Nome Completo</label> &nbsp; <i class="fas fa-signature" style="font-size: 25px; color: #314bd8;"></i>
                                    <input style="text-align: center;" type="text" class="form-control" id="nome" placeholder="Gertrudes da Silva Pinto" name="nome">
                                </div>
                                <div class="form-group col-md-4">
                                    <label style="margin-left: 60px;" for="telefone">Telefone Celular</label> &nbsp; <i class="fas fa-mobile-alt" style="font-size: 25px; color: #d11818"></i>
                                    <input style="text-align: center;" type="tel" class="form-control" id="telefone" placeholder="Ex.: 00 0000 0000" name="telefone">
                                </div>


                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label style="margin-left: 185px;" for="endereco">Endereço</label> &nbsp; <i class="fas fa-map-marked-alt" style="font-size: 25px; color: #27b75f"></i>
                                    <input style="text-align: center;" type="text" class="form-control" id="endereco" placeholder="Rua das Borboletas Psicodélicas, nº12" name="endereco">
                                </div>
                                <div class="form-group col-md-4">
                                    <label style="margin-left: 90px;" for="cidade">Cidade</label> &nbsp; <i class="fas fa-city" style="font-size: 25px; color: #be31d8"></i>
                                    <input type="text" class="form-control" id="cidade" placeholder="Frankfurt am Main" name="cidade" style="text-align: center">
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-4">
                                    <label style="margin-left: 70px;" for="estadoCivil">Estado Civil</label> &nbsp; <i class="fas fa-church" style="font-size: 25px; color: #d11818"></i>
                                    <input style="text-align: center;" type="text" class="form-control" id="estadoCivil" placeholder="Ex: Solteiro" name="estadoCivil">
                                </div>
                                <div class="form-group col-md-4">
                                    <label style="margin-left: 35px;" for="dataNascimento">Data de Nascimento</label> &nbsp; <i class="fas fa-calendar-day" style="font-size: 25px; color: #314bd8"></i>
                                    <input style="text-align: center;" type="date" class="form-control" id="dataNascimento" placeholder="Data de Nascimento" name="dataNascimento">
                                </div>
                                <div class="form-group col-md-4">
                                    <label style="margin-left: 90px;" for="sexo">Sexo</label> &nbsp; <i class="fas fa-male" style="font-size: 25px; color: #314bd8"></i> <i class="fas fa-female" style="font-size: 25px; color: #be31d8"></i>
                                    <input style="text-align: center;" type="text" class="form-control" id="sexo" placeholder="Sexo" name="sexo">
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label style="margin-left: 160px;" for="senha">Senha</label> &nbsp; <i class="fas fa-key" style="font-size: 25px; color: #d1ca18;"></i>
                                    <input style="text-align: center;" type="password" class="form-control" id="senha" placeholder="*******" name="senha">
                                </div>
                                <div class="form-group col-md-6">
                                    <label style="margin-left: 120px;" for="confirmarSenha"> Confirmar Senha</label> &nbsp; <i class="fas fa-key" style="font-size: 25px; color: #d1ca18;"></i>
                                    <input style="text-align: center;" type="password" class="form-control" id="confirmarSenha" placeholder="*******" name="confirmarSenha">
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-4">
                                    <label style="margin-left: 90px;" for="email">E-mail</label> &nbsp; <i class="fas fa-mail-bulk" style="font-size: 25px; color: #27b75f"></i>
                                    <input style="text-align: center;" type="email" class="form-control" id="email" placeholder="gertrudes@bol.com.br" name="email">
                                </div>
                                <div class="form-group col-md-4">
                                    <label style="margin-left: 50px;" for="confirmarEmail">Confirmar E-mail</label> &nbsp; <i class="fas fa-mail-bulk" style="font-size: 25px; color: #27b75f"></i>
                                    <input style="text-align: center;" type="email" class="form-control" id="confirmarEmail" placeholder="gertrudes@bol.com.br" name="confirmarEmail">
                                </div>
                                <div class="form-group col-md-4">
                                    <label style="margin-left: 90px;" for="cpf">Cpf</label> &nbsp; <i class="far fa-id-card" style="font-size: 25px; color: #d11818"></i>
                                    <input style="text-align: center;" type="cpf" class="form-control" id="email1" placeholder="gertrudes@bol.com.br" name="cpf">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <input id="btnCadastrar" type="submit" class="btn btn-primary" value="Cadastrar">
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>
